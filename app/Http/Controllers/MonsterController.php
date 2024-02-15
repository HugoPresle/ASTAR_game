<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Monster;
use App\Models\Type;
use App\Models\Monster_Type;

class MonsterController extends Controller
{
    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'image' => 'required|max:255',
            'base_attack' => 'required|max:255',
            'base_defense' => 'required|max:255',
            'base_speed' => 'required|max:255',
            'base_hp' => 'required|max:255',
            'base_rarity' => 'required|max:255'
        ]);

        $monster = Monster::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'image' => $validated['image'],
            'base_attack' => $validated['base_attack'],
            'base_defense' => $validated['base_defense'],
            'base_speed' => $validated['base_speed'],
            'base_hp' => $validated['base_hp'],
            'base_rarity' => $validated['base_rarity']
        ]);
        $monster->save();
        return redirect()->route('home');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'image' => 'required|max:255',
            'base_attack' => 'required|max:255',
            'base_defense' => 'required|max:255',
            'base_speed' => 'required|max:255',
            'base_hp' => 'required|max:255',
            'base_rarity' => 'required|max:255'
        ]);

        $monster = Monster::where('idMonster', $request->idMonster)->first();

        $monster->name = $validated['name'];
        $monster->description = $validated['description'];
        $monster->image = $validated['image'];
        $monster->base_attack = $validated['base_attack'];
        $monster->base_defense = $validated['base_defense'];
        $monster->base_speed = $validated['base_speed'];
        $monster->base_hp = $validated['base_hp'];
        $monster->base_rarity = $validated['base_rarity'];

        $monster->save();

        return redirect()->route('home');
    }

    public function delete(Request $request)
    {
        $monster = Monster::where('idMonster', $request->idMonster)->first();
        $monster->delete();

        return redirect()->route('home');
    }

    public function show($id)
    {
        $monster = Monster::find($id);
        return view('home', compact('monster'));
    }

}
