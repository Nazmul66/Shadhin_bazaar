<?php

namespace App\Http\Controllers\Frontend;

use App\Helper\MailHelper;
use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Contact;
use App\Models\EmailConfiguration;
use App\Models\FlashSale;
use App\Models\FlashSaleItem;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        $data['sliders']        = Slider::where('status', 1)->orderBy('id', 'desc')->get();
        $data['categories']     = Category::get_data();
        $data['brands']         = Brand::where('status', 1)->get();
        $data['flashSaleDate']  = FlashSale::first();
        $data['flashSaleItems'] = FlashSaleItem::where('show_at_home', 1)->where('status', 1)->get();
        $data['products']       = Product::where('is_approved', 1)->where('status', 1)->get();

        return view('frontend.pages.home', $data);
    }

    public function about_us()
    {
        return view('frontend.pages.frontend_pages.about_us');
    }

    public function contact_us()
    {
        return view('frontend.pages.frontend_pages.contact_us');
    }

    public function handleContactForm(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name'    => ['required','max:256'],
            'phone'   => ['required', 'max:256'],
            'email'   => ['required', 'email', 'max:256'],
            'subject' => ['required', 'max:256'],
            'message' => ['required'],
        ]);

        $contact              = new Contact();
        $contact->name        = $request->name;
        $contact->phone       = $request->phone;
        $contact->email       = $request->email;
        $contact->subject     = $request->subject;
        $contact->message     = $request->message;
        $contact->status      = 1;
        $contact->save();

        // set mail config
        $setting = EmailConfiguration::first();

        // send email
        Mail::to($setting->email)->send(new ContactMail($contact));

        return response(['status' => 'success', 'message' => 'Thank you for contacting us. We will respond you soon.']);
    }
    

    public function faq_page()
    {
        return view('frontend.pages.frontend_pages.faq');
    }

    public function team_page()
    {
        return view('frontend.pages.frontend_pages.team');
    }

    public function privacy_policy()
    {
        return view('frontend.pages.frontend_pages.privacy_policy');
    }

    public function terms_condition()
    {
        return view('frontend.pages.frontend_pages.terms_condition');
    }

    public function customer_feedback()
    {
        return view('frontend.pages.frontend_pages.customer_feedback');
    }

    public function blogs()
    {
        return view('frontend.pages.frontend_pages.blogs');
    }

    public function blogs_details()
    {
        return view('frontend.pages.frontend_pages.blogs_details');
    }

    public function track_order()
    {
        return view('frontend.pages.frontend_pages.track_order');
    }

    public function register_login()
    {
        return view('frontend.pages.auth.login_register');
    }



    /**
    *   Authentication template
    */

    public function changePassword()
    {
        return view('frontend.pages.auth.changePassword');
    }

    public function forgetPassword()
    {
        return view('frontend.pages.auth.forgetPassword');
    }


    /**
     *  All Product Pages template shown
    */



    // public function cart_view()
    // {
    //     return view('frontend.pages.product_pages.cart_view');
    // }

    public function wishlist_view()
    {
        return view('frontend.pages.product_pages.wishlist_view');
    }
    
    public function compare_view()
    {
        return view('frontend.pages.product_pages.compare');
    }

    // public function checkout()
    // {
    //     return view('frontend.pages.product_pages.checkout');
    // }




}
