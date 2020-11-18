<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class ProfilesController extends Controller
{
    public function show (User $user) {
        return view('profiles.show', [
            'user' => $user,
            'tweets' => $user->tweets()->withLikes()->paginate(15),
        ]);
    }

    public function edit (User $user) {

        // $this->authorize('edit', $user);

        // abort_if($user->isNot(current_user()), 404);//test owl user
        // if($user->isNot(current_user())){
        //     abort(404);
        // }
        return view('profiles.edit', compact('user'));
    }

    public function update (User $user) {
        // dd(request('avatar'));
        $attributes = request()->validate([
            'name' => ['string', 'required', 'max:255'],
            'username' => ['string', 'required', 'max:255', 'alpha_dash', Rule::unique('users')->ignore($user)],
            'avatar' => ['file'],
            'email' => ['string', 'required', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'password' => ['string', 'required', 'min:8', 'max:255', 'confirmed']
        ]);

        if (request('avatar')) {
            $attributes['avatar'] = request('avatar')->store('avatars');
        }


        $user->update($attributes);

        return redirect($user->path());
    }

}
