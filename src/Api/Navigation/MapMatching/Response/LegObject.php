<?php

declare(strict_types=1);

namespace Besir\MapboxPhpClient\Api\Navigation\MapMatching\Response;

use Besir\MapboxPhpClient\Api\Navigation\MapMatching\Collection\Legs;

class LegObject
{
	public function __construct(
		public readonly array $viaWaypoints,
		public readonly array $annotation,
		public readonly array $admins,
		public readonly float $weight,
		public readonly float $duration,
		public readonly array $steps,
		public readonly float $distance,
		public readonly string $summary,
//		public readonly TracepointObject $startLocation,
//		public readonly TracepointObject $endLocation,
	) {}
}
