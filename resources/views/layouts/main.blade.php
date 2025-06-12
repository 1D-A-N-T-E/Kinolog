<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/stili.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/Footer.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Mājaslapa</title>
</head>
<body>
    <div class="Main-container">
    <div class="Second-container">
        <div class= "bilde">
        <img src="{{ asset('images/logobild.jpg') }}" alt="logo">
    </div >
   

        <div class="row">
            <nav>
                <ul>
                
                    <li> <a href="{{route('main.index')}}">KINOLOGS 🐾</a></li>
                    <li> <a href="#">POSTS</a></li>
                    <li><a href="{{route('about.index')}}">PAR</a></li>
                    <li><a href="{{route('contacts.index')}}">KONTAKTI ☎️</a></li>
                </ul>
            </nav>
            <div>
                
            </div>
        </div>
    </div>
    <div class="nav-right">
      <ul>
        <li class="login-button"><a href="{{route('Login.index')}}">Login</a></li>
        <li class="crate-button"><a href="{{route('Register.index')}}">Create</a></li>
      </ul>
    </div>
    </div>
    
    @yield('content')

    <footer class="site-footer">
  <div class="footer-left">
    <a href="{{route('main.index')}}">KINOLOGS 🐾</a>
    <a href="#">Suņu skola 🐕</a>
    <a href="#">Video 📎</a>
    <a href="{{route('contacts.index')}}">KONTAKTI ☎️</a>
  </div>

  <div class="footer-right">
    <div class="contact">
      <span>📱 +371 29643265</span>
      <p>Palīdzēšu saprast Jūsu suni! 🐕‍🦺</p>
    </div>
    <div class="social">
      <a href="#"><i class="fab fa-facebook-f"></i></a>
      <a href="https://www.instagram.com/klaiveniece?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="><i class="fab fa-instagram"></i></a>
      <a href="#"><i class="fab fa-whatsapp"></i>
      </a>
    </div>
  </div>
</footer>

</body>
</html>