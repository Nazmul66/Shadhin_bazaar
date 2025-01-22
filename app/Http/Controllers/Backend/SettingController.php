<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\EmailConfiguration;
use App\Models\Setting;
use App\Traits\ImageUploadTraits;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    use ImageUploadTraits;

    public function index()
    {
        $setting = Setting::first();
        return view("backend.pages.settings.index", compact('setting'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate(
            [
                'logo' => ['required', 'image'],
                'phone' => ['required'],
                'email' => ['required'],
                'address' => ['required'],
            ],
            [
                'logo.required' => 'Logo Image is required',
                'phone.required' => 'Phone is required',
                'email.required' => 'Email is required',
                'address.required' => 'Address is required',
            ]
        );

        DB::beginTransaction();
        try {
            $setting = new Setting();

            $setting->site_name            = $request->site_name;
            $setting->whatsapp             = $request->whatsapp;
            $setting->phone                = $request->phone;
            $setting->phone_optional       = $request->phone_optional;
            $setting->email                = $request->email;
            $setting->email_optional       = $request->email_optional;
            $setting->inside_city          = $request->inside_city;
            $setting->outside_city         = $request->outside_city;
            $setting->tax                  = $request->tax;
            $setting->address              = Str::trim($request->address);
            $setting->address_optional     = Str::trim($request->address_optional);

            $setting->facebook_pixel       = Str::trim($request->facebook_pixel);
            $setting->google_analytics     = Str::trim($request->google_analytics);

            $setting->facebook             = $request->facebook;
            $setting->twitter              = $request->twitter;
            $setting->youtube              = $request->youtube;
            $setting->linkedin             = $request->linkedin;
            $setting->instagram            = $request->instagram;
            $setting->pinterest            = $request->pinterest;
            $setting->reddit               = $request->reddit;
            $setting->quora                = $request->quora;
            $setting->thread               = $request->thread;
            $setting->footer_text          = $request->footer_text;
            $setting->google_map           = $request->google_map;

            $setting->currency_symbol      = $request->currency_symbol;
            $setting->currency_name        = $request->currency_name;
            $setting->timeZone             = $request->timeZone;

            $setting->meta_title           = $request->meta_title;
            $setting->meta_description     = $request->meta_description;
            $setting->meta_keywords        = $request->meta_keywords;


            // Handle image with ImageUploadTraits function
            $uploadImage                   = $this->imageUpload($request, 'logo', 'settings');
            $setting->logo                 =  $uploadImage;


            // Handle image with ImageUploadTraits function
            $uploadImage                   = $this->imageUpload($request, 'footer_logo', 'settings');
            $setting->footer_logo          =  $uploadImage;


            // Handle image with ImageUploadTraits function
            $uploadImage                   = $this->imageUpload($request, 'favicon', 'settings');
            $setting->favicon              =  $uploadImage;

            $setting->save();

        }
        catch(\Exception $ex){
            DB::rollBack();
            // throw $ex;
            // dd($ex->getMessage());
            Toastr::error('There is Something wrong.', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->back();
        }

        Toastr::success('Setting data Inserted successfully.', 'Success', ["positionClass" => "toast-top-right"]);
        DB::commit();
         return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'phone' => ['required'],
                'email' => ['required'],
                'address' => ['required'],
            ],
            [
                'phone.required' => 'Phone is required',
                'email.required' => 'Email is required',
                'address.required' => 'Address is required',
            ]
        );

        $setting = Setting::find($id);

        DB::beginTransaction();
        try {
            $setting->site_name            = $request->site_name;
            $setting->whatsapp             = $request->whatsapp;
            $setting->phone                = $request->phone;
            $setting->phone_optional       = $request->phone_optional;
            $setting->email                = $request->email;
            $setting->email_optional       = $request->email_optional;
            $setting->address              = Str::trim($request->address);
            $setting->address_optional     = Str::trim($request->address_optional);
            $setting->inside_city          = $request->inside_city;
            $setting->outside_city         = $request->outside_city;
            $setting->tax                  = $request->tax;

            $setting->facebook_pixel       = Str::trim($request->facebook_pixel);
            $setting->google_analytics     = Str::trim($request->google_analytics);

            $setting->facebook             = $request->facebook;
            $setting->twitter              = $request->twitter;
            $setting->youtube              = $request->youtube;
            $setting->linkedin             = $request->linkedin;
            $setting->instagram            = $request->instagram;
            $setting->pinterest            = $request->pinterest;
            $setting->reddit               = $request->reddit;
            $setting->quora                = $request->quora;
            $setting->thread               = $request->thread;
            $setting->footer_text          = $request->footer_text;
            $setting->google_map           = $request->google_map;

            $setting->currency_symbol      = $request->currency_symbol;
            $setting->currency_name        = $request->currency_name;
            $setting->timeZone             = $request->timeZone;

            $setting->meta_title           = $request->meta_title;
            $setting->meta_description     = $request->meta_description;
            $setting->meta_keywords        = $request->meta_keywords;

            
            // existing logo delete with ImageUploadTraits function
            $uploadImages                  = $this->deleteImageAndUpload($request, 'logo', 'settings', $setting->logo );
            $setting->logo                 =  $uploadImages;


             // existing footer_logo delete with ImageUploadTraits function
            $uploadImages                  = $this->deleteImageAndUpload($request, 'footer_logo', 'settings', $setting->footer_logo );
            $setting->footer_logo          =  $uploadImages;
    
    
            // existing favicon delete with ImageUploadTraits function
            $uploadImages                  = $this->deleteImageAndUpload($request, 'favicon', 'settings', $setting->favicon );
            $setting->favicon              =  $uploadImages;


            // dd($setting);
            $setting->save();

        }
        catch(\Exception $ex){
            DB::rollBack();
            // throw $ex;
            // dd($ex->getMessage());
            Toastr::error('There is Something wrong.', 'Error', ["positionClass" => "toast-top-right"]);

            return redirect()->back();
        }

        Toastr::success('Setting data Updated successfully.', 'Success', ["positionClass" => "toast-top-right"]);

        DB::commit();
        return redirect()->back();
    }

    public function emailSetupIndex()
    {
        $email_setting = EmailConfiguration::first();
        return view('backend.pages.email_configuration.index', compact('email_setting'));
    }

    public function emailConfigSettingUpdate(Request $request)
    {
    //   dd($request->all());
        $request->validate([
            'email'       => ['required', 'email'],
            'host'        => ['required', 'max: 200'],
            'username'    => ['required', 'max: 200'],
            'password'    => ['required', 'max: 200'],
            'port'        => ['required', 'max: 200'],
            'encryption'  => ['required', 'max: 200'],
        ]);

        EmailConfiguration::updateOrCreate(
           ['id' => 1],
           [
            'email'       => $request->email,
            'host'        => $request->host,
            'username'    => $request->username,
            'password'    => $request->password,
            'port'        => $request->port,
            'encryption'  => $request->encryption
           ],
        );

        Toastr::success('Updates successfully.', 'Success', ["positionClass" => "toast-top-right"]);

        return redirect()->back();
    }
}
