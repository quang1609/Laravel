<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Item\AddRequest;
use App\Models\items;
use App\Models\User;
use App\Models\categories;
use App\Jobs\SandMail;


class ItemController extends Controller
{
    /**
     * Display a listing of the item.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemQuery = items::where('name', 'like', "%" . $request->keyword . "%");
        $item = $itemQuery->orderByDesc('id')->paginate(20);
        $cate = categories::all();
        $user = User::all();
        return view('admin.items.list', compact('item', 'cate', 'user'),[
            'title' => 'danh sách Items'
        ]);
    }

    /**
     * Show the form for creating a new item.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        $category = categories::all();
        return view('admin.Items.add',[
            'title' => 'Add item',
            'user' => $user,
            'category' => $category
        ]);
    }

    /**
     * Store a newly created item in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddRequest $request)
    {
        try {
            items::create([
                'name' => (string) $request->input('name'),
                'quantity' => (int) $request->input('quantity'),
                'user_id' => (int) $request->input('user_id'),
                'category_id' => (int) $request->input('category_id'),
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
    public function show($id)
    {
        $item = items::find($id);
        $user = User::all();
        $category = categories::all();
        return view('admin.Items.edit',[
            'title' => 'Chỉnh sửa Items' . $item->name,
            'item' => $item,
            'user' => $user,
            'category' => $category
        ]);
    }

    /**
     * Update the specified item in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddRequest $request, $id)
    {
        try {
            $item = items::find($id);
            $item->fill($request->input());
            $item->save();
            Session::flash('success', 'update successfully');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
        }
        return redirect()->back();
    }

    /**
     * Remove the specified item from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = items::find($id);
        $user_id = $item->user_id;
        $user = User::find($user_id);
        SandMail::dispatch($user->email)->delay(now()->addSeconds(5));
        $item->delete();
        $item->save();
        Session::flash('success', 'deleted successfully');
        return redirect('admin/item/list');
    }
}
