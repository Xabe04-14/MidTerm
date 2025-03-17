<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments'; // Tên bảng trong database

    protected $fillable = [
        'username',
        'comment',
        'id_product',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
}

