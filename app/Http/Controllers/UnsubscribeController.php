<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UnsubscribeController extends Controller
{
    public function unsubscribe($type, $identity)
    {
        $identity = Crypt::decrypt($identity);
        $identity = explode('_', $identity);
        $email = $identity[0];
        $id = $identity[1];

        $user = User::where('id', $id)->where('email', $email)->first();

        if (!isset($user->id)){
            return response('Not Found', 404);
        }

        switch ($type){
            case 'news':
                $user->comm_newsletter = false;
                break;
            case 'event':
                $user->comm_events = false;
                break;
        }

        $user->save();
        return $email. ' has been unsubscribed from receiving any '. $type.' related emails.';
    }
}
