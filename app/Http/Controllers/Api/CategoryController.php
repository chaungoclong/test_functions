<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use nguyenanhung\Backend\BaseAPI\Http\WebServiceCategory;
use nguyenanhung\Backend\BaseAPI\Http\WebServiceConfig;

class CategoryController extends Controller
{
    public function list(Request $request)
    {
        $data = $request->only('page_number', 'max_results', 'username', 'signature');

        $config = config('api');
        $api    = new WebServiceCategory($config['OPTIONS']);
        $api->setSdkConfig($config);
        $api->setInputData($data)
            ->list();

        return $api->getResponse();
    }

    public function createOrUpdate(Request $request)
    {
        $data   = $request->only(
            'id',
            'status',
            'name',
            'title',
            'language',
            'description',
            'keywords',
            'photo',
            'parent',
            'order_status',
            'show_top',
            'show_home',
            'show_right',
            'show_bottom',
            'level',
            'username',
            'signature'
        );
        $config = config('api');

        $api = new WebServiceCategory($config['OPTIONS']);
        $api->setSdkConfig($config);
        $api->setInputData($data)
            ->createOrUpdate();

        return $api->getResponse();
    }

    public function show(Request $request)
    {
        $data = $request->only('id', 'username', 'signature');

        $config = config('api');
        $api    = new WebServiceCategory($config['OPTIONS']);
        $api->setSdkConfig($config);
        $api->setInputData($data)
            ->show();

        return $api->getResponse();
    }
}
