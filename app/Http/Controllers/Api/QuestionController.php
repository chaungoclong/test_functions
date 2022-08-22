<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use nguyenanhung\Backend\BaseAPI\Http\WebServiceQuestion;

class QuestionController extends Controller
{
    public function list(Request $request)
    {
        $data   = $request->only('page_number', 'max_results', 'username', 'signature');
        $config = config('api');
        $api    = new WebServiceQuestion($config['OPTIONS']);
        $api->setSdkConfig($config)->setInputData($data)->list();

        return $api->getResponse();
    }

    public function createOrUpdate(Request $request)
    {
        $data   = $request->only(
            'question',
            'id',
            'username',
            'signature',
            'status',
        );
        $config = config('api');
        $api    = new WebServiceQuestion($config['OPTIONS']);
        $api->setSdkConfig($config)->setInputData($data)->createOrUpdate();

        return $api->getResponse();
    }

    public function show(Request $request)
    {
        $data   = $request->only('id', 'username', 'signature');
        $config = config('api');
        $api    = new WebServiceQuestion($config['OPTIONS']);
        $api->setSdkConfig($config)->setInputData($data)->show();

        return $api->getResponse();
    }
}
