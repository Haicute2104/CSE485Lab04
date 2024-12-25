<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function borrows(){
        return $this->hasMany(Borrow::class);
    }
    protected $fillable = [
        'name',
        'author',
        'category',
        'year',
        'quantity'
    ];
}