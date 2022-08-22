<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use nguyenanhung\Backend\BaseAPI\Http\WebServiceLanguage;

class LanguageController extends Controller
{
    public function list(Request $request)
    {
        $data   = $request->only('page_number', 'max_results', 'username', 'signature');
        $config = config('api');
        $api    = new WebServiceLanguage($config['OPTIONS']);
        $api->setSdkConfig($config)->setInputData($data)->list();

        return $api->getResponse();
    }

    public function createOrUpdate(Request $request)
    {
        $data   = $request->only(
            'name',
            'full_name',
            'code',
            'status',
            'locale',
            'default',
            'username',
            'signature',
            'flag',
            'id',
        );
        $config = config('api');
        $api    = new WebServiceLanguage($config['OPTIONS']);
        $api->setSdkConfig($config)->setInputData($data)->createOrUpdate();

        return $api->getResponse();
    }

    public function show(Request $request)
    {
        $data   = $request->only('id', 'username', 'signature');
        $config = config('api');
        $api    = new WebServiceLanguage($config['OPTIONS']);
        $api->setSdkConfig($config)->setInputData($data)->show();

        return $api->getResponse();
    }
}
