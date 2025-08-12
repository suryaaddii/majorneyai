<?php

namespace App\Http\Controllers;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Throwable;

class GoogleLoginController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (Throwable $e) {
            return redirect()->route('beranda')->with('error', 'Google authentication failed.');
        }

        // Cari user berdasarkan email
        $existingUser = User::where('email', $googleUser->getEmail())->first();

        if ($existingUser) {
            // Update nama dan avatar (opsional)
            $existingUser->update([
                'name' => $googleUser->getName(),
                'avatar' => $googleUser->getAvatar(),
            ]);

            Auth::login($existingUser);
        } else {
            // Buat user baru
            $newUser = User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'avatar' => $googleUser->getAvatar(),
                'password' => bcrypt(Str::random(16)),
                'email_verified_at' => now()
            ]);

            Auth::login($newUser);
        }

        return redirect()->route('rekomendasi');
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('beranda');
    }
}
