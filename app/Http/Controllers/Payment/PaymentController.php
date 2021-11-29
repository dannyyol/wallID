<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Auth;
use App\Models\Event;
use App\Models\Ticket;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {

        $response = Http::withToken(config('paystack.secret'))
            ->post('https://api.paystack.co/transaction/initialize', [
                'email' => 'tao@yahoo.com',
                'amount' => 100,
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
            'message' => 'Payment could not initiated',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function verify($reference)
    {
        $response = Http::withToken(config('paystack.secret'))
            ->get('https://api.paystack.co/transaction/verify/' . $reference);

        if ($response->ok()) {
            if ($response->object()->data->status == 'success') {
                return response([
                    'status' => true,
                    'message' => 'Payment verified']);
            }
            else {
                 return response([
                    'status' => false,
                    'message' => 'Payment could not be verified']);
            }
        }
        else {
            return response([
                'status' => false,
                'message' => 'Payment could not be verified']);
        }
    }
}
