<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    //
    public function index (){
        //affichage de tokens
    /*   if (session_status() === PHP_SESSION_NONE) {
            session_start();   
        }
            $employeId = $_SESSION['user_id'];
    */       
          //just for test
          $userId = employe::all()->random()->user_id;
        $employe = Employe::find($userId);
        var_dump ($employe);
        exit ();
        return view ('employe.dashboard' , compact ('employe'));
    }
}
