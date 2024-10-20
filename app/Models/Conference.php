<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->belongsToMany(User::class, 'conference_user');
    }

    protected $fillable = [
        'title',
        'description',
        'date_time',
        'location',
    ];
}
