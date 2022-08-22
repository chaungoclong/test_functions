<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use nguyenanhung\Backend\BaseAPI\Http\WebServicePost;

class PostController extends Controller
{
    public function list(Request $request)
    {
        $data   = $request->only('page_number', 'max_results', 'username', 'signature');
        $config = config('api');
        $api    = new WebServicePost($config['OPTIONS']);
        $api->setSdkConfig($config)->setInputData($data)->list();

        return $api->getResponse();
    }

    public function createOrUpdate(Request $request)
    {
        $data   = $request->only(
            'title',
            'category_id',
            'language',
            'content',
            'type',
            'id',
            'status',
            'slide_view',
            'is_hot',
            'show_top',
            'comment_status',
            'tags',
            'username',
            'signature',
            'photo',
            'topic_id',
            'slugs',
            'summary'
        );
        $config = config('api');
        $api    = new WebServicePost($config['OPTIONS']);
        $api->setSdkConfig($config)->setInputData($data)->createOrUpdate();

        return $api->getResponse();
    }

    public function show(Request $request)
    {
        $data   = $request->only('id', 'username', 'signature');
        $config = config('api');
        $api    = new WebServicePost($config['OPTIONS']);
        $api->setSdkConfig($config)->setInputData($data)->show();

        return $api->getResponse();
    }
}
