<?php
/**
 * Project slack
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 08/20/2021
 * Time: 15:15
 */

namespace nguyenanhung\Slack;

use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client as Guzzle;

/**
 * Class SlackServiceProviderLaravel5
 *
 * @package   nguyenanhung\Slack
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class SlackServiceProviderLaravel5 extends ServiceProvider
{

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([__DIR__ . '/config/config.php' => config_path('slack.php')]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/config.php', 'slack');

        $this->app['nguyenanhung.slack'] = $this->app->share(function ($app) {
            return new Client(
                $app['config']->get('slack.endpoint'),
                [
                    'channel'                 => $app['config']->get('slack.channel'),
                    'username'                => $app['config']->get('slack.username'),
                    'icon'                    => $app['config']->get('slack.icon'),
                    'link_names'              => $app['config']->get('slack.link_names'),
                    'unfurl_links'            => $app['config']->get('slack.unfurl_links'),
                    'unfurl_media'            => $app['config']->get('slack.unfurl_media'),
                    'allow_markdown'          => $app['config']->get('slack.allow_markdown'),
                    'markdown_in_attachments' => $app['config']->get('slack.markdown_in_attachments')
                ],
                new Guzzle
            );
        });

        $this->app->bind('nguyenanhung\Slack\Client', 'nguyenanhung.slack');
    }

}
