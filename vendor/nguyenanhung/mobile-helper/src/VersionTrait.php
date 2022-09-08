<?php
/**
 * Project mobile-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 08/18/2021
 * Time: 07:35
 */

namespace nguyenanhung\Libraries\Mobile;

/**
 * Trait VersionTrait
 *
 * @package   nguyenanhung\Libraries\Mobile
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
trait VersionTrait
{
    /**
     * Function getVersion
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 08/18/2021 36:23
     */
    public function getVersion(): string
    {
        return self::VERSION;
    }

    /**
     * Function getHelperProperties
     *
     * @return array
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/20/2021 17:09
     */
    public function getHelperProperties(): array
    {
        return array(
            'name'         => self::PROJECT_NAME,
            'version'      => self::VERSION,
            'last_updated' => self::LAST_MODIFIED,
            'author_name'  => self::AUTHOR_NAME,
            'author_email' => self::AUTHOR_EMAIL,
            'author_url'   => self::AUTHOR_URL,
            'list_helper'  => array(
                'appleMailLink'          => 'Generate URL for Apple Mail Link',
                'appleSmsLink'           => 'Generate URL for Apple SMS Link',
                'applePhoneLink'         => 'Generate URL for Apple Phone Link',
                'appleFaceTimeVideoLink' => 'Generate URL for Apple Facetime Video Link',
                'appleFaceTimeAudioLink' => 'Generate URL for Apple Facetime Audio Link',
                'detectDeviceLinkName'   => 'Generate URL redirect for Device Name, such link mobile, link tablet',
                'detectDeviceLinkSystem' => 'Generate URL redirect for Device Name, such ios, android',
            )
        );
    }
}
