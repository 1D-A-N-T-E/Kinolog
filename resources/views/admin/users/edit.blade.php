@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Rediģēt lietotāju</h1>
    
    <form method="POST" action="{{ route('admin.users.update', $user) }}">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="username" class="form-label">Lietotājvārds</label>
            <input type="text" class="form-control" id="username" name="username" 
                   value="{{ old('username', $user->username) }}" required>
            @error('username')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="email" class="form-label">E-pasts</label>
            <input type="email" class="form-control" id="email" name="email" 
                   value="{{ old('email', $user->email) }}" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="is_admin" name="is_admin"  value="1" 
                   {{ old('is_admin', $user->is_admin) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_admin">Administrators</label>
        </div>
        
        <button type="submit" class="btn btn-primary">Saglabāt</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Atpakaļ</a>
    </form>
</div>
@endsection