<?php

namespace App\Http\Controllers;

use App\Http\Requests\Modals\IncomeAdd\IncomeAddRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class IncomeItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IncomeAddRequest $request)
    {
        $data = $request->validated();
        $user_id = Auth::user()->id;
        Log::info('Данные получены при добавлении дохода');
        Log::info('user_id', [$user_id]);
        Log::info('request', [$data]);

        return to_route('board');
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
