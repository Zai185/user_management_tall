<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class RolePermission extends Pivot
{
    protected $table = 'role_permissions';
    public $timestamps = false;
    protected $fillable = [
        'role_id',
        'permission_id'
    ];
}
