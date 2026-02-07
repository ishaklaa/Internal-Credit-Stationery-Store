<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TokensController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public static function tokensReloader()
    {
        $user = DB::table('admins')->find(1);
        $userLogin = $user->updated_at;
        $loginDate =  $userLogin ?? '2026-01-04 14:16:26';
        $currentTime = now()->format('Y-m-d');
        $time = strtotime($currentTime);
        $loginDateConverted = strtotime($loginDate);
        $timeDeff = $time - $loginDateConverted;
        if ($timeDeff  >= 2674811 ||  $timeDeff <= 2585650.633333333) {
            DB::table("employes")
                ->update([
                    'token' => 1000,
                    'updated_at' =>  $currentTime
                ]);
            DB::table("managers")
                ->update([
                    'token' => 1000,
                    'updated_at' =>  $currentTime
                ]);
        }

    }
    public function index()
    {
        //
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
