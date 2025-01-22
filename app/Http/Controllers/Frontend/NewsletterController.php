<?php

namespace App\Http\Controllers\Frontend;

use App\Helper\MailHelper;
use App\Http\Controllers\Controller;
use App\Mail\SubscriptionVerification;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function newsletter_request(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => ['email', 'max:200']
        ]);

        $existSubscriber = NewsletterSubscriber::where('email', $request->email)->first();

        if( !empty($existSubscriber) && count($existSubscriber) > 0 ){
            if($existSubscriber->is_verified == 0){
                 
            }
            elseif($existSubscriber->is_verified == 1){
                return response(['status' => 'error', 'message' => 'you already subscribed with this email.']);
            }
        }
        else{
            $subscriber = new NewsletterSubscriber();
            $subscriber->email           = $request->email;
            $subscriber->verified_token  = Str::random(25);
            $subscriber->is_verified     = 0;
            $subscriber->save();

            // set mail config
            MailHelper::setMailConfig();

            // send email
            Mail::to($subscriber->email)->send(new SubscriptionVerification($subscriber));

            return response(['status' => 'success', 'message' => 'A verification link send to your email please check.']);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function newsletterEmailVerify(Request $request)
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
