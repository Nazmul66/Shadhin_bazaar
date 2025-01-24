<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Artisan;
use App\Traits\ImageUploadTraits;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    use ImageUploadTraits;


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
    
        Toastr::success('Cache Cleared Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
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
     * Admin Profile update
     */
    public function profileUpdate()
    {
        $admin = Admin::where('id', Auth::guard('admin')->user()->id)->first();
        return view('backend.pages.profile-update.index', compact('admin'));
    }

    public function changeProfile(Request $request)
    {
        // dd($request->all());
        $admin  =  Admin::where('id', Auth::guard('admin')->user()->id)->first();

        $admin->name =  $request->name;

        // Handle image with ImageUploadTraits function
         if( $request->hasFile('image') ){

            if( !empty($admin->image) && file_exists($admin->image)){
                  unlink($admin->image);
            }

            $uploadImage           = $this->imageUpload($request, 'image', 'settings');
            $admin->image          =  $uploadImage;
        }

        $admin->save();


        // Password Update
        if( Hash::check($request->current_password, Auth::guard('admin')->user()->password) ){

            if( $request->new_password === $request->confirm_password ){
                Admin::where('id', Auth::guard('admin')->user()->id)->update([
                    'password' => bcrypt($request->new_password)
                ]);

                $notification = [
                    'alert-type' => 'success', 
                    'message' => "Profile updated successfully", 
                ];
        
               return redirect()->route('admin.dashboards')->with($notification);
           }

           else{
            $notification = [
                'alert-type' => 'error', 
                'message' => "Your New password & Confirm Password not matched", 
            ];
    
           return redirect()->back()->with($notification);
           }
        }

        else{
            $notification = [
                'alert-type' => 'error', 
                'message' => "Your Current password is incorrect", 
            ];
    
           return redirect()->back()->with($notification);
        }
    }

    public function checkCurrentPassword(Request $request)
    {
        // dd($request->all());
        return response()->json([
            'match' => Hash::check($request->current_password, Auth::guard('admin')->user()->password)
        ]);
    }
}
