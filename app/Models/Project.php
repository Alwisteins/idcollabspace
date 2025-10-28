<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'category_id',
        'status',
        'start_date',
        'end_date',
        'is_paid',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function members()
    {
        return $this->hasMany(ProjectMember::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function roles()
    {
        return $this->hasMany(ProjectRole::class);
    }
}
