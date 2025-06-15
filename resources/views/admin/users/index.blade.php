@extends('layouts.main')

@section('content')
<div class="Admincontainer">
    <h1>Lietotāju pārvalde</h1>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="Admintable">
        
    <thead>
            <tr>
                <th>ID</th>
                <th>Vārds</th>
                <th>E-pasts</th>
                <th>Administrators</th>
                <th>Reģistrēts</th>
                <th>Darbības</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->is_admin ? 'Jā' : 'Nē' }}</td>
                <td>{{ $user->created_at->format('d.m.Y H:i') }}</td>
                <td class="d-flex gap-2">
                    <a href="{{ route('admin.users.edit', $user) }}" class="AdminButton">Rediģēt</a>
                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" 
                            onclick="return confirm('Vai tiešām vēlaties dzēst šo lietotāju?')">
                            Dzēst
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    {{ $users->links() }}
</div>
@endsection