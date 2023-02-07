<?php

declare(strict_types=1);

namespace Besir\MapboxPhpClient\Api\Navigation\MapMatching\Exceptions;

class NoSegment extends \Exception
{
	protected $code = 200;
	protected $message = 'No road segment could be matched for one or more coordinates within the supplied radiuses. Check for coordinates that are too far away from a road.';
}
