<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use SendMail;
class MailController extends Controller
{
    public function send()
    {
    	Mail::send(new SendMail());

    }
}
