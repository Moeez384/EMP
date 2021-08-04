<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable=[
        'project_id',
        'name',
    ];
    use HasFactory;

    public function projects()
    {
        return $this->belongsTo(Project::class);
    }

    public function dprs()
    {
        return $this->hasMany(Dpr::class);
    }
}
