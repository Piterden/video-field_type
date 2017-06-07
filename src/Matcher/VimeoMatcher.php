<?php namespace Anomaly\VideoFieldType\Matcher;

use Anomaly\Streams\Platform\Image\Image;
use GuzzleHttp\Client;

/**
 * Class VimeoMatcher
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class VimeoMatcher extends AbstractMatcher
{

    /**
     * The provider.
     *
     * @var string
     */
    protected $provider = 'Vimeo';

    /**
     * Return the video ID from the video URL.
     *
     * @param $url
     * @return int
     */
    public function id($url)
    {
        $segments = explode('/', substr(parse_url($url, PHP_URL_PATH), 1));

        return end($segments);
    }

    /**
     * Return if the provided URL matches the vendor.
     *
     * @param $url
     * @return bool
     */
    public function matches($url)
    {
        return str_contains($url, 'vimeo.com');
    }

    /**
     * Return the embed URL for a given video URl.
     *
     * @param $url
     * @return string
     */
    public function embed($url)
    {
        return 'https://player.vimeo.com/video/' . $this->id($url);
    }

    /**
     * Return the embeddable iframe code for a given video ID.
     *
     * @param       $id
     * @param array $attributes
     * @return string
     */
    public function iframe($id, array $attributes = [], array $parameters = [])
    {
        return '<iframe
            frameborder="0"
            src="https://player.vimeo.com/video/' . $id . '?' . http_build_query($parameters) . '"
            ' . $this->html->attributes($attributes) . '></iframe>';
    }

    /**
     * Return the video's cover image.
     *
     * @param $id
     * @return Image
     */
    public function cover($id)
    {
        $client = new Client();
        $res    = $client->request('GET', 'http://vimeo.com/api/v2/video/' . $id . '.json');

        dd($res->getBody());
    }

    /**
     * Return a video image.
     *
     * @param      $id
     * @param null $image
     * @return Image
     */
    public function image($id, $image = null)
    {
        $client = new Client();
        $res    = $client->request('GET', 'http://vimeo.com/api/v2/video/' . $id . '.json');

        dd($res->getBody());
    }

}
