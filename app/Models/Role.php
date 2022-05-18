<?php

namespace App\Models;

use App\Transformers\RoleTransformer;
use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    public $transformer = RoleTransformer::class;
    public $guarded = [];
}
