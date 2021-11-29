<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubscriptionResource;
use App\Models\Subscription;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect()->to(FacadesAuth::user()->type);
    }

    public function orgSubscriptions(){

        $subs  = Subscription::where('organization_id', request()->organization_id)->get();
        if($subs->count() > 0){

            return response([
                'status' => true,
                'message' => 'Subscriptions',
                'data' => SubscriptionResource::collection($subs)
            ]);
        }
        return response([
            'status' => false,
            'message' => 'Subscription for this organization is empty',
        ]);
        
    }
}
