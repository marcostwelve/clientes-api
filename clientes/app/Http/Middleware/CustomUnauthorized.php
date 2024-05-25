<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomUnauthorized
{
    public function handle(Request $request, Closure $next)
    {
        return response()->json(['message' => 'Não autorizado'], Response::HTTP_UNAUTHORIZED);
    }
}
