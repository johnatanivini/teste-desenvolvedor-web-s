<?php

namespace App\Http\Controllers\API;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\HttpException;

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
        try {

            if(Auth::attempt(['email'=>$request->email,'password'=> $request->password])){

                $user = Auth::user();
                $success['token'] = $user->createToken('appVendas')->accessToken;
                $success['name'] = $user->name;

                return $this->sendResponse($success, 'Login efetuado com sucesso!');
            }

            return $this->sendError('Não autorizado',['error'=>'Unauthorized']);

        } catch(Exception $e) {
            throw new HttpException(500, $e->getMessage());
        }
    }
}
