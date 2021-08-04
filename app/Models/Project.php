<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'description',
        'workCompleted',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'project_user', 'user_id', 'project_id');
    }

    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    public function dprs()
    {
        return $this->hasMany(Dpr::class);
    }
    use HasFactory;
}
