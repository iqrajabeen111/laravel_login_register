<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $table = 'todo';

    protected $fillable = [
        'title',
        'description',
        'completed',
        'user_id',
    ];
    public function users()
    {
        return $this->hasMany(Todo::class,'user_id');
    }
    // public function tasks()
    // {
    //     // return $this->hasOne('App\Todo');  
    //     return $this->belongsTo(Todo::class,'user_id');
    // }
 
}
