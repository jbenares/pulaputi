<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class HeirarchyController extends Controller
{
    public function king_heirarchy()
    {
        $userid = auth()->user()->id;
        $mayors = User::where('king_id',$userid)->where('usertype', 'Mayor')->get();
        return view('heirarchy.king', compact('mayors'));
    }

    public function mayor_heirarchy()
    {
        $userid = auth()->user()->id;
        $coridors = User::where('mayor_id',$userid)->where('usertype', 'Coridor')->get();
        return view('heirarchy.mayor', compact('coridors'));
    }

    public function liaison_heirarchy()
    {
        $kings = User::where('usertype','King')->get();
        return view('heirarchy.liaison', compact('kings'));
    }

    public function operator_heirarchy()
    {
        $operator = User::where('usertype','King')->get();
        return view('heirarchy.operator', compact('operator'));
    }
}
