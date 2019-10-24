<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Models\City;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Governorate;
use App\Models\DonationRequest;
use App\Models\Notification;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Token;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class MainController extends Controller
{

    public function categories()
    {
        $categories = Category::all();

        return responseJson(1,'success', $categories);
    }

    public function searchCategory(Request $request)
    {
        $posts = Post::with('category')->where(function ($post) use ($request) {
            if ($request->input('category_id')) {
                $post->where('category_id', $request->category_id);
            }
            if ($request->input('keyword')) {
                $post->where(function ($post) use ($request) {
                    $post->where('title', 'like', '%' . $request->keyword . '%');
                    $post->orWhere('content', 'like', '%' . $request->keyword . '%');
                });
            }
        })->latest()->paginate(10);
        //dd($posts);
        if ($posts->count() == 0) {
            return responseJson(0, 'Failed');
        }
        return responseJson(1, 'success', $posts);
    }

    public function posts()
    {
        $posts = Post::with('category')->paginate(10);

        return responseJson(1,'success', $posts);

    }


    public function postDetails(Request $request)
    {
        $post = Post::select('title', 'content', 'image')->where('id', $request->id)->get();

        return responseJson(1,'success', $post);
    }

    public function governorates()
    {
        $governorates = Governorate::all();

        return responseJson(1,'success', $governorates);
    }

    public function cities(Request $request)
    {
        $cities = City::where(function($query) use($request) {
           if($request->has('governorate_id'))
           {
               $query->where('governorate_id',$request->governorate_id);
           }
        })->get();

        return responseJson(1,'success', $cities);
    }

    public function contactUs(Request $request)
    {
        $validator =  validator()->make($request->all() , [
            'name' => 'required',
            'client_id' => 'exists:clients,id',
            'email' =>  'required',
            'phone' =>   'required',
            'title' =>     'required',
            'description' =>    'required'
        ]);


        $contacts = Contact::create($request->all());

        $contacts->save();

        return responseJson(1,'success', $contacts);
    }

    public function settings()
    {
        $settings = Setting::all();

        return responseJson(1,'success', $settings);
    }

    public function favourites(Request $request)
    {
        $favourites = $request->user()->posts()->paginate(10);

        return responseJson(1, 'success', $favourites);
    }

    public function toggleFavourites(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'posts' => 'required',
        ]);
        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }

        $favourites = $request->user()->posts()->toggle($request->posts);
        return responseJson(1, 'success', $favourites);
    }



    public function notification_setting(Request $request)
    {


        $bloodtypes = $request->user()->bloodtypes()->pluck('blood_types.id')->toArray();
        $governorates = $request->user()->governorates()->pluck('governorates.id')->toArray();

        return responseJson(1,'success',[

            'bloodtype' => $bloodtypes,
            'governorate' => $governorates

        ]);
    }

    public function update_notification_settings(Request $request)
    {
        $validator = validator()->make($request->all(),[
            'governorates' => 'required',
            'blood_types' => ' required'
        ]);

        if($validator->fails()){
            return responseJson(0,$validator->errors()->first(),$validator->errors());
        }

        $bloodtype = $request->user()->bloodtypes()->sync($request->blood_type);
        $governorate = $request->user()->governorates()->sync($request->governorates);

        return responseJson(1,'success',[

            'bloodtype' => $bloodtype,
            'governorate' => $governorate

        ]);

    }

    public function notifications()
    {
        $notifcation = Notification::paginate(10);
        return responseJson(1,'success', $notifcation);

    }

    public function profileEdit(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'name' => 'required|min:2',
            'phone' => 'required|unique:clients|digits:11',
            'email' => 'required|email|unique:clients',
            'password' => 'required|confirmed',
            'city_id' => 'required|exists:cities,id',
            'blood_type_id' => "required",
            'last_donation_date' => 'required',
            'date_of_birth' => 'required'
        ]);


        if ($validator->fails()) {

            return responseJson(0, $validator->errors()->first(), $validator->errors());
            }


        if(request()->has('password')){

            $request->merge(['password' => bcrypt($request->password)]);
        }
        $request->user()->update($request->all());

        return responseJson(1,'تمت التعديل بنجاح',['client' => $request->user()]);
    }

    public function donations()
    {
        $donations = DonationRequest::paginate(10,[
            'name',
            'age',
            'phone',
            'amount',
            'hospital_name',
            'notes',
            'city_id',
            'blood_type_id',
            'client_id'
        ]);

        return responseJson(1,'success', $donations);
    }

    public function donationDetails(Request $request)
    {
        $donationdetails = DonationRequest::where('id', $request->id)->get();

        return responseJson(1,'success',$donationdetails);
    }



    public function donationRequest(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'name' => 'required',
            'client_id' => 'required',
            'age' => 'required',
            'blood_type_id' => 'required',
            'amount' => 'required',
            'hospital_name' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'city_id' => 'required|exists:cities,id',
            'phone' => 'required|digits:11',
            'notes' => 'required',

        ]);
        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }
        $donationRequests = $request->user()->donationrequests()->create($request->all());
//        $donationRequests->client_id = auth()->id();
        // find clients suitable for this donation request
        $clientsIds = $donationRequests->city->governorate
            ->clients()->whereHas('bloodtypes', function ($q) use ($request, $donationRequests) {
//                dd($donationRequests->blood_type_id);
                $q->where('blood_types.id', $donationRequests->blood_type_id);
            })->pluck('clients.id')->toArray();
        $send = null;
        if (count($clientsIds)) {
            $notification = $donationRequests->notifications()->create([
                'title' => 'احتاج متبرع لفصيله',
                'body' => $donationRequests->blood_type . 'محتاج متبرع لفصيلة ',
            ]);
            $notification->clients()->attach($clientsIds);
            $tokens = Token::whereIn('client_id', $clientsIds)->where('token', '!=', null)->pluck('token')->toArray();
            if (count($tokens)) {
                $title = $notification->title;
//                dd($title);
                $body = $notification->body;
//                dd($body);
                $data = [
                    'donation_request_id' => $donationRequests->name
                ];
                $send = notifyByFirebase($title, $body, $tokens, $data);
            }
//            $tokens = $client->tokens()->where('token', '!=', '')
//                ->whereIn('client_id', $clientsIds)->pluck('token')->toArray();
        }
        return responseJson(1, 'تمت الاضافه بنجاح', $send);
    }
}
