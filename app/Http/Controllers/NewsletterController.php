<?php

namespace App\Http\Controllers;

use App\Services\MailchimpNewsletter;
use App\Services\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $news)
    {

       
        request()->validate(['email' => 'required|email']);
        try{
    
           
           
            $news->subscribe(request('email'));
        }catch(\Exception $e){
    
            throw \Illuminate\Validation\ValidationException::withMessages([
    
                'email' => 'Your email could not be added to our newsletter List.'
    
            ]);
    
    
        }
    
        return back()->with('success','Your email has been added to our Newsletter list.');
    
        }
    }


