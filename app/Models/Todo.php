<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'process',
        'deadline',
        'progress',
        'output',
        'complited',
        'completedtime',
        'transfered',
        'transferedWho',
        'user_id',
        'reason'
    ];

    protected $table = "todos";

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function transfers(){
        return $this->hasMany(Transfer::class);
    }

    public function reports(){
        return $this->hasMany(Reports::class);
    }
}
