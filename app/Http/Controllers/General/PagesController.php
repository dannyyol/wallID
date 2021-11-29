<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

class PagesController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function faq()
    {
        return view('index');
    }

    public function price()
    {
        return view('index');
    }

    public function about()
    {
        return view('index');
    }

    public function contact()
    {
        return view('index');
    }

    public function ticket()
    {
        if (Auth::user()->ticketPlan) {
            return view('pages.create_ticket');
        }

        return redirect()->to('ticket-plans');
    }

    public function ticketPlan()
    {
        return view('pages.ticket_plans');
    }  

    public function created()
    {
        return view('pages.created');
    } 

    public function paymentResponse()
    {
        return view('pages.payments.index');
    } 
}
