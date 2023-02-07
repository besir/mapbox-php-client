<?php

declare(strict_types=1);

namespace Besir\MapboxPhpClient\Api\Navigation\MapMatching;

use Besir\MapboxPhpClient\Api\Response\Response as MapboxResponse;

class Response extends MapboxResponse
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
