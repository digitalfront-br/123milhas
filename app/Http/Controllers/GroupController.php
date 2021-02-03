<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::all();
        return $groups;
    }
    public function show($uuid)
    {
        $group = Group::findOrFail($uuid);
        return $group;
    }
}
