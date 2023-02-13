<?php

declare(strict_types=1);

namespace Besir\MapboxPhpClient\Api\Navigation\MapMatching\Collection;

use Besir\MapboxPhpClient\Api\Navigation\MapMatching\Response\LegObject;

class Legs extends \ArrayIterator
{
	public function __construct(LegObject ...$legs)
	{
		parent::__construct($legs);
	}

	public function append($leg): void
	{
		if (!$leg instanceof LegObject) {
			throw new \InvalidArgumentException('Legs collection can only contain LegObject objects');
		}

		parent::append($leg);
	}

	public function factory(array $legs): self
	{
		$legsCollection = new self();
//		$index = 0;
		foreach ($legs as $leg) {
			$legsCollection->append(new LegObject(
				$leg['via_waypoints'],
				$leg['annotation'],
				$leg['admins'],
				$leg['weight'],
				$leg['duration'],
				$leg['steps'],
				$leg['distance'],
				$leg['summary'],
//				$tracepoints->offsetGet($index),
//				$tracepoints->offsetGet($index + 1),
			));

//			$index++;
		}

		return $legsCollection;
	}
}
