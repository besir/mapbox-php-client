<?php

declare(strict_types=1);

namespace Besir\MapboxPhpClient\Api\Response;

abstract class Response
{
	protected srtring $code;

	public function getCode(): string
	{
		return $this->code;
	}
}
