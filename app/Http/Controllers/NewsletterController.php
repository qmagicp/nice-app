<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Exception;
use App\Services\INewsletter;

class NewsletterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(INewsletter $newsletter)
    {
        request()->validate(['email' => 'required|email']);

        try {

            $newsletter->subscribe(request('email'));
        }
        catch(\Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'This email could not be added to our newsletter list.'
            ])->redirectTo('/#newsletter'); 
        }
    
        return redirect('/')->with('success', 'You are now subscribed!'); 
    }
}
