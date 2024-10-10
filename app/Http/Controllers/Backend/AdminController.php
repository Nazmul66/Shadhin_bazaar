<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Artisan;

class AdminController extends Controller
{
    public function cacheClear()
    {
        Artisan::call('config:cache');
        Artisan::call('config:clear');
        Artisan::call('route:cache');
        Artisan::call('route:clear');
        Artisan::call('view:cache');
        Artisan::call('view:clear');
        Artisan::call('cache:clear');
        Artisan::call('optimize');
        Artisan::call('optimize:clear');
    
        $notifications = [
            'alert-type' => 'success',
            'message' => "Cache Cleared Successfully",
        ];
    
        return redirect()->back()->with($notifications);
    }


    public function dashboards()
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


           if( $admin = Auth::guard('admin')->attempt(["email" => $data['email'], "password" => $data['password']]) ){
              return redirect('/admin/dashboards');
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
