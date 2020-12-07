<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Hash;
use Validator;

class AuthController extends Controller
{
    public function getRegister() {
        return view('admin.auth.register');
    }
    public function postRegister(Request $request) {
        $data = $request->all();
        $validator = Validator::make($data, [
            'email' => 'required|email:rfc,dns|unique:users,email',
            'name' => 'required|min:6',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Email is required',
            'email.email' => 'Email must be in type: abc@xyz.com',
            'email.unique' => 'Email is used, choose another Email',
            'name.required' => 'Name is required',
            'name.min' => 'Name must be at least 6 characters',
            'password.required' => 'Password is required!',
            'password.min' => 'Password must be at least 6 characters!',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $email = $request->get('email');
        $name = $request->get('name');
        $password = bcrypt($request->get('password'));
        $user = new User();
        $user->email = $email;
        $user->name = $name;
        $user->password = $password;
        $user->save();
        return redirect()->route('login');
    }
    public function getLogin() {
        return view('admin.auth.login');
    }
    public function postLogin(Request $request) {
        $data = $request->all();
        $validator = Validator::make($data, [
            'email' => 'required|email:rfc,dns',
            'password' => 'required',
        ], [
            'email.required' => 'Email is required',
            'email.email' => 'Email must be in type: abc@xyz.com',
            'password.required' => 'Password is required!',
        ]);
        $email = $request->get('email');
        $password =$request->get('password');
        $user = User::where('email', $email)->first();
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else if (!$user || !Hash::check($password, $user->password)) {
            return redirect()->back()->withErrors($validator->errors()->add('email', 'Email or Password is invalid'))->withInput();
        }
        Auth::login($user);
        if (Auth::user()->role_id == 1) {
            return redirect()->route('product.index');
        } else if (Auth::user()->role_id == 2) {
            return redirect()->route('page.index');
        }
    }
    public function logout() {
        if (Auth::user()->role_id == 1) {
            Auth::logout();
            return redirect()->route('login');
        } else if (Auth::user()->role_id == 2) {
            Auth::logout();
            return redirect()->route('page.index');
        }
    }
}
