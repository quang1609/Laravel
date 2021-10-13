<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\categories;
use App\Http\Requests\Category\AddRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the category.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = categories::getCategories();
        
        return view('admin.categories.list',[
            'title' => 'Danh sách thể loại',
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new category.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role == 1) {
                 return view('admin.categories.add',[
                    'title' => 'Thêm thể loại'
                ]);
            } else {
                return redirect()->back()->with('message','Your are not Admin');
            }
         }
    }

    /**
     * Store a newly created category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddRequest $request)
    {
        try {
            categories::addCategory($request);
            Session::flash('success', 'created successfully');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
        }
        return redirect()->back();
    }
}
