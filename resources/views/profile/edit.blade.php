@extends('layouts.main')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Rediģēt profilu</h2>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update', $user) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Pamatinformācija -->
                        <div class="mb-4">
                            <h4>Pamatinformācija</h4>
                            <hr>

                            <div class="form-group">
                                <label for="username">Lietotājvārds</label>
                                <input type="text" class="form-control" id="username" name="username" 
                                       value="{{ old('username', $user->username) }}" required>
                            </div>

                            <div class="form-group mt-3">
                                <label for="email">E-pasts</label>
                                <input type="email" class="form-control" id="email" name="email" 
                                       value="{{ old('email', $user->email) }}" required>
                            </div>
                        </div>

                        <!-- Profila bilde -->
                        <div class="mb-4">
                            <h4>Profila bilde</h4>
                            <hr>

                            <div class="form-group">
                                <label for="avatar">Izvēlēties bildi</label>
                                <input type="file" class="form-control-file" id="avatar" name="avatar">
                                
                                @if($user->profile && $user->profile->avatar)
                                    <div class="mt-2">
                                        <p>Pašreizējā bilde:</p>
                                        <img src="{{ asset('storage/'.$user->profile->avatar) }}" 
                                             class="img-thumbnail" style="max-width: 200px;">
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Kontaktinformācija -->
                        <div class="mb-4">
                            <h4>Kontaktinformācija</h4>
                            <hr>

                            <div class="form-group">
                                <label for="phone">Tālruņa numurs</label>
                                <input type="text" class="form-control" id="phone" name="phone" 
                                       value="{{ old('phone', $user->profile->phone ?? '') }}">
                            </div>
                        </div>

                        <!-- Adrese -->
                        <div class="mb-4">
                            <h4>Adrese</h4>
                            <hr>

                            <div class="form-group">
                                <label for="street">Iela</label>
                                <input type="text" class="form-control" id="street" name="street" 
                                       value="{{ old('street', $user->profile->street ?? '') }}">
                            </div>

                            <div class="form-group mt-3">
                                <label for="house_number">Mājas numurs</label>
                                <input type="text" class="form-control" id="house_number" name="house_number" 
                                       value="{{ old('house_number', $user->profile->house_number ?? '') }}">
                            </div>

                            <div class="form-group mt-3">
                                <label for="city">Pilsēta</label>
                                <input type="text" class="form-control" id="city" name="city" 
                                       value="{{ old('city', $user->profile->city ?? '') }}">
                            </div>

                            <div class="form-group mt-3">
                                <label for="postal_code">Pasta indekss</label>
                                <input type="text" class="form-control" id="postal_code" name="postal_code" 
                                       value="{{ old('postal_code', $user->profile->postal_code ?? '') }}">
                            </div>
                        </div>

                        <!-- Par sevi -->
                        <div class="mb-4">
                            <h4>Par sevi</h4>
                            <hr>

                            <div class="form-group">
                                <label for="about">Īss apraksts</label>
                                <textarea class="form-control" id="about" name="about" rows="4">{{ old('about', $user->profile->about ?? '') }}</textarea>
                            </div>
                        </div>

                        <!-- Mājdzīvnieki -->
                        <div class="mb-4">
                            <h4>Mājdzīvnieki</h4>
                            <hr>

                            <div id="pets-container">
                                @foreach($user->pets as $index => $pet)
                                    <div class="pet-item card mb-3">
                                        <div class="card-body">
                                            <input type="hidden" name="pets[{{ $index }}][id]" value="{{ $pet->id }}">
                                            
                                            <div class="form-group">
                                                <label>Vārds</label>
                                                <input type="text" class="form-control" name="pets[{{ $index }}][name]" 
                                                       value="{{ old('pets.'.$index.'.name', $pet->name) }}" required>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Vecums (gadi)</label>
                                                        <input type="number" class="form-control" name="pets[{{ $index }}][age]" 
                                                               value="{{ old('pets.'.$index.'.age', $pet->age) }}" required min="0">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Suga</label>
                                                        <select class="form-control" name="pets[{{ $index }}][species]" required>
                                                            <option value="suns" {{ $pet->species == 'suns' ? 'selected' : '' }}>Suns</option>
                                                            <option value="kaķis" {{ $pet->species == 'kaķis' ? 'selected' : '' }}>Kaķis</option>
                                                            <option value="putns" {{ $pet->species == 'putns' ? 'selected' : '' }}>Putns</option>
                                                            <option value="zivs" {{ $pet->species == 'zivs' ? 'selected' : '' }}>Zivs</option>
                                                            <option value="cits" {{ $pet->species == 'cits' ? 'selected' : '' }}>Cits</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" 
                                                       name="pets[{{ $index }}][is_trained]" value="1"
                                                       {{ $pet->is_trained ? 'checked' : '' }}>
                                                <label class="form-check-label">Dresēts</label>
                                            </div>
                                            
                                            <div class="form-check mt-2">
                                                <input type="checkbox" class="form-check-input" 
                                                       name="delete_pets[]" value="{{ $pet->id }}">
                                                <label class="form-check-label text-danger">Dzēst šo mājdzīvnieku</label>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Poga, lai pievienotu jaunu mājdzīvnieku -->
                            <button type="button" class="btn btn-success mt-2" id="add-pet">
                                <i class="fas fa-plus"></i> Pievienot mājdzīvnieku
                            </button>
                        </div>

                        <!-- Poga -->
                        <div class="form-group text-center mt-4">
                            <button type="submit" class="btn btn-primary">
                                Saglabāt izmaiņas
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Pievieno jaunu mājdzīvnieka lauku
    const addPetButton = document.getElementById('add-pet');
    
    if (addPetButton) {
        addPetButton.addEventListener('click', function() {
            const container = document.getElementById('pets-container');
            if (!container) return;
            
            const index = document.querySelectorAll('.pet-item').length;
            
            const newPetHtml = `
            <div class="pet-item card mb-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Vārds</label>
                        <input type="text" class="form-control" name="new_pets[${index}][name]" required>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Vecums (gadi)</label>
                                <input type="number" class="form-control" name="new_pets[${index}][age]" required min="0">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Suga</label>
                                <select class="form-control" name="new_pets[${index}][species]" required>
                                    <option value="">Izvēlieties...</option>
                                    <option value="suns">Suns</option>
                                    <option value="kaķis">Kaķis</option>
                                    <option value="putns">Putns</option>
                                    <option value="zivs">Zivs</option>
                                    <option value="cits">Cits</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" 
                               name="new_pets[${index}][is_trained]" value="1">
                        <label class="form-check-label">Dresēts</label>
                    </div>
                    
                    <button type="button" class="btn btn-sm btn-danger remove-pet">
                        <i class="fas fa-trash"></i> Noņemt
                    </button>
                </div>
            </div>
            `;
            
            container.insertAdjacentHTML('beforeend', newPetHtml);
        });
    }

    // Noņem mājdzīvnieka lauku
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-pet') || e.target.closest('.remove-pet')) {
            const petItem = e.target.closest('.pet-item');
            if (petItem) {
                petItem.remove();
            }
        }
    });
});
</script>
@endpush