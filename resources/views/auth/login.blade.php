@extends('layouts.main')
@section('content')
<div class="login_fon">
  <div class="wrapper">
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <h1>Login</h1>
        
        <!-- E-pasta lauks -->
        <div class="input-box">
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
            <i class='bx bx-envelope'></i>
            @error('email')
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
        
        <!-- Atcerēties mani un aizmirstā parole -->
        <div class="remember">
            <label>
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                Remember me
            </label>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">Forgot password?</a>
            @endif
        </div>
        
        <button type="submit" class="btn">Login</button>
        
        <!-- Reģistrācijas saite -->
        <div class="register-link">
            <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
        </div>
    </form>
  </div>
</div>
@endsection