<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Livewire\WithPagination;

class Role extends Model
{
    use WithPagination;

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    protected $fillable = [
        'name'
    ];
}
