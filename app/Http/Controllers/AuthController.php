<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Models\AdminModel;
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

    public function all_users() {
        // get specific column from user model
        $users = User::select(
            'uid',
            'name',
            'phone',
            'email',
            'avatar',
            'address',
            )->get();

        return response()->json($users);
    }

    // Admin Auth Functions

    public function create_admin_user(Request $request) {
        $body = $request->all();
        $admin = AdminModel::create($body);
        $admin->password = md5($body['password']);
        $admin->save();
        return response()->json([
            'message' => 'Admin User Created',
            'status' => 200
        ]);
    }

    public function admin_login(Request $request) {
        $body = $request->all();
        $email = $body['email'];
        $password = $body['password'];

        // login using email and password
        $admin = AdminModel::where('email', $email)
        ->where('password', $password)->first();

        if($admin) {
            $admin->isLoggedin = 'true';
            $admin->save();
            return response()->json([
                'message' => 'Login Successful',
                // 'isLoggedin' => $admin->isLoggedin,
                'status' => 200
            ]);
        } else {
            return response()->json([
                'message' => 'Invalid Email or Password',
                'status' => 404
            ]);
        }

        
    }

    public function check_admin_login(Request $request) {
        $body = $request->all();
        $email = $body['email'];

        $admin = AdminModel::where('email', $email)->first();
        if($admin) {
            return response()->json([
                'message' => 'User Found',
                'status' => 200,
                'isLoggedin' => $admin->isLoggedin,
            ]);
        } else {
            return response()->json([
                'message' => 'User Not Found',
                'status' => 404
            ]);
        }
    }
}
