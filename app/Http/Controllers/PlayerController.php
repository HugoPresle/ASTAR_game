<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PlayerController extends Controller
{

    public function create(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|max:255',
            'email' => 'required|email|unique:Player|max:255',
            'password' => 'required|max:255'
        ]);

        $player = Player::create([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'img'   => 'https://i.imgur.com/1qZr9zV.png',
            'lvl' => 1,
            'xp' => 0,
            'money' => 100,
            'gem' => 100,
            'stamina' => 10,
            'create_time' => now(),
            'last_login' => now()
        ]);

        Auth::login($player);
        $request->session()->put('player', $player);
        return redirect()->route('home')->with('success', 'Vous êtes connecté avec succès !');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $player = Player::where('username', $validated['username'])->first();

        if ($player && Hash::check($validated['password'], $player->password)) {
            $request->session()->put('player', $player);

            $player->last_login = now();
            $player->save();

            return redirect()->route('home')->with('success', 'Vous êtes connecté avec succès !');
        } else {
            return redirect('/login')->with('fail', 'Mot de passe ou login incorrect !');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('player');
        return redirect('/login')->with('success', 'Vous êtes déconnecté !');
    }

    public function show($id)
    {
        $player = Player::find($id);
        return view('player.show', compact('player'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'username' => 'required|max:255',
            'email' => 'required|email|unique:player,email,' . $id . '|max:255',
            'password' => 'nullable|max:255'
        ]);

        $player = Player::find($id);
        $player->username = $validated['username'];
        $player->email = $validated['email'];
        if ($validated['password']) {
            $player->password = bcrypt($validated['password']);
        }
        $player->save();

        return redirect()->route('player.index')->with('success', 'player updated successfully!');
    }

    public function destroy($id)
    {
        $player = Player::find($id);
        $player->delete();
        return redirect()->route('Player.index')->with('success', 'Player deleted successfully!');
    }
}
