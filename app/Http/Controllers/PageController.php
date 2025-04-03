<?php

namespace App\Http\Controllers;


use App\Enums\Enums\AuthFormCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PageController extends Controller
{
    public function welcome() {
        return view('welcome');
    }

    public function authForms(AuthFormCategory $params) {
        return view('auth-forms', [
            'params' => $params->value,
        ]);
    }

    public function board() {
        if(Auth::user()) {
            $user = Auth::user();
        }

        $incomeMoney = $user->incomeItems;
        
        $incomeMoneyTotal = 0;
        foreach($incomeMoney as $item)
        {
            $incomeMoneyTotal += (float)$item['summ'];
        }
        
        return view('board', [
            'user' =>$user,
            'incomeMoney' => $incomeMoney,
            'incomeMoneyTotal' => $incomeMoneyTotal,
        ]);
    }
}
