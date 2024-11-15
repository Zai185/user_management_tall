<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Ramsey\Uuid\FeatureSet;

class Permission extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name'
    ];
    public function feature(): BelongsTo
    {
        return $this->belongsTo(Feature::class);
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_permissions', 'permission_id', 'role_id')
            ->using(RolePermission::class);
    }
}
