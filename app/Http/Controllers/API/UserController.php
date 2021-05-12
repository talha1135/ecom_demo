<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Validator;
use App\Models\User;

class UserController extends Controller
{
    public function login(){ 
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            // return $user;
             $accessToken =  $user->createToken('authToken')->accessToken;
                  return response(['user' =>  $user, 'access_token' => $accessToken]);
        } 
        else{ 
             $response = [
            'success' => false,
            'message' => 'unauthorized.'
        ];
        return response()->json($response, 200); 
        } 
    }

    public function register(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'name' => 'required',
            'email' => 'required|email', 
            'password' => 'required', 
            'c_password' => 'required|same:password', 
        ]);
        if ($validator->fails()) { 
                
             $response = [
            'error'=>$validator->errors(),
            'message' => 'You Have following Error.'
        ];
        return response()->json($response, 401);        
        }
        $input = $request->all(); 
        $input['password'] = bcrypt($input['password']); 
        $user = User::create($input); 
        $success['token'] =  $user->createToken('MyApp')-> accessToken; 
        $success['name'] =  $user->name;
        $email=$user->email;
        
 $response = [
            'success' => true,
            'user' => $user,
            'token' => $success['token'],
            'message' => 'You Have Successfully Registered.'
        ];
        return response()->json($response, 200); 
    }

    public function UserProfile(Request $request){
        $id=$request->id;
        $user=User::where('id',$id)->firstOrFail();
        return $user;
    }
}
