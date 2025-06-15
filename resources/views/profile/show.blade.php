@extends('layouts.main')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card profile-card">
                <div class="card-header bg-white">
                    <h1 class="h4 mb-0">{{ $user->username }} profils</h1>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-profile">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-4 text-center">
                            <!-- Profila bilde -->
                            <div class="profile-avatar-container">
                               @if($user->profile && $user->profile->avatar)
    <img src="{{ asset('storage/'.$user->profile->avatar) }}" 
         class="img-thumbnail" style="max-width: 200px;">
@endif
                            </div>
                        </div>

                        <div class="col-md-8">
                            <!-- Pamatinformācija -->
                            <div class="profile-info-section">
                                <h3>Pamatinformācija</h3>
                                <div class="profile-info-item">
                                    <strong>E-pasts:</strong>
                                    <span>{{ $user->email }}</span>
                                </div>
                               
                                    <div class="profile-info-item">
                                        <strong>Tālrunis:</strong>
                                        <span>{{ $user->profile->phone }}</span>
                                    </div>
                               
                            </div>

                            <!-- Adreses informācija -->
                            
                                <div class="profile-info-section">
                                    <h3>Adrese</h3>
                                    
                                        <div class="profile-info-item">
                                            <strong>Iela:</strong>
                                            <span>{{ $user->profile->street }} {{ $user->profile->house_number }}</span>
                                        </div>
                                    
                                    
                                        <div class="profile-info-item">
                                            <strong>Pilsēta:</strong>
                                            <span>{{ $user->profile->city }}, {{ $user->profile->postal_code }}</span>
                                        </div>
                                    
                                </div>
                           

                            <!-- Par sevi -->
                            
                                <div class="profile-info-section">
                                    <h3>Par sevi</h3>
                                    <p class="text-muted">{{ $user->profile->about }}</p>
                                </div>
                        
                        </div>
                    </div>
                    <!-- Mājdzīvnieki -->
<div class="profile-info-section">
    <h3>Mājdzīvnieki</h3>
    
    @if($user->pets->count() > 0)
        <div class="row">
            @foreach($user->pets as $pet)
                <div class="col-md-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5>{{ $pet->name }}</h5>
                            <p class="mb-1"><strong>Suga:</strong> {{ ucfirst($pet->species) }}</p>
                            <p class="mb-1"><strong>Vecums:</strong> {{ $pet->age }} gadi</p>
                            <p class="mb-0"><strong>Dresēts:</strong> {{ $pet->is_trained ? 'Jā' : 'Nē' }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-muted">Nav pievienotu mājdzīvnieku.</p>
    @endif
</div>
                    <!-- Rediģēšanas poga -->
                    
                        <div class="text-center mt-4">
                            <a href="{{ route('profile.edit', $user) }}" class="btn profile-edit-btn">
                                <i class="fas fa-edit"></i> Rediģēt profilu
                            </a>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection