@extends('layouts.main')
@section('content')
<div class="MyEpastcontainer">
        <div class="container">
            <h1>Krista Bērziņa</h1>
            <p class="subtitle">Kinologe un suņu trenere</p>
        </div>
    </header>

    <nav class="container">
        <a href="kinologe.html">Par mani</a>
        <a href="kontakti.html" class="active">Kontakti</a>
    </nav>

    <main class="container contact-page">
        <h2>Sazinies ar mani</h2>
        
        <div class="contact-grid">
            <section class="contact-card">
                <div class="contact-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <h3>Adrese</h3>
                <p>Dzirnavu iela 12<br>Rīga, LV-1010<br>Latvija</p>
            </section>

            <section class="contact-card">
                <div class="contact-icon">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <h3>Telefons</h3>
                <p>
                    <a href="tel:+37121234567">+371 21234567</a><br>
                    (WhatsApp, Telegram)
                </p>
            </section>

            <section class="contact-card">
                <div class="contact-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <h3>E-pasts</h3>
                <p><a href="mailto:Krista.berzina@example.com">Krista.berzina@example.com</a></p>
            </section>

            <section class="contact-card social-card">
                <div class="contact-icon">
                    <i class="fas fa-hashtag"></i>
                </div>
                <h3>Soc. tīkli</h3>
                <div class="social-links">
                    <a href="https://instagram.com/Krista_kinologe" target="_blank">
                        <i class="fab fa-instagram"></i> @Krista_kinologe
                    </a>
                    <a href="https://facebook.com/Krista.kinologe" target="_blank">
                        <i class="fab fa-facebook-f"></i> /Krista.kinologe
                    </a>
                </div>
            </section>
        </div>

        
<div class="Epastcontainer">
    <h1>Sazinies ar mums</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('contacts.send') }}">
        @csrf
        
        <div class="form-group">
            <label for="name">Vārds</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        
        <div class="form-group">
            <label for="email">E-pasts</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        
        <div class="form-group">
            <label for="message">Ziņa</label>
            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Sūtīt ziņu</button>
    </form>
</div>
</div>
@endsection