<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class items extends Model
{
    use HasFactory,SoftDeletes;
    public $timestamps = true;
    protected $fillable = [
        'name',
        'quantity',
        'user_id',
        'category_id',     
    ];
    
    public function users()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    
    public function categories()
    {
        return $this->belongsTo('App\Models\User',' category_id');
    }

    public static function getItems($request)
    {
        $itemQuery = DB::table('items')->where('name', 'like', "%" . $request->keyword . "%");
        $item = $itemQuery->orderByDesc('id')->paginate(20);

        return $item;
    }

    public static function addItem($request)
    {
        return items::create([
            'name' => (string) $request->input('name'),
            'quantity' => (int) $request->input('quantity'),
            'user_id' => (int) $request->input('user_id'),
            'category_id' => (int) $request->input('category_id'),
        ]);
    }

    public static function findByID($id){
        return items::find($id);
    }

    public static function updateItem($request, $id)
    {
        items::find($id);
        $item = items::findById($id);
        $item->fill($request->input());
        return $item;
    }
}
