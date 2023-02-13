<?php

declare(strict_types=1);

namespace Besir\MapboxPhpClient\Api\Navigation\MapMatching\Response;

use Besir\MapboxPhpClient\Api\Navigation\MapMatching\Enum\BindingPosition;

class TracepointObject
{
	public readonly BindingPosition $legBindingPosition;
	public readonly LegObject $leg;

	public function __construct(
		public readonly int $originalLocationIndex,
		public readonly int $matchingsIndex,
		public readonly int $waypointIndex,
		public readonly int $alternativesCount,
		public readonly float $distance,
		public readonly string $name,
		public readonly LngLatObject $location,
	) {}

	public function setLegBindingPosition(BindingPosition $bindingPosition): self
	{
		$this->legBindingPosition = $bindingPosition;

		return $this;
	}

	public function setLeg(LegObject $leg): self
	{
		$this->leg = $leg;

		return $this;
	}
}
