<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class categories extends Model
{
    use HasFactory,SoftDeletes;
    public $timestamps = true;
    protected $fillable = [
        'name',
        'quantity',     
    ];

    public function items()
    {
        return $this->hasMany('app\Models\items','id');
    }

    public static function getCategories()
    {
        return DB::table('categories')->paginate(20);
    }

    public static function addCategory($request)
    {
        return categories::create([
            'name' => (string) $request->input('name'),
            'quantity' => (int) $request->input('quantity'),
        ]);
    }
}
