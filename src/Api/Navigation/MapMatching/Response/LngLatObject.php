<?php

declare(strict_types=1);

namespace Besir\MapboxPhpClient\Api\Navigation\MapMatching\Response;

class LngLatObject
{
	public function __construct(
		public readonly float $lng,
		public readonly float $lat,
	) {}
}
