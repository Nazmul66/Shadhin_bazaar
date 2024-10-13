<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.pages.dashboard');
    }

    public function dashboard_profile()
    {
        return view('users.pages.dashboard_profile');
    }

    public function dashboard_orders()
    {
        return view('users.pages.dashboard_orders');
    }


    public function dashboard_orders_views()
    {
        return view('users.pages.orders_view');
    }

    public function dashboard_download()
    {
        return view('users.pages.dashboard_download');
    }

    public function dashboard_reviews()
    {
        return view('users.pages.dashboard_reviews');
    }

    public function dashboard_wishlist()
    {
        return view('users.pages.dashboard_wishlist');
    }
    
    public function dashboard_address()
    {
        return view('users.pages.dashboard_addresses');
    }

    public function dashboard_new_address()
    {
        return view('users.pages.dashboard_new_address');
    }

    public function dashboard_chat()
    {
        return view('users.pages.dashboard_chat');
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
