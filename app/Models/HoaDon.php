<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HoaDon extends Model
{
    use HasFactory,SoftDeletes;
    protected $table= 'table_hoa_don';
    protected $fillable = [
        'id_phong',
        'id_user',
        'id_km',
        'soLuong',
        'time',
        'pttt',
        'total',
        'status',
    ];
}
