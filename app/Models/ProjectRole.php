<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectRole extends Model
{
    protected $fillable = [
        'project_id',
        'role_id',
        'is_filled',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    // Setiap projectRole merefer ke satu role (misal: Frontend Developer)
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // Setiap projectRole bisa diisi oleh satu atau lebih member
    public function members()
    {
        return $this->hasMany(ProjectMember::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
