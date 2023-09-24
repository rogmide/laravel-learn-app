<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Http\Request;

class NewsLetterController extends Controller
{

    // When you create a single handle controller 
    // you can use __invoke and it will automaty trigger on call
    // public function __invoke(Newsletter $newsletter)
    // {

    //     request()->validate(['email' => 'required|email']);


    //     try {
    //         $newsletter->subscribe(request('email'));
    //     } catch (\Throwable $th) {
    //         //throw $th;
    //         throw \Illuminate\Validation\ValidationException::withMessages(['email' => 'This email could not be added to our newsletter list.']);
    //     }



    //     return redirect('/')->with('success', 'You are now signed up for our newsletter!');
    // }

    public function store(Newsletter $newsletter)
    {

        request()->validate(['email' => 'required|email']);

        // dd(request('email'));
        try {
            $newsletter->subscribe(request('email'));
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
            throw \Illuminate\Validation\ValidationException::withMessages(['email' => 'This email could not be added to our newsletter list.']);
        }



        return redirect('/')->with('success', 'You are now signed up for our newsletter!');
    }
}
