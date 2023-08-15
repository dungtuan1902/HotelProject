<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class TypeRoom extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'table_loai_phong';
    protected $fillable = [
        'name',
        'image',
    ];
}