<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;
    public function book() 
    { 
        return $this->belongsTo(Books::class); 
    }
    public function reader() 
    { 
        return $this->belongsTo(Reader::class); 
    } 
    protected $fillable = [
        'status'
    ];
}
