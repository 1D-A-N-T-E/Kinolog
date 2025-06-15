<form method="POST" action="{{ route('profile') }}">
    @csrf
    <input type="text" name="address" value="{{ auth()->user()->address }}">
    <input type="text" name="phone" value="{{ auth()->user()->phone }}">
    <input type="text" name="postal_code" value="{{ auth()->user()->postal_code }}">
    <button type="submit">Saglabāt</button>
</form>