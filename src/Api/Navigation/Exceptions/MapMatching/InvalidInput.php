<?php

declare(strict_types=1);

namespace Besir\MapboxPhpClient\Api\Navigation\Exceptions;

class InvalidInput extends \Exception {
	protected $code = 422;
}
