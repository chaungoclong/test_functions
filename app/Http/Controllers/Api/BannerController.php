<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use nguyenanhung\Backend\BaseAPI\Http\WebServiceBanner;

class BannerController extends Controller
{
    public function list(Request $request)
    {
        $data   = $request->only('page_number', 'max_results', 'username', 'signature');
        $config = config('api');
        $api    = new WebServiceBanner($config['OPTIONS']);
        $api->setSdkConfig($config)->setInputData($data)->list();

        return $api->getResponse();
    }

    public function createOrUpdate(Request $request)
    {
        $data   = $request->only(
            'name',
            'title',
            'size',
            'id',
            'location',
            'mime_type',
            'username',
            'signature',
            'status',
        );
        $config = config('api');
        $api    = new WebServiceBanner($config['OPTIONS']);
        $api->setSdkConfig($config)->setInputData($data)->createOrUpdate();

        return $api->getResponse();
    }

    public function show(Request $request)
    {
        $data   = $request->only('id', 'username', 'signature');
        $config = config('api');
        $api    = new WebServiceBanner($config['OPTIONS']);
        $api->setSdkConfig($config)->setInputData($data)->show();

        return $api->getResponse();
    }
}
