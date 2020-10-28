<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', User::class);
        $data['users'] = User::where('active', 1)->where('id', '!=', Auth::id())->get();
        return view('pages.users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', User::class);
        return view('pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', User::class);
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|max:255',
            'role' => 'required',
            'password' => 'required|between:6,20'
        ]);

        $role = (int) $request->role;

        if ($role === 0) {
            return redirect()->route('users.create')->withErrors('O campo Função é obrigatório');
        }

        $verifyIfUserExists = User::where('email', $request->email);

        if (!$verifyIfUserExists->get()->isEmpty()) {
            return redirect()->route('users.create')->withErrors('E-mail ja cadastrado');
        }

        $user = new User();
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->name = $request->name;
        $user->role = $request->role;
        $user->active = 1;
        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $id = Auth::id();
        $data['user'] = User::find($id);

        return view('pages.users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|max:255',
        ]);

        $checkUserEmail = User::where('email', $request->email)->first();
        $user = User::find(Auth::id());

        if(!empty($checkUserEmail) && $checkUserEmail->id !== Auth::id()) {
            return redirect()->route('users.edit')->withErrors('E-mail ja cadastrado');
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('users.edit')->with('success', 'Perfil atualizado com sucesso!');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required|between:6,20',
        ]);

        if($request->newPassword !== $request->confirmNewPassword) {
            return redirect()->route('users.edit')->withErrors('Os campos Nova senha e Confirmar nova senha precisam ser iguais');
        }

        $user = User::find(Auth::id());

        if(!Hash::check($request->oldPassword, $user->password)) {
            return redirect()->route('users.edit')->withErrors('Senha atual incorreta');
        }

        $user->password = Hash::make($request->newPassword);
        $user->save();

        return redirect()->route('users.edit')->with('success', 'Senha alterada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', User::class);
        $user->active = 0;
        $user->save();

        return response()->json([], 200);
    }
}
