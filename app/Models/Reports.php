<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    use HasFactory;
    protected $fillable = [
        'reason',
        'report_date',
        'todo_id'
    ];

    public function todos(){
        return $this->belongsTo(Todo::class);
    }
}
