<?php

declare(strict_types=1);

namespace Besir\MapboxPhpClient\Api\Navigation\MapMatching\Collection;

class Steps extends \ArrayIterator
{

	public function __construct(StepObject ...$steps)
	{
		parent::__construct($steps);
	}

	public function append($step): void
	{
		if (!$step instanceof StepObject) {
			throw new \InvalidArgumentException('Steps collection can only contain StepObject objects');
		}

		parent::append($step);
	}

	public function factory(array $steps, Tracepoints $tracepoints): self
	{
		$stepsCollection = new self();
		foreach ($steps as $step) {
			$stepsCollection->append(new StepObject(
				$step['intersections'],
				$step['bannerInstructions'],
				$step['speedLimitUnit'],
				$step['maneuver'],
				$step['speedLimitSign'],
				$step['name'],
				$step['duration'],
				$step['distance'],
				$step['driving_side'],
				$step['weight'],
				$step['mode'],
				$step['geometry'],
			));
		}


	}
}
