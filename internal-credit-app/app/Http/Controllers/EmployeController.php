<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function tokensReloader()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $userId = $_SESSION["user_id"] ?? 1;
        $userRole = $_SESSION["user_role"] ?? 3;
        if ($userRole == 2) {
            $user = DB::table('managers')->find($userId);
            $userLogin = $user->updated_at;
            $table = "managers";
        } else if ($userRole == 3){
            $user = DB::table('employes')->find($userId);
            $userLogin = $user->updated_at;
            $table = "employes";
        }else{
            return false;
        }
        $loginDate =  $userLogin ?? '2026-01-04 14:16:26';
        $currentTime = now();
        $time = strtotime($currentTime);
        $loginDateConverted = strtotime($loginDate);
        $timeDeff = $time - $loginDateConverted;
        if ($timeDeff  == 2674811) {
            DB::table($table)->where('id',$userId)
                ->update([
                    'token' => 100
                ]);
        }
    }
    public function index()
    {
       $this->tokensReloader();
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $employeId = $_SESSION["user_id"] ?? 1;
        //just with fake data 
        $employe = Employe::find($employeId);
        return view('employe.index', compact('employe'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
