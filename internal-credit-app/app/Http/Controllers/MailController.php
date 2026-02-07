<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\managerResponse;
use Illuminate\Http\Request;

class MailController extends Controller
{
    //
    public function index($userid, $managerResponse)
    {
        $user = User::find($userid);
        $user->email = "";
        if ($managerResponse == "accept") {
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
    }
}
