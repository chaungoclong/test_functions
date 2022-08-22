<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use nguyenanhung\Backend\BaseAPI\Http\WebServicePermission;

class PermissionController extends Controller
{
    public function list(Request $request)
    {
        $data = $request->only('page_number', 'max_results', 'username', 'signature');

        $config = config('api');
        $api    = new WebServicePermission($config['OPTIONS']);
        $api->setSdkConfig($config);
        $api->setInputData($data)
            ->list();

        return $api->getResponse();
    }

    public function createOrUpdate(Request $request)
    {
        $data   = $request->only(
            'id',
            'name',
            'route',
            'modules',
            'action',
            'status',
            'note',
            'username',
            'signature'
        );
        $config = config('api');

        $api = new WebServicePermission($config['OPTIONS']);
        $api->setSdkConfig($config);
        $api->setInputData($data)
            ->createOrUpdate();

        return $api->getResponse();
    }

    public function show(Request $request)
    {
        $data = $request->only('id', 'username', 'signature');

        $config = config('api');
        $api    = new WebServicePermission($config['OPTIONS']);
        $api->setSdkConfig($config);
        $api->setInputData($data)
            ->show();

        return $api->getResponse();
    }
}
