<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use nguyenanhung\Backend\BaseAPI\Http\WebServiceProbeOpinion;

class ProbeOpinionController extends Controller
{
    public function list(Request $request)
    {
        $data   = $request->only('page_number', 'max_results', 'username', 'signature');
        $config = config('api');
        $api    = new WebServiceProbeOpinion($config['OPTIONS']);
        $api->setSdkConfig($config)->setInputData($data)->list();

        return $api->getResponse();
    }

    public function createOrUpdate(Request $request)
    {
        $data   = $request->only(
            'name',
            'question',
            'question_id',
            'size',
            'id',
            'location',
            'mime_type',
            'username',
            'signature',
            'status',
        );
        $config = config('api');
        $api    = new WebServiceProbeOpinion($config['OPTIONS']);
        $api->setSdkConfig($config)->setInputData($data)->createOrUpdate();

        return $api->getResponse();
    }

    public function show(Request $request)
    {
        $data   = $request->only('id', 'username', 'signature');
        $config = config('api');
        $api    = new WebServiceProbeOpinion($config['OPTIONS']);
        $api->setSdkConfig($config)->setInputData($data)->show();

        return $api->getResponse();
    }
}
