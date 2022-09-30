<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function sendEmail() { 
    	$details = ['title' => "Test mail",
    				'body' => 'Sample mail for test use'];

    	Mail::to("nevored01@gmail.com")->send(new SendMail($details));
    	return "Email Sent!";
    	// $title = '[Confirmation] Thank you for your order'; 

    	// $customer_details = [ 'name' => 'Arogya', 'address' => 'kathmandu Nepal', 'phone' => '123123123', 'email' => 'nevored01@gmail.com' ]; 

    	// $order_details = [ 'SKU' => 'D-123456', 'price' => '10000', 'order_date' => '2020-01-22', ]; 

    	// $send = Mail::to($customer_details['email'])->send(new SendMail($title, $customer_details, $order_details)); 

    	// if (empty($send)) { 
    	// 	return response()->json(['message' => 'Mail Sent Sucssfully'], 200); 
    	// }else{ 
    	// 	return response()->json(['message' => 'Mail Sent fail'], 400); 
    	// } 
    }
}
