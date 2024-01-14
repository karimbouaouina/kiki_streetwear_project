<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function create() {
        return view('users.create');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:user', 
            'password' => 'required|min:6',
            'firstName' => 'required',
            'lastName' => 'required',
            'address' => 'required',
            'admin' => 'sometimes|boolean'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $userData = [
            'email' => $request->email,
            'password' => Hash::make($request->password), 
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'address' => $request->address,
            'admin' => $request->admin ?? 0, 
        ];
    
        $user = User::create($userData);
        if($user->admin == 1) {
            return redirect()->route('home')->with('success', 'User created successfully.');
        }
        else{
            return redirect()->route('userhome')->with('success', 'User created successfully.');

        }
    
    }
    

    public function profile() {
        $user = User::findOrFail(auth()->user()->userID);
        return view('users.profile', compact('user'));
    }

    public function edit() {
        $user = User::findOrFail(auth()->user()->userID);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:user,email,' . auth()->user()->userID . ',userID', 
            'password' => 'nullable|min:6',
            'firstName' => 'required',
            'lastName' => 'required',
            'address' => 'required'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $user = User::findOrFail(auth()->user()->userID);
        $validatedData = $validator->validated();
        if (!empty($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']); 
        }
        $user->update($validatedData);
    
        return redirect()->route('user.profile')->with('success', 'User updated successfully.');
    }

}
