<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
}
