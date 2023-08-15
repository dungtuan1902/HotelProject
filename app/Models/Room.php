<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'table_phong';
    protected $fillable = [
        'id_lp',
        'name',
        'soLuong',
        'price',
        'image',
        'img_descrition',
        'description',
        'note',
        'action',
    ];

}