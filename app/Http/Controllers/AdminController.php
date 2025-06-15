<?php

namespace App\Http\Controllers;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Constructor - pievieno middleware
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Administrācijas paneļa galvenā lapa
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    /**
     * Lietotāju saraksts
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Rādīt lietotāja rediģēšanas formu
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Atjaunināt lietotāja datus
     */
    public function update(Request $request, User $user)
{
    $validated = $request->validate([
        'username' => 'required|string|max:255|unique:users,username,'.$user->id,
        'email' => 'required|email|unique:users,email,'.$user->id,
        'is_admin' => 'sometimes|boolean'
    ]);

    // Pārbaude, vai checkbox ir atzīmēts
    $validated['is_admin'] = $request->has('is_admin');

    $user->update($validated);

    return redirect()->route('admin.users.index')
        ->with('success', 'Lietotāja dati veiksmīgi atjaunināti!');
}

    /**
     * Dzēst lietotāju
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')
            ->with('success', 'Lietotājs veiksmīgi dzēsts!');
    }
}