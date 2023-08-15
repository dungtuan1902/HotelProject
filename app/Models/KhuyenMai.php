<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KhuyenMai extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='table_khuyen_mai';
    protected $fillable=[
        'name',
        'code',
        'value',
        'time',
        'note',
    ];
}
