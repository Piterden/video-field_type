<?php namespace Anomaly\VideoFieldType\Matcher\Contract;

use Anomaly\Streams\Platform\Image\Image;

/**
 * Interface MatcherInterface
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\VideoFieldType\Matcher\Contract
 */
interface MatcherInterface
{

    /**
     * Return the video ID from the video URL.
     *
     * @param $url
     * @return int
     */
    public function id($url);

    /**
     * Return if the provided URL matches the vendor.
     *
     * @param $url
     * @return bool
     */
    public function matches($url);

    /**
     * Return the embed URL for a given video URl.
     *
     * @param $url
     * @return string
     */
    public function embed($url);

    /**
     * Return the embeddable iframe code for a given video ID.
     *
     * @param       $id
     * @param array $attributes
     * @param array $parameters
     * @return string
     */
    public function iframe($id, array $attributes = [], array $parameters = []);

    /**
     * Return the video's cover image.
     *
     * @param $id
     * @return Image
     */
    public function cover($id);

    /**
     * Return a video image.
     *
     * @param      $id
     * @param null $image
     * @return Image
     */
    public function image($id, $image = null);

    /**
     * Get the provider.
     *
     * @return string
     */
    public function getProvider();
}
