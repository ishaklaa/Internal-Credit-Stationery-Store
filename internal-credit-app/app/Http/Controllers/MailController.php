<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\User;
use App\Notifications\managerResponse;
use Illuminate\Http\Request;

class MailController extends Controller
{
    //
    public function notifyTheEmployee($userid , $managerResponse)
    {
        $empolye = Employe::find($userid);
        $user = User::find($empolye->user_id);
        // dd($user->email);
        if ($managerResponse == "accepted") {
            $data = [
                "hi" => "Welcome ",
                "wish" => "I hope that your are fine",
                "line" => "Your command is accepted"
            ];
            $user->notify(new managerResponse($data));
            return;
        }
        $data = [
            "hi" => "Welcome Dear ",
            "wish" => "I hope that your are fine",
            "line" => "sorry but your command is not acceptable"
        ];
        
         $user->notify(new managerResponse($data));

         return redirect()->route('manager.commandes.index');
    }
}
