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
        <p>Izbaukuma konsultācijas - mājas vizītes
          Nepieciešamības gadījumā, iespējama situāciju risināšana konkrētajā suņa uzturēšanās vidē. 🚗 </p>
         </div>
    <div class="grid-item item2"> 
        <img src="{{ asset('https://images.pexels.com/photos/8824105/pexels-photo-8824105.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1') }}" alt="logo">
        <p>Kucēnu un pieaugušu suņu apmācība, iepriekš izvēlētā vieta priekš tikšanās.</p>
    </div>
</div>

       <p>Šī ir Main</p>
    @endsection