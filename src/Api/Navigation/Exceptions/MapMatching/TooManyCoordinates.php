<?php

declare(strict_types=1);

namespace Besir\MapboxPhpClient\Api\Navigation\Exceptions;

class TooManyCoordinates extends \Exception
{
	protected $code = 422;
	protected $message = 'The number of coordinates provided exceeds the maximum allowed. The maximum number of coordinates is 100.';
}
