@foreach($users as $user)
    <div>
        {{ $user->username }}
        <form action="{{ route('users.destroy', $user) }}" method="POST">
            @csrf @method('DELETE')
            <button type="submit">Dzēst</button>
        </form>
    </div>
@endforeach