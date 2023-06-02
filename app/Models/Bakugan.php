<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bakugan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id'
    ];

    public function users(){
        return $this->belongsToMany(User::class,'users_bakugans');
    }
}
