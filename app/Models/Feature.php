<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Livewire\WithPagination;

class Feature extends Model
{
    public $timestamps = false;

    protected $fillables = [
        'name'
    ];

    public function permissions(): HasMany{
        return $this->hasMany(Permission::class);
    }
}
