<?php

declare(strict_types=1);

namespace Besir\MapboxPhpClient\Api\Navigation\Exceptions;

class ProfileNotFound extends \Exception
{
	protected $code = 404;
	protected $message = 'Needs to be a valid profile (mapbox/driving, mapbox/driving-traffic, mapbox/walking, or mapbox/cycling).';
}
