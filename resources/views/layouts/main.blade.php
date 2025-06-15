<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/stili.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/Footer.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/admin.edit.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/Kontakti.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
                    <li><a href="{{route('about.index')}}">PAR MANI</a></li>
                    <li><a href="{{route('contacts.index')}}">KONTAKTI ☎️</a></li>
                    @auth
    @if (Auth::user()->is_admin)
        <a href="{{ route('admin.index') }}">Admin Panel</a>
    @endif
@endauth
                </ul>
            </nav>
            <div>
                
            </div>
        </div>
    </div>
    <div class="Lietotajanav">
    <ul>
        @auth
            <!-- Lietotāja izvēlne (redzama tikai ielogotiem lietotājiem) -->
            <li class="user-menu">
                <a href="#" class="user-dropdown">
                    <i class='bx bx-user-circle'></i> {{ Auth::user()->username }}
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('profile') }}">Mans profils</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="logout-btn">Izlogoties</button>
                        </form>
                    </li>
                </ul>
            </li>
        @else
            <!-- Pogas nereģistrētiem lietotājiem -->
            <li class="login-button"><a href="{{ route('login') }}">Login</a></li>
            <li class="create-button"><a href="{{ route('register') }}">Create</a></li>
        @endauth
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
<!-- Pārliecinieties, ka jQuery ir ielādēts (ja izmantojat) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS (ja izmantojat) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>



<!-- Jūsu pielāgotais JS -->
 <script>
document.addEventListener('DOMContentLoaded', function() {
    // Pārbauda dzēšanas formas iesniegšanu
    document.querySelectorAll('form[method="DELETE"]').forEach(form => {
        form.addEventListener('submit', function(e) {
            if (!confirm('Vai tiešām vēlaties dzēst šo komentāru?')) {
                e.preventDefault();
            } else {
                // Pievieno ielādes indikatoru
                this.querySelector('button').innerHTML = '<i class="fas fa-spinner fa-spin"></i> Dzēš...';
                this.querySelector('button').disabled = true;
            }
        });
    });
});
</script>
@stack('scripts')
</body>
</html>