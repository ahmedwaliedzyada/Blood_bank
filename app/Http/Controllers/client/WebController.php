<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\City;
use App\Models\Client;
use App\Models\DonationRequest;
use App\Models\Governorate;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class WebController extends Controller
{
    public function index()
    {
        $settings = Setting::get();
        $posts = Post::latest()->get();
        $donations = DonationRequest::get();
        $bloodtypes = BloodType::get();
        $governorates = Governorate::get();
        // dd($posts);
        return view('front.index',compact('settings','posts','donations','bloodtypes','governorates'));
    }
    public function signUp()
    {
        $cities = City::get();
        return view('front.signup',compact('cities'));
    }
    public function login()
    {
        return view('front.login');
    }

    public function register(Request $request)
    {

        $validator = validator()->make($request->all(), [
            'name' => 'required|min:2',
            'phone' => 'required|unique:clients',
            'email' => 'required|email|unique:clients',
            'password' => 'required|confirmed',
            'city_id' => 'required|exists:cities,id',
            'blood_type_id' => "required|exists:blood_types,id",
            'last_donation_date' => 'required',
            'date_of_birth' => 'required',
        ]);

            $request->merge(['password' => Hash::make($request->password)]);

            $clients = Client::create($request->all());

            $clients->api_token = str_random(60);

            $clients->save();

            return view('front.login');

    }

    public function contactUs()
    {
        return view('front.contact-us');
    }

    public function aboutUs()
    {
        return view('front.about-us');
    }

    public function whoWeAre()
    {
        return view('front.who-we-are');
    }

    public function requests()
    {
        return view('front.requests');
    }

    public function clientLogin(Request $request)
    {
        $this->validate($request, [
            'phone'    => 'required',
            'password' => 'required',
        ]);
        $client = Client::where('phone', $request->input('phone'))->first();
        if ($client) {
            if (Auth::guard('client')->attempt($request->only('phone' ,'password'))) {
                return redirect('blood_bank/home');
            }
            flash()->error('لا يوجد حساب مرتبط بهذا الرقم');
            return back();
        }
    }

    public function logout(){
        auth()->guard('client')->logout();
        return redirect('blood_bank/get_login');
    }

    public function donationDetails($id){
        $donations = DonationRequest::findOrFail($id);
        $settings = Setting::first();
        return view('front.donator',compact('donations','settings'));
    }

}
