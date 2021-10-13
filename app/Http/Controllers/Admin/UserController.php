<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\AddRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
           $user = Auth::user();
           if ($user->role == 1) {
                $users = User::paginate(20);
                return view('admin.users.list',[
                    'title' => 'Danh sách người dùng',
                    'users' => $users
                ]);
           } else {
               return redirect('admin/main')->with('message','Your are not Admin');
           }
        }
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role == 1) {
                return view('admin.users.add',[
                    'title' => 'Thêm người dùng',
                ]); 
            } else {
                return redirect('admin/main')->with('message','Your are not Admin');
            }
         }
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddRequest $request)
    {
        try {
            User::create([
                'name' => (string) $request->input('name'),
                'email' => (string) $request->input('email'),
                'password' => (string) Hash::make($request->input('password')),
                'role' => (int) $request->input('role'),
            ]);
            Session::flash('success', 'created successfully');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
        }
        return redirect()->back();
    }
    /**
     * Display the specified item.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = Auth::user();
        return view('admin.users.change',[
            'title' => 'Thông tin người dùng',
            'user' => $user
        ]);
    }

    /**
     * Update the specified item in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $user = Auth::user();
            $user->fill($request->input());
            $user->save();
            Session::flash('success','Thay đổi thông tin thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
        }
        return redirect()->back();
    }
}
