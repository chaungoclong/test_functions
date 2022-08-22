<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use nguyenanhung\Backend\BaseAPI\Http\WebServiceUser;

class UserController extends Controller
{
    public function list(Request $request)
    {
        $data = $request->only('page_number', 'max_results', 'username', 'signature');

        $config = config('api');
        $api = new WebServiceUser($config['OPTIONS']);
        $api->setSdkConfig($config);
        $api->setInputData($data)
            ->list();

        return $api->getResponse();
    }

    public function createOrUpdate(Request $request)
    {
        $data = $request->only(
            'id',
            'department_id',
            'parent',
            'status',
            'user_name',
            'fullname',
            'address',
            'email',
            'avatar',
            'group_id',
            'password',
            'reset_password',
            'phone',
            'note',
            'photo',
            'thumb',
            'remember_token',
            'google_token',
            'google_refresh_token',
            'username',
            'signature'
        );
        $config = config('api');

        $api = new WebServiceUser($config['OPTIONS']);
        $api->setSdkConfig($config);
        $api->setInputData($data)
            ->createOrUpdate();

        return $api->getResponse();
    }

    public function show(Request $request)
    {
        $data = $request->only('id', 'username', 'signature');

        $config = config('api');
        $api = new WebServiceUser($config['OPTIONS']);
        $api->setSdkConfig($config);
        $api->setInputData($data)
            ->show();

        return $api->getResponse();
    }

    public function delete(Request $request)
    {
        $data = $request->only('id', 'username', 'signature');

        $config = config('api');
        $api = new WebServiceUser($config['OPTIONS']);
        $api->setSdkConfig($config);
        $api->setInputData($data)
            ->delete();

        return $api->getResponse();
    }
}
