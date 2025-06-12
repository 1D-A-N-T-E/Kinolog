@extends('layouts.main')
@section('content')
<div class="login_fon">
  <div class="wrapper">
    <form actiom="posts.blade.php" method="post">
        <h1>Login</h1>
        <div class="input-box">
            <input type="text" placeholder="Email" required>
            <i class='bx bx-envelope' ></i>
        </div>
        <div class="input-box">
            <input type="password" placeholder="Password" required>
            <i class='bx bxs-lock-alt' ></i>
        </div>
        <div class="remember">
            <label><input type="checkbox">Remember me</label>
            <a href="#">Forgot password?</a>
        </div>

        <button type="submit" class="btn">Login</button>

        <div class="register-link">
            <p>Don't have an account? <a href="{{route('Register.index')}}">Register</a></p>
        </div>
    </form>
  </div>

</div>

@endsection