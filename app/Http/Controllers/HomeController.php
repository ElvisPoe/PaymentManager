<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Payment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $clients = Client::all();

        return view('home', compact('clients'));

    }

    public function filterPayments(Request $request){

        $payments = Payment::all();

        if ($request->date_from) {
            $payments = Payment::all()
                ->where('created_at', '>=' , $request->date_from);
        }

        if ($request->date_to) {
            $payments = Payment::all()
                ->where('created_at', '<=' , $request->date_to);
        }

        return view('payments', compact('payments'));

    }
}
