<?php

declare(strict_types=1);

namespace Besir\MapboxPhpClient\Api\Navigation\MapMatching\Collection;

use Besir\MapboxPhpClient\Api\Navigation\MapMatching\Enum\BindingPosition;
use Besir\MapboxPhpClient\Api\Navigation\MapMatching\Response\LngLatObject;
use Besir\MapboxPhpClient\Api\Navigation\MapMatching\Response\MatchObject;
use Besir\MapboxPhpClient\Api\Navigation\MapMatching\Response\TracepointObject;

class Tracepoints extends \ArrayIterator
{
	public function __construct(TracepointObject ...$tracepoints,
	) {
		parent::__construct($tracepoints);
	}

	public function append(mixed $tracepoint): void
	{
		if (!$tracepoint instanceof TracepointObject) {
			throw new \InvalidArgumentException('Tracepoints collection can only contain TracepointObject objects');
		}

		parent::append($tracepoint);
	}

	public static function factory(array $tracepoints, Matchings $matchings): self
	{
		$tracepointsCollection = new self();
		$originalLocationIndex = 0;
		foreach ($tracepoints as $tracepoint) {
			if ($tracepoint === null) {
				continue;
			}

			$tracepoint = new TracepointObject(
				$originalLocationIndex,
				$tracepoint['matchings_index'],
				$tracepoint['waypoint_index'],
				$tracepoint['alternatives_count'],
				$tracepoint['distance'],
				$tracepoint['name'],
				new LngLatObject(
					$tracepoint['location'][0],
					$tracepoint['location'][1],
				),
			);
			$tracepointsCollection->computeLegForTracepoint($tracepoint, $matchings);

			$tracepointsCollection->append($tracepoint);

			$originalLocationIndex++;
		}

		return $tracepointsCollection;
	}

	private function computeLegForTracepoint(TracepointObject $tracepoint, Matchings $matchings): TracepointObject
	{
		$matchingsByIndex = array_filter($matchings->getArrayCopy(), function (MatchObject $matching) use ($tracepoint) {
			echo $matching->matchingIndex . ' ?? ' . $tracepoint->matchingsIndex . PHP_EOL;
			return $matching->matchingIndex === $tracepoint->matchingsIndex;
		});


//		print_r($matchingsByIndex[0]->legs[0]); die();

		echo "matching: " . count($matchingsByIndex[$tracepoint->matchingsIndex]->legs) . ' - ' . $tracepoint->waypointIndex . PHP_EOL;
		if (count($matchingsByIndex[$tracepoint->matchingsIndex]->legs) === $tracepoint->waypointIndex) {
			$matching = $matchingsByIndex[$tracepoint->matchingsIndex]
				->legs->offsetGet($tracepoint->waypointIndex-1);
			$tracepoint->setLeg($matching);

			return $tracepoint->setLegBindingPosition(BindingPosition::start);
		} else {
//			print_r($matchingsByIndex[$tracepoint->matchingsIndex]->legs);
			$matching = $matchingsByIndex[$tracepoint->matchingsIndex]
				->legs->offsetGet($tracepoint->waypointIndex);
			$tracepoint->setLeg($matching);

			return $tracepoint->setLegBindingPosition(BindingPosition::end);
		}
	}
}
