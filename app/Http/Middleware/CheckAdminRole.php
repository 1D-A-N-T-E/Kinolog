<?php

namespace App\Http\Middleware;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminRole
{
    public function handle(Request $request, Closure $next): Response
    {
        // Pārbauda, vai lietotājs ir autentificējies un ir administrators
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request);
        }

        // Ja nav administrators, novirza uz kļūdas lapu vai sākumlapu
        return redirect('/');
    }
}