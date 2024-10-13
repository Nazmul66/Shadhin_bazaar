<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        return view('frontend.pages.home');
    }

    public function about_us()
    {
        return view('frontend.pages.frontend_pages.about_us');
    }

    public function contact_us()
    {
        return view('frontend.pages.frontend_pages.contact_us');
    }
    
    public function faq_page()
    {
        return view('frontend.pages.frontend_pages.faq');
    }

    public function team_page()
    {
        return view('frontend.pages.frontend_pages.team');
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
