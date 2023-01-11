<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function scopeSearch($query){
        if(request('search')){
            return $query->where('name', 'like', '%' . request('search') . '%');
        }
    }

    public function cart(){
        return $this->belongsToMany(Cart::class);
    }
    public function transaction(){
        return $this->belongsToMany(Transaction::class);
    }
}
