<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Auth;
use App\Models\Detail;


class UserService implements UserServiceInterface
{
    public function createUser($request)
    {
        $validator = Validator::make($request->all(), $this->getValidationRules());

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
        //dd($data);
        $data = $request->all();

        //dd($data);
        if ($request->hasFile('photo')){
            $fileName = uniqid() . '_' . $request->file('photo')->getClientOriginalName();
            if (!file_exists('images/users/')) {
                mkdir('images/users/', 0777, true);
            }

            $request->file('photo')->move('images/users/',$fileName);
            $data['photo'] = $fileName;

        }
        
        $data['password'] = $this->hash($request->input('password'));
        //dd($data);
        // return User::create($data);
        $user = User::create($data);
        $this->saveUserDetails($user);
        return $user;
    }

    public function getAllUsers()
    {
        $role = Auth::user()->type;
        if($role === 'superadmin'){
            return User::all();
        }elseif($role === 'admin'){
            return User::where('type','!=', 'superadmin')->get();
        }else{
            return User::where('type','=', 'user')->get();
        }
    }

    public function findUserById($id)
    {
        return User::findOrFail($id);
    }
   
    public function updateUser($id, $request)
    {
        $user = User::findOrFail($id);
        $data = $request->except('password');
        if ($request->hasFile('photo')) {
            $fileName = uniqid() . '_' . $request->file('photo')->getClientOriginalName();
            if (!file_exists('images/users/')) {
                mkdir('images/users/', 0777, true);
            }
    
            $request->file('photo')->move('images/users/', $fileName);
            $data['photo'] = $fileName;
        }
    
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->input('password'));
        }
    
        $user->update($data);
        $this->saveUserDetails($user);
        $user['event'] = 'update';
        return $user;

    }

    public function hash(string $password): string
    {
        return Hash::make($password);
    }

    private function getValidationRules(): array
    {
        return [
            'prefixname' => 'required|string|in:Mr,Mrs,Ms',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required',
            'photo' => 'nullable|image|max:2048',
            'type' => 'required|in:user,admin',
        ];
    }

    public function saveUserDetails(User $user)
    {
        $fullName = $user->firstname . ' ' . 
                    ($user->middlename ? substr($user->middlename, 0, 1) . '.' : '') . 
                    ' ' . $user->lastname;

        $middleInitial = $user->middlename ? substr($user->middlename, 0, 1) . '.' : '';
        $avatar = $user->photo ? asset('images/users/' . $user->photo) : 'default-avatar-url';
        $gender = $user->prefixname == 'Mr.' ? 'Male' : ($user->prefixname == 'Ms.' ? 'Female' : 'Other');

        Detail::create([
            'key' => 'Full name',
            'value' => $fullName,
            'type' => $user->type,
            'user_id' => $user->id,
        ]);

        Detail::create([
            'key' => 'Middle Initial',
            'value' => $middleInitial,
            'type' => $user->type,
            'user_id' => $user->id,
        ]);

        Detail::create([
            'key' => 'Avatar',
            'value' => $avatar,
            'type' => $user->type,
            'user_id' => $user->id,
        ]);

        Detail::create([
            'key' => 'Gender',
            'value' => $gender,
            'type' => $user->type,
            'user_id' => $user->id,
        ]);
    }
}
