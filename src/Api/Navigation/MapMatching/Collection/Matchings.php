<?php

declare(strict_types=1);

namespace Besir\MapboxPhpClient\Api\Navigation\MapMatching\Collection;

use Besir\MapboxPhpClient\Api\Navigation\MapMatching\Enum\BindigPosition;
use Besir\MapboxPhpClient\Api\Navigation\MapMatching\Response\MatchObject;
use Besir\MapboxPhpClient\Api\Navigation\MapMatching\Response\TracepointObject;

class Matchings extends \ArrayIterator
{
	public function __construct(MatchObject ...$matchings)
	{
		parent::__construct($matchings);
	}

	public function append($matching): void
	{
		if (!$matching instanceof MatchObject) {
			throw new \InvalidArgumentException('Matchings collection can only contain MatchObject objects');
		}

		parent::append($matching);
	}

	public static function factory(
		array $matchings,
//		Tracepoints $tracepoints,
	): self
	{
		$matchingsCollection = new self();
		$matchingIndex = 0;
		foreach ($matchings as $matching) {
			$legs = new Legs();

			$matchingsCollection->append(new MatchObject(
				$matchingIndex,
				$matching['confidence'],
				$matching['country_crossed'],
				$matching['distance'],
				$matching['duration'],
				$matching['weight'],
				$matching['weight_name'],
				$matching['geometry'],
				$legs->factory(
					$matching['legs'],
//					$tracepoints,
//					$matchingIndex,
				),
			));

			$matchingIndex++;
		}

		return $matchingsCollection;
	}
}
