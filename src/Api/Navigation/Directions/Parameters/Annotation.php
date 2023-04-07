<?php

declare(strict_types=1);

namespace Besir\MapboxPhpClient\Api\Navigation\Directions\Parameters;

enum Annotation: string
{
	case distance = 'distance';
	case duration = 'duration';
	case speed = 'speed';
	case congestion = 'congestion';
	case congestionNumeric = 'congestion_numeric';
	case maxspeed = 'maxspeed';
	case closure = 'closure';
	case stateOfCharge = 'state_of_charge';
} {}
