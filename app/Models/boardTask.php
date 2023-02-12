<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class boardTask extends Model
{
    use HasFactory;

    protected $fillable = ['Titel', 'Priority', 'Type', 'Column_id', 'ColorTask'];

    public function boardColumn()
    {
        return $this->belongsTo(boardColumn::class);
    }
}
