<?php

namespace App\Http\Controllers;

use App\Mail\NotificationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //System Registration
    public function systemRegistration($name, $description){
        $details =[
            'title'=>$name,
            'body'=>$description,
        ];

        Mail::to("sashinisaumya0118@gmail.com")->send(new NotificationMail($details));
        return "Email sent!";
    }

    //Application Submition
    public function submitApplication(){
        $details =[
            'title'=>'Application Submition',
            'body'=>'Your have sucessfully submit the job Application.',
        ];

        Mail::to(session('user_email'))->send(new NotificationMail($details));
        return "Email sent!";
    }

    //Application Update
    public function updateApplication(){
        $details =[
            'title'=>'Updating your Job Application Basic Details',
            'body'=>'Your Job Application details Updated Now. Please check it up again.',
        ];

        Mail::to("sashinisaumya0118@gmail.com")->send(new NotificationMail($details));
        return "Email sent!";
    }


}
