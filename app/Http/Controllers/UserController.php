<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\UserServiceInterface;
use Illuminate\Http\RedirectResponse;
use App\Models\User;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function create()
    {
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

    public function store(UserRequest $request): RedirectResponse
    {
        //dd($request->all());
        $this->userService->createUser($request);

        return redirect()->route('users.create')->with('success', 'User created successfully');
    }

    public function index()
    {
        $page_data = [
            'module' => 'user',
            'url' => 'list-user',
            'title' =>'List Users',
            'sub_menu_url'=> '/role-list',
            'breadcrumbs' => [
                ['url' => '/dashboard', 'label' => 'Home'],
                ['url' => 'users/index', 'label' => 'List Users'],
            ]

        ];
        $users = $this->userService->getAllUsers();
        return view('users.index', compact('users','page_data'));
    }
    public function indexGrid()
    {
        $page_data = [
            'module' => 'user',
            'url' => 'list-user',
            'title' =>'List Users',
            'sub_menu_url'=> '/role-list',
            'breadcrumbs' => [
                ['url' => '/dashboard', 'label' => 'Home'],
                ['url' => 'users/index', 'label' => 'List Users'],
            ]

        ];
        $users = $this->userService->getAllUsers();
        return view('users.index-grid', compact('users','page_data'));
    }

    public function edit($id)
    {
        $page_data = [
            'module' => 'user',
            'url' => 'edit-user',
            'title' =>'Edit User',
            'sub_menu_url'=> '/role-list',
            'breadcrumbs' => [
                ['url' => '/dashboard', 'label' => 'Home'],
                ['url' => 'users/edit', 'label' => 'Edit User'],
            ]

        ];
        $user = $this->userService->findUserById($id);
        return view('users.edit', compact('user','page_data'));
    }
    public function update(UserRequest $request, $id)
    {
        $data = $request->validated();

        $updatedUser = $this->userService->updateUser($id, $request);
        
        if ($updatedUser) {
            return redirect()->route('users.index')->with('success', 'User updated successfully');
        }

        return back()->with('error', 'Failed to update user');
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return redirect()->route('users.index')->with('success', 'User Moved to Trash List!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to delete user.');
        }
    }

    public function show($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        //dd($user);
        return view('users.profile', compact('user'));
    }

    public function trashed()
    {
        $page_data = [
            'module' => 'user',
            'url' => 'trashed-user',
            'title' =>'Trashed Users',
            'sub_menu_url'=> '/role-list',
            'breadcrumbs' => [
                ['url' => '/dashboard', 'label' => 'Home'],
                ['url' => 'users/trashed', 'label' => 'Trashed Users'],
            ]

        ];
        if (auth()->check()) {
            if (auth()->user()->type === 'superadmin' || auth()->user()->type === 'admin') {
                $users = User::onlyTrashed()->get();
                return view('users.trashed', compact('users', 'page_data'));
            } else {
                return view('errors.403');
            }
        }
       
    }

    public function restore($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();

        return redirect()->route('users.trashed')->with('success', 'User restored successfully.');
    }
    public function forceDestroy($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->forceDelete();

        return redirect()->route('users.trashed')->with('success', 'User permanently deleted.');
    }

}
