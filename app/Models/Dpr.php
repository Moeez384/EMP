<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dpr extends Model
{

    use HasFactory;

    protected $fillable = [
        'Sname',
        'project_id',
        'module_id',
        'details',
        'workCompleted',
        'date',
    ];

    public function projects()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }

    public function modules()
    {
        return $this->belongsTo(Module::class, 'module_id', 'id');
    }
}
