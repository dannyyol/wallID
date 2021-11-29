<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Models\Event;
use App\Models\Ticket;
use App\Models\TicketPlan;
use App\Models\Category;
use App\Models\TicketCategory;
use App\Http\Requests\TicketRequest;
use App\Http\Requests\BuyTicketRequest;
use App\Models\TicketPaymentTemp;
use Illuminate\Support\Facades\Http;

class MainController extends Controller
{

    public function index($value='')
    {
        $tickets = Ticket::where('user_id', Auth::user()->id)->get();
        return response([
            'status' => true,
            'message' => 'Tickets',
            'data' => $tickets]);
    }

    public function process(Request $request)
    {
        if ($request->type == 'free') {

            TicketPlan::firstOrCreate([
                'user_id' => Auth::user()->id], 
                ['model' => 'free']);

            return response([
                'status' => true,
                'redirect' => null,
                'message' => 'Ticket Plan was created Successfully']);
        }
        else {

        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required',
            'reference' => 'required'
        ]);

        Ticket::firstOrCreate([
            'event_id' => $this->decodeId($request->event_id),
            'user_id' => Auth::user()->id
        ]);

        return response([
            'status' => true,
            'message' => 'Ticket created Successfully'
        ]);
    }

    public function buy(BuyTicketRequest $request)
    {
        $request->validated();

        // Get Event
        $event = Event::findOrFail($this->decodeId($request->event_id));

        if ($event->user_id == Auth::user()->id) {
            return response([
                'status' => false,
                'message' => 'You created this Event'
            ]);
        }

        $price = $event->price;

        // Check if User has not gotten ticket
        $ticket = Ticket::where('event_id', $event->id)
            ->where('user_id', Auth::user()->id)
            ->first();

        if ($event->pricing == 'multiple') {
            if ($request->category_id) {
                $cat = TicketCategory::findOrFail($this->decodeId($request->category_id));
                $price = $cat->price;
            }
            else {
                return response([
                    'status' => false,
                    'message' => 'Ticket Category is required'
                ], 400);
            }
        }

        if ($ticket) {
            return response([
                'status' => false,
                'message' => 'You have previously purchased Ticket for this Event'
            ]);
        }
        
        // Init payment 
         $response = Http::withToken(config('paystack.secret'))
            ->post('https://api.paystack.co/transaction/initialize', [
                'email' => Auth::user()->email,
                'amount' => $price,
                'callback_url' => url('payments/response')
            ]);

        if ($response->ok()) {
            
            return response([
                'status' => true,
                'message' => 'Payment initiated',
                'data' => [
                    'link' => $response->object()->data->authorization_url
                ]
            ]);
        }

        return response([
            'status' => false,
            'message' => 'Ticket created Successfully']);
    } 
}
