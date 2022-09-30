<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Mail\Mailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    //
    public function SendMailer(Request $request){
    	$subject = $request->subject; 

    	$image_64 =  $request->attachment;

    	if (preg_match('/^data:image\/(\w+);base64,/', $image_64)) {
		 $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // .jpg .png .pdf

		 $replace = substr($image_64, 0, strpos($image_64, ',')+1); 
		 $image = str_replace($replace, '', $image_64); 

		 $image = str_replace(' ', '+', $image);
		 $imageName = Str::random(10).'.'.$extension;

		 $attachment = base64_decode($image);
		}else{
			$imageName = Str::random(10).'.pdf';
			$attachment = base64_decode($request->attachment);
		}
    	$details = ['title'=> 'Test Mailer', 'body' => $request->message, 'image' => $attachment, 'imageName' => $imageName];



    	$sendmail = Mail::to($request->email)->send(new Mailer($subject, $details)); 

    	if (empty($sendmail)) { 
    		return response()->json(['message' => 'Mail Sent Sucssfully'], 200); 
    	}else{
    		 return response()->json(['message' => 'Mail Sent fail'], 400); 
    		}

    }
}
