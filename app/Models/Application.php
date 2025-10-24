<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'project_id',
        'project_role_id',
        'user_id',
        'message',
        'status'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function projectRole()
    {
        return $this->belongsTo(ProjectRole::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
