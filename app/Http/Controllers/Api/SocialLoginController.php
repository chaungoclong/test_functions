<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use nguyenanhung\Backend\BaseAPI\Http\WebServiceSSOLogin;

class SocialLoginController extends Controller
{
    public static function loginFaceBook()
    {
        $state = 'facebook';

        return self::login($state);
    }

    public static function loginGoogle()
    {
        $state = 'google';

        return self::login($state);
    }

    public static function loginInstagram()
    {
        $state = 'instagram';

        return self::login($state);
    }

    public static function loginGitHub()
    {
        $state = 'github';

        return self::login($state);
    }

    public static function loginLinkedIn()
    {
        $state = 'linkedin';

        return self::login($state);
    }

    public static function login($state)
    {
        $config = config('api');
        $api = new WebServiceSSOLogin($config['OPTIONS']);
        $api->setSdkConfig($config)
            ->setState($state)
            ->login();

        return $api->getResponse();
    }
}
