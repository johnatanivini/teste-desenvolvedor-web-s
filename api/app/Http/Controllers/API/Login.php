<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends BaseController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if(Auth::attempt(['email'=>$request->email,'password'=> $request->password])){

            $user = Auth::user();
            $success['token'] = $user->createToken('appVendas')->accessToken;
            $success['name'] = $user->name;

            return $this->sendResponse($success, 'Login efetuado com sucesso!');
        }

        return $this->sendError('Não autorizado',['error'=>'Unauthorized']);
    }
}
