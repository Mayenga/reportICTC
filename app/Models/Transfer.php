<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;
    protected $fillable = [
        'transferDate',
        'user_id',
        'todo_id',
        'dpt_id'
    ];

    public function todos(){
        return $this->belongsTo(Todo::class);
    }
    public function users(){
        return $this->belongsTo(User::class);
    }
    public function departments(){
        return $this->belongsTo(Department::class);
    }
}
