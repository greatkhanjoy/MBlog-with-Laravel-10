<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,' . Auth::user()->id],
            'username' => ['required', 'alpha:ascii', 'unique:users,username,' . Auth::user()->id],
            'image' => ['image'],
            'bio' => ['string', 'nullable'],
            'twitter' => ['string', 'nullable'],
            'facebook' => ['string', 'nullable'],
            'instagram' => ['string', 'nullable'],
            'linkedin' => ['string', 'nullable']
        ]);

        $user = User::findOrFail(Auth::user()->id);

        $user->update([
            'name'  => $request->name,
            'email'  => $request->email,
            'username'  => $request->username,
            'image'  => $this->updateImage($request, 'image', 'uploads', $user->image),
            'bio'  => $request->bio,
            'twitter'  => $request->twitter,
            'facebook'  => $request->facebook,
            'instagram'  => $request->instagram,
            'linkedin'  => $request->linkedin,
        ]);

        // $request->user()->fill($request->validated());

        // if ($request->user()->isDirty('email')) {
        //     $request->user()->email_verified_at = null;
        // }

        // $request->user()->save();

        return Redirect::route('profile.edit')->with(['status' => 'profile-updated', 'success' => 'Updated Successfully.' ]);
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // $request->validateWithBag('userDeletion', [
        //     'password' => ['required', 'current_password'],
        // ]);

        $request->validate([
            'password' => ['required', 'current_password']
        ]);
        
        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
