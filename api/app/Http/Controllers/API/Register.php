<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Register extends BaseController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $validators = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password'
        ]);

        if($validators->fails()){
            return $this->sendError('Erro de validação',$validators->errors());
        }

        $querys = $request->all();
        $querys['password'] = bcrypt($querys['password']);
        $user = User::create($querys);
        $success['token'] = $user->createToken('appVendas')->accessToken;
        $success['name'] = $user->name;

        return $this->sendResponse($success, 'Usuário registrado com sucesso!');
    }
}
