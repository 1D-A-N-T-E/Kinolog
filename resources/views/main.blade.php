@extends('layouts.main')
@section('content')
<div class="Apraksts">
    <div class= "fons">
     <p>"Strādājot ar suņiem, tu ne tikai māci viņiem – tu mācies no viņiem – par uzticību, pacietību un <br> beznosacījuma mīlestību."</p>
     
    </div>
        <div class= "teksts">
          
          <p> 🐶 Kas ir kinologs?</p>
            <p>Kinologs ir cilvēks, kurš palīdz Tev un Tavam sunim labāk saprasties. 🐾</p> 
                <p>Viņš māca suņiem paklausību, palīdz atrisināt uzvedības problēmas un sniedz padomus par audzināšanu un sadzīvi. Vai nu kucēns 
                    vai pieaudzis suns – kinologs palīdz visiem! 🦴💬</p>
                    <p>👩‍🏫 Esmu praktizējošs kinologs ar pieredzi darbā gan ar maziem kucēniem, gan ar pieaugušiem suņiem. 
                        Piedāvāju attālinātas konsultācijas, izbraukuma apmācības pie Jums mājās, kā arī praktiskus treniņus izvēlētā vietā. 
                        Katrs suns ir īpašs, un katram pielāgoju individuālu pieeju. 🤝🐕</p>
                    
         </div>
</div>

<div class="grid-container">
    <div class="grid-item item1"> 
        <h3>Pakalpojumi</h3>
    </div>
    <div class="grid-item item2"> 
        <img src="{{ asset('https://www.telegraph.co.uk/content/dam/eip/ee/work-from-home-guide/ee-wfh-1-woman-on-video-call-credit-getty.jpg?imwidth=960') }}" alt="logo">
        <p>Attālināta online konsultācija var būt pirmā palīdzība krīzes situācijā. Savlaicīgi konsultējoties pirms lēmumu pieņemšanas, 
            krīzes situāciju rašanos var novērst, pielietojot gūtās zināšanas. </p>
    </div>
    <div class="grid-item item2">
        <img src="{{ asset('https://media.istockphoto.com/id/1448400427/photo/smiling-businesswoman-driving-car.jpg?s=2048x2048&w=is&k=20&c=azdp3Dc_XtEoxl1ga6UlRzJ-JMs7GB1-_MbPdL_iI7Q=') }}" alt="logo">
        <p>Izbraukuma konsultācijas - mājas vizītes
          Nepieciešamības gadījumā, iespējama situāciju risināšana konkrētajā suņa uzturēšanās vidē. 🚗 </p>
         </div>
    <div class="grid-item item2"> 
        <img src="{{ asset('https://images.pexels.com/photos/8824105/pexels-photo-8824105.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1') }}" alt="logo">
        <p>Kucēnu un pieaugušu suņu apmācība, iepriekš izvēlētā tikšanās vieta.</p>
    </div>
</div>

<!-- Komentāru sadaļa -->
<div class="comments-section mt-5">
    <h3>Lietotāju komentāri</h3>
    
    @auth
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('comments.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <textarea name="comment" class="form-control" rows="3" 
                              placeholder="Jūsu komentārs..." required></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Publicēt</button>
            </form>
        </div>
    </div>
    @else
    <div class="alert alert-info">
        Lai pievienotu komentāru, lūdzu, <a href="{{ route('login') }}">pierakstieties</a>.
    </div>
    @endauth

    @isset($comments)
    <div class="comments-list">
        @forelse($comments as $comment)
            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">{{ $comment->user->username }}</h5>
                        <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                    </div>
                    <p class="mt-2 mb-3">{{ $comment->comment }}</p>
                    
                   
                    <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-danger" 
                                onclick="return confirm('Vai tiešām vēlaties dzēst šo komentāru?')">
                            <i class="fas fa-trash"></i> Dzēst
                        </button>
                    </form>
                   
                </div>
            </div>
        @empty
            <div class="alert alert-warning">Nav komentāru</div>
        @endforelse
        
        <div class="mt-4">
            {{ $comments->links() }}
        </div>
    </div>
    @else
    <div class="alert alert-warning">Komentāri nav pieejami</div>
    @endisset
</div>
      
    @endsection