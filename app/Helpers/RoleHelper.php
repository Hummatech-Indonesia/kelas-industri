<?php

namespace App\Helpers;

class RoleHelper
{
    public static function get_role(): mixed
    {
        return auth()->user()->roles->pluck('name')[0];
    }
}
