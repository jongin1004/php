<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index() {
        $Groups = Group::get();
        
        return response()->json([
            'Groups' => $Groups,
        ], 200);
    }

    public function store() {
        $validated = request()->validate([
            'group_name' => 'required'
        ]);                   

        $Group = Group::create($validated);        

        return response()->json([
            'Group' => $Group
        ], 200);
    }
}
