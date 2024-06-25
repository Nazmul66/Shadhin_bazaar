<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        return view('backend.pages.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function login(Request $request)
    {
        if( $request->isMethod('POST') ){
           $data = $request->all();

           // validation
           $rules = [
              "email" => 'required|email|max:255',
              "password" => 'required|max:30',
           ];

           $customMessage = [
               "email.required" => 'Email is required',
               "email.email" => 'Valid Email is required',
               "password.required" => 'Password is required',
           ];

           $request->validate($rules, $customMessage);


           if( Auth::guard('admin')->attempt(["email" => $data['email'], "password" => $data['password']]) ){
              return redirect('/admin/dashboard');
           }
           else{
              return redirect()->back()->with('error_message', "Invalid Email or Password");
           }
        }

        else{
            return view("backend.pages.auth.login");
        }
    }

    /**
     * Display the specified resource.
     */
    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect('/admin/login');
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
