<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use nguyenanhung\Backend\BaseAPI\Http\WebServiceUser;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->only('user', 'password');

        $config = config('api');
        $api = new WebServiceUser($config['OPTIONS']);
        $api->setSdkConfig($config);
        $api->setInputData($data)
            ->userLogin();

        return $api->getResponse();
    }

    public function register(Request $request)
    {
        $data = $request->only('username', 'fullname', 'email', 'password', 'confirm_password', 'phone');

        $config = config('api');
        $api = new WebServiceUser($config['OPTIONS']);
        $api->setSdkConfig($config);
        $api->setInputData($data)
            ->userRegister();

        return $api->getResponse();
    }
}
