<?php

namespace App\Http\Controllers\Api {


    use App\Mail\ResetPassword;
    use App\Models\Client;
    use App\Models\Token;
    use Illuminate\Http\Request;
    use Illuminate\Routing\Controller;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Mail;

    class AuthController extends Controller
    {
        public function register(Request $request)
        {

            $validator = validator()->make($request->all(), [
                'name' => 'required|min:2',
                'phone' => 'required|unique:clients',
                'email' => 'required|email|unique:clients',
                'password' => 'required|confirmed',
                'city_id' => 'required|exists:cities,id',
                'blood_type' => "required",
                'last_donation_date' => 'required',
                'date_of_birth' => 'required',
            ]);


            if ($validator->fails()) {

                return responseJson(0, $validator->errors()->first(), $validator->errors());

            } else {

                $request->merge(['password' => Hash::make($request->password)]);

                $clients = Client::create($request->all());

                $clients->api_token = str_random(60);

                $clients->save();

            }

            return responseJson(1, 'Success', [
                'api_token' => $clients->api_token,
                'client' => $clients
            ]);

    }


        public function login(Request $request)
        {
            $validator = validator()->make($request->all(), [
                'phone' => 'required',
                'password' => 'required',
            ]);


            if ($validator->fails()) {

                return responseJson(0, $validator->errors()->first(), $validator->errors());
            }
            $client = Client::where('phone', $request->phone)->first();

            if ($client) {

                if (Hash::check($request->password, $client->password)) {

                    return responseJson(1, 'مرحبا بك ', [
                        'api_token' => $client->api_token,
                        'client' => $client
                    ]);
                } else {
                    return responseJson(0, 'لا يوجد حساب ');
                }
            } else {

                return responseJson(0, 'لا يوجد حساب ');
            }

        }

        public function resetPassword(Request $request)
        {

            $validator = validator()->make($request->all(), [
                'phone' => 'required'
            ]);

            if ($validator->fails()) {

                return responseJson(0, $validator->errors()->first(), $validator->errors());
            }


            $client = Client::where('phone', $request->phone)->first();

            if ($client) {

                $code = rand(1111, 9999);

                $update = $client->update(['pin_code' => $code]);

                if ($update) {
                    Mail::to($client->email)
                        ->bcc("ahmedwaliedz246@gmail.com")
                        ->send(new ResetPassword($code));
                    return responseJson(1, 'برجاء فحص هاتفك', [
                        'pin_code_for_test' => $code,
                    ]);
                } else {
//                    return responseJson(0,'error');
//                }

                }
            }

        }


        public function newpassword(Request $request)
        {
            $validator = validator()->make($request->all(), [

                'pin_code' => 'required',
                'phone' => 'required',
                'password' => 'required|confirmed'

            ]);

            if ($validator->fails()) {

                return responseJson(0, $validator->errors()->first(), $validator->errors());
            }

            $user = Client::where('pin_code', $request->pin_code)
                ->where('phone', $request->phone)->first();

            if ($user) {
                $user->password = bcrypt($request->password);
                $user->pin_code = null;

                if ($user->save()) {
                    return responseJson(1, 'success');
                } else {
                    return responseJson(0, 'failed');
                }
            }
        }


        public function registerToken(Request $request)
        {
            $validator = validator()->make($request->all(), [
                'token' => 'required',
                'type' => 'required|in:android','ios'
            ]);
            if ($validator->fails()) {
                return responsejson(0, $validator->errors()->first(), $validator->errors());
                # code...
            }
            Token::where('token', $request->token)->delete();
            $request->user()->tokens()->create($request->all());
            return responsejson(1, 'تم التسجيل بنجاح ');
        }



        public function removeToken(Request $request)
        {
            $validator = validator()->make($request->all(),[
                'token' => 'required'
            ]);

            if ($validator->fails()) {
                $data = $validator->errors();
                return responseJson(0, $validator->errors()->first(), $data);
            }

            Token::where('token',$request->token)->delete();

            return responseJson(1,'تم المسح بنجاح ');
        }



    }

}
