<?php namespace Anomaly\VideoFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;
use Anomaly\Streams\Platform\Addon\Plugin\PluginCriteria;
use Anomaly\Streams\Platform\Support\Collection;
use Anomaly\VideoFieldType\Matcher\Command\GetMatcher;
use Anomaly\VideoFieldType\Matcher\Contract\MatcherInterface;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class VideoFieldTypePresenter
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\VideoFieldType
 */
class VideoFieldTypePresenter extends FieldTypePresenter
{

    use DispatchesJobs;

    /**
     * The decorated object.
     * This is for IDE hinting.
     *
     * @var VideoFieldType
     */
    protected $object;

    /**
     * Return the embed iframe.
     *
     * @param array $extra
     * @return PluginCriteria
     */
    public function iframe(array $extra = [])
    {
        /* @var MatcherInterface $matcher */
        $matcher = $this->dispatch(new GetMatcher($this->object->getValue()));

        return new PluginCriteria(
            'render',
            function (Collection $options) use ($matcher, $extra) {
                return $matcher->iframe($matcher->id($this->object->getValue()), $options->merge($extra)->all());
            }
        );
    }

    public function embed()
    {
        /* @var MatcherInterface $matcher */
        $matcher = $this->dispatch(new GetMatcher($this->object->getValue()));

        return $matcher->embed($this->object->getValue());
    }
}