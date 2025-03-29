<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function getAllUsers() {
        $users = DB::table('users')->get();

        return response()->json([
            'users' => $users,
        ], 202);
    }
}
