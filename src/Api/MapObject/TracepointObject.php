<?php

declare(strict_types=1);

namespace Besir\MapboxPhpClient\Api\MapObject;

class TracepointObject
{

	public function __construct(
		private integer $matchingsIndex,
		private integer $waypointIndex,
		private integer $alternativesCount,
		private float $location,
		private float $name,
	) {}

	public function getMatchingsIndex(): integer
	{
		return $this->matchingsIndex;
	}

	public function getWaypointIndex(): integer
	{
		return $this->waypointIndex;
	}

	public function getAlternativesCount(): integer
	{
		return $this->alternativesCount;
	}

	public function getLocation(): float
	{
		return $this->location;
	}

	public function getName(): float
	{
		return $this->name;
	}

}
