<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $casts = [
        'deadline' => 'date',
    ];

    protected $fillable = [
        'title',
        'description',
        'status',
        'deadline',
        'project_id',
    ];

    public function assignees()
    {
        return $this->belongsToMany(User::class, 'task_user')->withTimestamps();;
    }
}
