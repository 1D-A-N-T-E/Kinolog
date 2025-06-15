
<h2>Jauna ziņa no kontaktformas</h2>
    
    <p><strong>Vārds:</strong> {{ $data['name'] }}</p>
    <p><strong>E-pasts:</strong> {{ $data['email'] }}</p>
    <p><strong>Ziņa:</strong></p>
    <p>{{ $data['message'] }}</p>
    
    <hr>
    <p>Šis e-pasts tika nosūtīts no {{ config('app.name') }}</p>