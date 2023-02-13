<?php

declare(strict_types=1);

namespace Besir\MapboxPhpClient\Api\Response;

abstract class Response
{
	public function __construct(protected string $code)
	{}

	public function getCode(): string
	{
		return $this->code;
	}
}
