<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Auth;





class UserController extends Controller
{

    public function login(Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        if (Auth::user()->active) {
            // El usuario está activo, procede con la autenticación
            return redirect()->intended('/dashboard');
        } else {
            // El usuario está desactivado, redirige de vuelta con un mensaje de error
            return back()->with('error', 'Tu cuenta ha sido desactivada. Por favor, contacta al administrador.');
        }
    }

    // Las credenciales de autenticación son inválidas
    return back()->withErrors([
        'email' => 'Las credenciales proporcionadas no son válidas.',
    ]);
    }


    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function register()
    {
        return view('/register');
    }


    public function store(UserRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = bcrypt($validated['password']);
        User::create($validated);
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }


    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }


    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }


    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->update($request->all());

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function toggleActivation(User $user)
    {
        $user->active = !$user->active;
        $user->save();

        //return response()->json(['success' => true, 'active' => $user->active]);
        return redirect() ->route('users.index')/*->with('success', 'User updated successfully') */;
        toastr().info('Are you the 6 fingered man?');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        echo($user);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuario eliminado exitosamente.');
    }


}
