<?php

declare(strict_types=1);

namespace Besir\MapboxPhpClient\Api\Navigation\Directions;

use Besir\MapboxPhpClient\Api\Navigation\MapMatching\Collection\Matchings;
use Besir\MapboxPhpClient\Api\Navigation\MapMatching\Collection\Tracepoints;
use Besir\MapboxPhpClient\Api\Response\Response as MapboxResponse;
use Psr\Http\Message\ResponseInterface;

class Response extends MapboxResponse
{

	public function __construct(
		public readonly Matchings $matchings,
		public readonly Tracepoints $tracepoints,
	) {}

	public static function factory(ResponseInterface $response)
	{
		return json_decode((string) $response->getBody()->getContents(), true);

//		$matchings = Matchings::factory($responseBody['matchings']);
//
//		$self = new self(
//			$matchings,
//			Tracepoints::factory($responseBody['tracepoints'], $matchings),
//		);
//
//		return $self;
	}

	public function getTracepoints(): Tracepoints
	{
		return $this->tracepoints;
	}

	public function getMatchings(): Matchings
	{
		return $this->matchings;
	}

}
