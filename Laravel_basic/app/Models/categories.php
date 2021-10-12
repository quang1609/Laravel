<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
