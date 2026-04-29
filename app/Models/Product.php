<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name' ,
        'title'
    ];

    public function user() {
        $this->belongsTo(User::class , 'user_id');
    }
}
