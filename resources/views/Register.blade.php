@extends('layouts.main')
@section('content')
 <div class="login_fon">
    <div class="wrapper">
    <form actiom="posts.blade.php" method="post">
        <h1>Register</h1>
        <div class="input-box">
            <input type="text" placeholder="Email" required>
            <i class='bx bx-envelope' ></i>
        </div>
        <div class="input-box">
            <input type="text" placeholder="Username" required>
            <i class='bx bx-user'></i>
        </div>
        <div class="input-box">
            <input type="password" placeholder="Password" required>
            <i class='bx bxs-lock-alt' ></i>
        </div>
        <button type="submit" class="btn">Register</button>
    </form>
  </div>
</div>  
@endsection