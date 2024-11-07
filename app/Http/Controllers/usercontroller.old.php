<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function Create(Request $request){


        $page_data = [
            'module' => 'user',
            'url' => 'create-user',
            'title' =>'Create User',
            'sub_menu_url'=> '/role-list',
            'breadcrumbs' => [
                ['url' => '/dashboard', 'label' => 'Home'],
                ['url' => 'users/create', 'label' => 'Create User'],
            ]

        ];


        return view('users.create',compact('page_data'));
    }

    public function store(UserRequest $request)
    {
        
        $data = $request->validated();
        
        if ($request->hasFile('photo')){
            $fileName = uniqid() . '_' . $request->file('photo')->getClientOriginalName();
            if (!file_exists('images/users/')) {
                mkdir('images/users/', 0777, true);
            }

            $request->file('photo')->move('images/users/',$fileName);
            $data['photo'] = $fileName;

        }
        
        $data['password'] = Hash::make($data['password']);
        User::create($data);

        return redirect()->route('users.create')->with('success', 'User created successfully');
    }
    public function rules()
    {
        return [
            'prefixname' => 'required|in:Mr,Mrs,Ms',
            'firstname' => 'required|string|max:255',
            'middlename' => 'nullable|string|max:255',
            'lastname' => 'required|string|max:255',
            'suffixname' => 'nullable|string|max:255',
            'username' => 'required|string|unique:users,username|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed|min:8',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg,gif',
            'type' => 'required|in:user,admin',
        ];
    }
}
