<?php

namespace App\Models;

use App\Transformers\PermissionTransformer;
use Laratrust\Models\LaratrustPermission;

class Permission extends LaratrustPermission
{
    public $transformer = PermissionTransformer::class;
    public $guarded = [];
}
