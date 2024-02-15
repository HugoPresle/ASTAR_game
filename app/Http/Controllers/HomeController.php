<?php

namespace App\Http\Controllers;

use App\Models\Monster; // Import the Monster class
use App\Models\Type; // Import the Type class
use App\Models\Rarity; // Import the Rarity class

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $monsters = Monster::with('monsterTypes.type', 'rarity')->get();
        $types = Type::all();
        $raritys = Rarity::all();

        return view('welcome', compact('monsters', 'types', 'raritys'));
    }
}
