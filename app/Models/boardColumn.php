<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class boardColumn extends Model
{
    use HasFactory;
    protected $fillable = ['Name', 'Color'];

    public function boardTask()
    {
        return $this->belongsToMany(boardTask::class);
    }
}
