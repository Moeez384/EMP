<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable=[
        'name',
        'description',
        'workCompleted',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    use HasFactory;
}
