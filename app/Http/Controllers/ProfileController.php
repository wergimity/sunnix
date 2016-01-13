<?php
namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfile;
use App\Models\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        return view('profile')->with('user', auth()->user());
    }

    public function update(UpdateProfile $request)
    {
        /** @var User $user */
        $user = auth()->user();

        $user->fill($request->all());

        $user->save();

        return redirect()->action(static::class.'@show');
    }
}