<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project_users extends Model
{
    protected $fillable = [
        'user_id',
        'project_id',
    ];
    use HasFactory;
}
