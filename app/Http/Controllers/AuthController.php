<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AuthController extends Controller {
    public function send_otp(Request $request) {
        $api_key = '7c98c6f5-269d-11ec-a13b-0200cd936042';
        
        // parse body data
        $body = $request->all();
        $phone = $body['phone'];
        $otp = rand(1000, 9999);
        $template_name = "OTP+For+Login";

        // save data to user model
        $user = User::where('phone', $phone)->first();

        if($user) {
            $user->otp = md5($otp);
            $user->save();
        } else {
            $user = User::create($body);
            $user->phone = $phone;
            $user->uid = Str::random(30);
            $user->otp = md5($otp);
            $user->save();
            
        }
        
        // // laravel http post request
        $url = 'https://2factor.in/API/V1/'.$api_key.'/SMS/'.$phone.'/'.$otp.'/'.$template_name;
        $response = Http::get($url);
        return response()->json('OTP sent successfully');
    }

    public function verify_otp(Request $request){
        $body = $request->all();
        $otp = md5($body['otp']);

        // read data from user model
        $user = User::where('otp', $otp)->first();
            if($user->otp == $otp) {
                // delete data from user model
                $user->otp = null;
                $user->save();
                // return array to json
                return response()->json([
                    'message' => 'OTP Verified',
                    'status' => 200
                ]);
            } else {
                return response()->json([
                    'message' => 'Invalid OTP',
                    'status' => 404
                ]);
            }

    }

    public function login(Request $request){
        $body = $request->all();
        $phone = $body['phone'];
        $user = User::where('phone', $phone)->first();
        if($user) {
            return response()->json([
                'message' => 'Login Successful',
                'status' => 200
            ]);
        } else {
            return response()->json([
                'message' => 'Invalid Phone Number',
                'status' => 404
            ]);
        }
    }

    public function get_user($phone){
        $user = User::where('phone', $phone)->first();
        // laravel get user column
        if($user) {
            return response()->json([
                'message' => 'User Found',
                'status' => 200,
                'name' => $user->name,
                'phone' => $user->phone,
                'email' => $user->email,
                'address' => $user->address,
                'city' => $user->city,
            ]);
        } else {
            return response()->json([
                'message' => 'User Not Found',
                'status' => 404
            ]);
        }
    }
}
