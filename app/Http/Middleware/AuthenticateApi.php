<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AuthenticateApi extends Middleware
{
    protected function authenticate($request, array $guards)
    {
        
        //Разный способ передачи (приема) токена (api-ключ)
        $token = $request->query('api_token');
        
        if(empty($token)){
            $token = $request->input('api_token');
        }
        if(empty($token)){
            $token = $request->bearerToken();
        }
        
        //Сравниваем токен с тем, что хранится в наших настройках (в моем случае в env).
        if($token === env('API_KEY')) return;
        
        //Если неудачная авторизация, возвращаем "Неавторизован"
        $this->unauthenticated($request, $guards);
    }
}
