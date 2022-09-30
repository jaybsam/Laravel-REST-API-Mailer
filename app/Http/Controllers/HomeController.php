<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
    	return "Home";
    }

    public function notification(Request $request){
    	$notification = Notification::all();
        if(!empty($notification)){
            foreach($notification as $notifications){

            }
        }else{
            $notifications = "no data";
        }
        return response()->json(['request' => $notifications]);
    }
}
