<?php

declare(strict_types=1);

namespace Besir\MapboxPhpClient\Api\Navigation;

use Besir\MapboxPhpClient\Api\Response\Response;

class MapMatchingResponse extends Response
{
	private array $tracepoints;
	private array $matchings;
	private array $waypoints;

	public function getTracepoints(): array
	{
		return $this->tracepoints;
	}

	public function getMatchings(): array
	{
		return $this->matchings;
	}

	public function getWaypoints(): array
	{
		return $this->waypoints;
	}
}
