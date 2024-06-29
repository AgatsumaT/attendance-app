<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breakstamp extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'breakIn',
        'breakOut'
    ];

    public function timestamps()
    {
        return $this->belongsTo(timestamp::class);
    }
}
