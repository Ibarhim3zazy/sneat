<?php

use Illuminate\Support\Facades\Auth;

function permission(...$permission) {
    if (Auth::guard('admin')->user()->hasAnyPermission($permission)) return true;
    return false;
}