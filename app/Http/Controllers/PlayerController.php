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
            'email' => 'required|email|unique:player|max:255',
            'password' => 'required|max:255'
        ]);

        $player = Player::create([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password_hash' => bcrypt($validated['password']),
            'gems' => 100,
            'stamina' => 10,
            'last_login' => now()
        ]);

        Auth::loginUsingId($player->player_id);
        return redirect()->route('game');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $player = Player::where('username', $validated['username'])->first();

        if ($player && Hash::check($validated['password'], $player->password_hash)) {
            $request->session()->put('player', $player);
            return redirect('/')->with('success', 'Vous êtes connecté avec sucée !');
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
        return view('players.show', compact('player'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'username' => 'required|max:255',
            'email' => 'required|email|unique:players,email,' . $id . '|max:255',
            'password' => 'nullable|max:255'
        ]);

        $player = Player::find($id);
        $player->username = $validated['username'];
        $player->email = $validated['email'];
        if ($validated['password']) {
            $player->password_hash = bcrypt($validated['password']);
        }
        $player->save();

        return redirect()->route('players.index')->with('success', 'Player updated successfully!');
    }

    public function destroy($id)
    {
        $player = Player::find($id);
        $player->delete();
        return redirect()->route('players.index')->with('success', 'Player deleted successfully!');
    }
}
