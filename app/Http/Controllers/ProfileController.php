<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $usuario = Auth::user();
        return view("profile.edit", compact("usuario"));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = auth()->user();

        if($request->pfp != null) {
            $source = file_get_contents($request->file('pfp')->path());
            $base64 = base64_encode($source);
            $blob = 'data:png;base64,' . $base64;
            $img = $blob;
        }else
            $img = $user->pfp;

        //más fácil hacerlo así que bien, pero no encontraba otra forma
        $user->update([
            'name' => $request->name ?? $user->name,
            'email' => $request->email ?? $user->email,
            'password' => $request->password != null ? Hash::make($request->password) : $user->password,
            'info' => $request->info ?? $user->info,
            'pfp' => $img,
            'admin' => $user->admin,
        ]);

        return redirect(route('usuario.index'));
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
