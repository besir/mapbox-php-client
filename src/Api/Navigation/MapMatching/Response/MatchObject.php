<?php

declare(strict_types=1);

namespace Besir\MapboxPhpClient\Api\Navigation\MapMatching\Response;

use Besir\MapboxPhpClient\Api\Navigation\MapMatching\Collection\Legs;

class MatchObject
{
	public function __construct(
		public readonly int $matchingIndex,
		public readonly float $confidence,
		public readonly bool $countryCrossed,
		public readonly float $distance,
		public readonly float $duration,
		public readonly float $weight,
		public readonly string $weightName,
		public readonly array $geometry,
		public readonly Legs $legs,
	) {}
}
