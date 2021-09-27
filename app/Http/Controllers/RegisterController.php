<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Throwable;

class RegisterController extends Controller
{
    public function handleRegister(Request $request)
    {
        try{
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['required', 'string'],
            ]);
            }
            catch(Throwable $e)
            {
                return $e->getMessage();
            }
            $data = [
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => $request['password'],
            ];
           $user = User::where('email',$request['email'])->first();
           if(!empty($user))
           {
               return 'User already exists';
           }
           User::create($data);
           return 'User Created Sucessfully';
    }

}
