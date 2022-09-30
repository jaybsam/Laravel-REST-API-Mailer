<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all(Request $request)
    {

        $notification = Notification::all();
        if($notification->isEmpty()){
            $notification = "Notification is empty";
        }

        return response()->json([
            'notification' => $notification
        ]);
    }

    public function index(Request $request)
    {
        $notification = Notification::where('user_id', $request->user_id)->get();

        return response()->json([
            'notification' => $notification
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'text' => 'required'
        ]);

        $notification = new Notification;
        $notification->user_id = $request->user_id;
        $notification->text = $request->text;
        $notification->Status = "Unread";
        $notification->save();

        return response()->json([
            'message' => 'Successfully created',
            'response' => [
                            'user_id' => $request->user_id, 
                            'text' => $request->text
                        ]
        ]);
    }


    public function edit(Request $request)
    {
         $request->validate([
            'notification_id' => 'required',
            'text' => 'required'
        ]);
        Notification::where('id', $request->notification_id)->update(['text' => $request->text]);

         return response()->json([
            'message' => 'Successfully updated',
            'response' => [
                            'notification_id' => $request->notification_id, 
                            'text' => $request->text
                        ]
        ]);
    }


    public function destroy(Request $request)
    {
        Notification::where('id', $request->id)->delete();

        return response()->json([
            'message' => 'Successfully deleted',
        ]);
    }
}
