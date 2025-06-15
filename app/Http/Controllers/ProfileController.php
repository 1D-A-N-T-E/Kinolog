<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use App\Models\Pet;
use App\Models\UserComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // Profila skatīšana
    public function show(User $user = null)
{
    // Ielādējam saistītos datus, ja tie nav ielādēti
    $user = $user ?: Auth::user();
    $user->load(['profile', 'pets', 'comments']);
    
    // Ja profilam nav avatar, iestatam noklusēto
    if (!$user->profile) {
        $user->profile = new Profile();
    }
    
    return view('profile.show', compact('user'));
}

    // Profila rediģēšanas forma
    public function edit(User $user)
{
    // Izveidojam profilu, ja tas neeksistē
    if (!$user->profile) {
        $user->profile()->create(['user_id' => $user->id]);
    }

    // Autorizācijas pārbaude
    $this->authorize('update', $user->profile);

    $user->load(['profile', 'pets', 'comments']);
    return view('profile.edit', compact('user'));
}

    // Profila atjaunināšana
   // ProfileController.php

public function update(Request $request, $id)
{
    $user = User::findOrFail($id);
    
    if (!$user->profile) {
        $user->profile()->create(['user_id' => $user->id]);
    }

    $this->authorize('update', $user->profile);

    // Validācija pamata profila datiem
    $validatedData = $request->validate([
        'username' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,'.$user->id,
        'street' => 'nullable|string|max:255',
        'house_number' => 'nullable|string|max:20',
        'city' => 'nullable|string|max:100',
        'postal_code' => 'nullable|string|max:20',
        'phone' => 'nullable|string|max:20',
        'about' => 'nullable|string|max:1000',
        'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'pets' => 'sometimes|array',
        'pets.*.id' => 'sometimes|exists:pets,id,user_id,'.$user->id,
        'pets.*.name' => 'required_with:pets|string|max:100',
        'pets.*.age' => 'required_with:pets|integer|min:0',
        'pets.*.species' => 'required_with:pets|string|max:50',
        'pets.*.is_trained' => 'sometimes|boolean',
        'new_pets' => 'sometimes|array',
        'new_pets.*.name' => 'required_with:new_pets|string|max:100',
        'new_pets.*.age' => 'required_with:new_pets|integer|min:0',
        'new_pets.*.species' => 'required_with:new_pets|string|max:50',
        'new_pets.*.is_trained' => 'sometimes|boolean',
    ]);

    // Atjaunina lietotāja pamatdatus
    $user->update([
        'username' => $validatedData['username'],
        'email' => $validatedData['email']
    ]);

    // Atjaunina profilu
    $user->profile()->update($request->only([
        'street', 'house_number', 'city',
        'postal_code', 'phone', 'about'
    ]));

    // Apstrādājam avatar
    if ($request->hasFile('avatar')) {
        $user->profile()->update([
            'avatar' => $this->handleAvatarUpload($request, $user)
        ]);
    }

    // Atjaunina esošos mājdzīvniekus
    if (isset($validatedData['pets'])) {
        foreach ($validatedData['pets'] as $petData) {
            $pet = Pet::find($petData['id']);
            $pet->update([
                'name' => $petData['name'],
                'age' => $petData['age'],
                'species' => $petData['species'],
                'is_trained' => $petData['is_trained'] ?? false
            ]);
        }
    }

    // Pievieno jaunus mājdzīvniekus
    if (isset($validatedData['new_pets'])) {
        foreach ($validatedData['new_pets'] as $newPetData) {
            $user->pets()->create([
                'name' => $newPetData['name'],
                'age' => $newPetData['age'],
                'species' => $newPetData['species'],
                'is_trained' => $newPetData['is_trained'] ?? false
            ]);
        }
    }

    // Dzēš atzīmētos mājdzīvniekus
    if ($request->has('delete_pets')) {
        Pet::whereIn('id', $request->input('delete_pets'))
            ->where('user_id', $user->id)
            ->delete();
    }

    return redirect()->route('profile.show', $user)
        ->with('success', 'Profils veiksmīgi atjaunināts');
}

protected function handleAvatarUpload(Request $request, User $user)
{
    if (!$request->hasFile('avatar')) {
        return null;
    }

    // Dzēšam veco avatar, ja tāds pastāv
    if ($user->profile->avatar) {
        Storage::disk('public')->delete($user->profile->avatar);
    }

    // Saglabājam jauno avatar
    return $request->file('avatar')->store('avatars', 'public');
}
// Mājdzīvnieka pievienošana
public function addPet(Request $request, User $user)
{
    $this->authorize('update', $user->profile);

    $validatedData = $request->validate([
        'name' => 'required|string|max:100',
        'age' => 'required|integer|min:0',
        'species' => 'required|string|max:50',
        'is_trained' => 'sometimes|boolean'
    ]);

    $user->pets()->create($validatedData);

    return redirect()->route('profile.edit', $user)
        ->with('success', 'Mājdzīvnieks veiksmīgi pievienots');
}

// Mājdzīvnieka rediģēšana
public function editPet(Pet $pet)
{
    $this->authorize('update', $pet->user->profile);

    return view('profile.edit-pet', compact('pet'));
}

// Mājdzīvnieka atjaunināšana
public function updatePet(Request $request, Pet $pet)
{
    $this->authorize('update', $pet->user->profile);

    $validatedData = $request->validate([
        'name' => 'required|string|max:100',
        'age' => 'required|integer|min:0',
        'species' => 'required|string|max:50',
        'is_trained' => 'sometimes|boolean'
    ]);

    $pet->update($validatedData);

    return redirect()->route('profile.edit', $pet->user)
        ->with('success', 'Mājdzīvnieka informācija veiksmīgi atjaunināta');
}

// Mājdzīvnieka dzēšana
public function destroyPet(Pet $pet)
{
    $this->authorize('update', $pet->user->profile);

    $pet->delete();

    return redirect()->route('profile.edit', $pet->user)
        ->with('success', 'Mājdzīvnieks veiksmīgi dzēsts');
}

}