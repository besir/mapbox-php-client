<?php

declare(strict_types=1);

namespace Besir\MapboxPhpClient\Api\Navigation\MapMatching\Exceptions;

class Forbidden extends \Exception
{
	protected $code = 403;
	protected $message = 'The request was denied. This may be due to a missing access token, check your account.';
}
