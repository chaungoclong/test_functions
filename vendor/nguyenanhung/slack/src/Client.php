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

use GuzzleHttp\Client as Guzzle;

/**
 * Class Client
 *
 * @package   nguyenanhung\Slack
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class Client
{
    /**
     * The Slack incoming webhook endpoint
     *
     * @var string
     */
    protected $endpoint;

    /**
     * The default channel to send messages to
     *
     * @var string
     */
    protected $channel;

    /**
     * The default username to send messages as
     *
     * @var string
     */
    protected $username;

    /**
     * The default icon to send messages with
     *
     * @var string
     */
    protected $icon;

    /**
     * Whether to link names like @regan or leave
     * them as plain text
     *
     * @var boolean
     */
    protected $link_names = false;

    /**
     * Whether Slack should unfurl text-based URLs
     *
     * @var boolean
     */
    protected $unfurl_links = false;

    /**
     * Whether Slack should unfurl media URLs
     *
     * @var boolean
     */
    protected $unfurl_media = true;

    /**
     * Whether message text should be formatted with Slack's
     * Markdown-like language
     *
     * @var boolean
     */
    protected $allow_markdown = true;

    /**
     * The attachment fields which should be formatted with
     * Slack's Markdown-like language
     *
     * @var array
     */
    protected $markdown_in_attachments = [];


    /**
     * The Guzzle HTTP client instance
     *
     * @var \GuzzleHttp\Client
     */
    protected $guzzle;

    /**
     * Instantiate a new Client
     *
     * @param                         $endpoint
     * @param array                   $attributes
     * @param \GuzzleHttp\Client|NULL $guzzle
     *
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     */
    public function __construct($endpoint, array $attributes = [], Guzzle $guzzle = null)
    {
        $this->endpoint = $endpoint;

        if (isset($attributes['channel'])) {
            $this->setDefaultChannel($attributes['channel']);
        }

        if (isset($attributes['username'])) {
            $this->setDefaultUsername($attributes['username']);
        }

        if (isset($attributes['icon'])) {
            $this->setDefaultIcon($attributes['icon']);
        }

        if (isset($attributes['link_names'])) {
            $this->setLinkNames($attributes['link_names']);
        }

        if (isset($attributes['unfurl_links'])) {
            $this->setUnfurlLinks($attributes['unfurl_links']);
        }

        if (isset($attributes['unfurl_media'])) {
            $this->setUnfurlMedia($attributes['unfurl_media']);
        }

        if (isset($attributes['allow_markdown'])) {
            $this->setAllowMarkdown($attributes['allow_markdown']);
        }

        if (isset($attributes['markdown_in_attachments'])) {
            $this->setMarkdownInAttachments($attributes['markdown_in_attachments']);
        }

        $this->guzzle = $guzzle ? : new Guzzle;
    }

    /**
     * Pass any unhandled methods through to a new Message
     * instance
     *
     * @param string $name      The name of the method
     * @param array  $arguments The method arguments
     *
     * @return \nguyenanhung\Slack\Message
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 3/6/20 11:47
     */
    public function __call(string $name, array $arguments)
    {
        $message = $this->createMessage();

        call_user_func_array([$message, $name], $arguments);

        return $message;
    }

    /**
     * Get the Slack endpoint
     *
     * @return string
     */
    public function getEndpoint(): string
    {
        return $this->endpoint;
    }

    /**
     * Set the Slack endpoint
     *
     * @param string $endpoint
     *
     * @return void
     */
    public function setEndpoint(string $endpoint)
    {
        $this->endpoint = $endpoint;
    }

    /**
     * Get the default channel messages will be created for
     *
     * @return string
     */
    public function getDefaultChannel(): string
    {
        return $this->channel;
    }

    /**
     * Set the default channel messages will be created for
     *
     * @param string $channel
     *
     * @return void
     */
    public function setDefaultChannel(string $channel)
    {
        $this->channel = $channel;
    }

    /**
     * Get the default username messages will be created for
     *
     * @return string
     */
    public function getDefaultUsername(): string
    {
        return $this->username;
    }

    /**
     * Set the default username messages will be created for
     *
     * @param string $username
     *
     * @return void
     */
    public function setDefaultUsername(string $username)
    {
        $this->username = $username;
    }

    /**
     * Get the default icon messages will be created with
     *
     * @return string
     */
    public function getDefaultIcon(): string
    {
        return $this->icon;
    }

    /**
     * Set the default icon messages will be created with
     *
     * @param string $icon
     *
     * @return void
     */
    public function setDefaultIcon(string $icon)
    {
        $this->icon = $icon;
    }

    /**
     * Get whether messages sent will have names (like @regan)
     * will be converted into links
     *
     * @return boolean
     */
    public function getLinkNames(): bool
    {
        return $this->link_names;
    }

    /**
     * Set whether messages sent will have names (like @regan)
     * will be converted into links
     *
     * @param boolean $value
     *
     * @return void
     */
    public function setLinkNames(bool $value)
    {
        $this->link_names = $value;
    }

    /**
     * Get whether text links should be unfurled
     *
     * @return boolean
     */
    public function getUnfurlLinks(): bool
    {
        return $this->unfurl_links;
    }

    /**
     * Set whether text links should be unfurled
     *
     * @param boolean $value
     *
     * @return void
     */
    public function setUnfurlLinks(bool $value)
    {
        $this->unfurl_links = $value;
    }

    /**
     * Get whether media links should be unfurled
     *
     * @return boolean
     */
    public function getUnfurlMedia(): bool
    {
        return $this->unfurl_media;
    }

    /**
     * Set whether media links should be unfurled
     *
     * @param boolean $value
     *
     * @return void
     */
    public function setUnfurlMedia(bool $value)
    {
        $this->unfurl_media = $value;
    }

    /**
     * Get whether message text should be formatted with
     * Slack's Markdown-like language
     *
     * @return boolean
     */
    public function getAllowMarkdown(): bool
    {
        return $this->allow_markdown;
    }

    /**
     * Set whether message text should be formatted with
     * Slack's Markdown-like language
     *
     * @param boolean $value
     *
     * @return void
     */
    public function setAllowMarkdown(bool $value)
    {
        $this->allow_markdown = $value;
    }

    /**
     * Get the attachment fields which should be formatted
     * in Slack's Markdown-like language
     *
     * @return array
     */
    public function getMarkdownInAttachments(): array
    {
        return $this->markdown_in_attachments;
    }

    /**
     * Set the attachment fields which should be formatted
     * in Slack's Markdown-like language
     *
     * @param array $fields
     *
     * @return void
     */
    public function setMarkdownInAttachments(array $fields)
    {
        $this->markdown_in_attachments = $fields;
    }

    /**
     * Create a new message with defaults
     *
     * @return \nguyenanhung\Slack\Message
     */
    public function createMessage(): Message
    {
        $message = new Message($this);

        $message->setChannel($this->getDefaultChannel());

        $message->setUsername($this->getDefaultUsername());

        $message->setIcon($this->getDefaultIcon());

        $message->setAllowMarkdown($this->getAllowMarkdown());

        $message->setMarkdownInAttachments($this->getMarkdownInAttachments());

        return $message;
    }

    /**
     * Function sendMessage - Send a message
     *
     * @param \nguyenanhung\Slack\Message $message
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/24/2021 59:22
     */
    public function sendMessage(Message $message)
    {
        $payload = $this->preparePayload($message);

        $encoded = json_encode($payload, JSON_UNESCAPED_UNICODE);

        $this->guzzle->post($this->endpoint, [
            'body' => $encoded,
            'curl' => array(
                CURLOPT_SSLVERSION => CURL_SSLVERSION_TLSv1_2
            )
        ]);
    }

    /**
     * Prepares the payload to be sent to the webhook
     *
     * @param \nguyenanhung\Slack\Message $message The message to send
     *
     * @return array
     */
    public function preparePayload(Message $message): array
    {
        $payload = [
            'text'         => $message->getText(),
            'channel'      => $message->getChannel(),
            'username'     => $message->getUsername(),
            'link_names'   => $this->getLinkNames() ? 1 : 0,
            'unfurl_links' => $this->getUnfurlLinks(),
            'unfurl_media' => $this->getUnfurlMedia(),
            'mrkdwn'       => $message->getAllowMarkdown()
        ];

        if ($icon = $message->getIcon()) {
            $payload[$message->getIconType()] = $icon;
        }

        $payload['attachments'] = $this->getAttachmentsAsArrays($message);

        return $payload;
    }

    /**
     * Get the attachments in array form
     *
     * @param \nguyenanhung\Slack\Message $message
     *
     * @return array
     */
    protected function getAttachmentsAsArrays(Message $message): array
    {
        $attachments = [];

        foreach ($message->getAttachments() as $attachment) {
            /** @var object $attachment */
            $attachments[] = $attachment->toArray();
        }

        return $attachments;
    }
}
