@extends('layouts.main')
@section('content')
<div class="login_fon">
  <div class="wrapper">
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <h1>Register</h1>
        
       
        <!-- E-pasta lauks -->
        <div class="input-box">
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
            <i class='bx bx-envelope'></i>
            @error('email')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        
        <!-- Lietotājvārda lauks -->
        <div class="input-box">
            <input type="text" name="username" placeholder="Username" value="{{ old('username') }}" required>
            <i class='bx bx-user'></i>
            @error('username')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        
        <!-- Paroles lauks -->
        <div class="input-box">
            <input type="password" name="password" placeholder="Password" required>
            <i class='bx bxs-lock-alt'></i>
            @error('password')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        
        <!-- Paroles apstiprināšanas lauks -->
        <div class="input-box">
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            <i class='bx bxs-lock-alt'></i>
        </div>
        
        <button type="submit" class="btn">Register</button>
    </form>
  </div>
</div>
@endsection