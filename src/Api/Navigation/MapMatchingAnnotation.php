<?php

declare(strict_types=1);

namespace Besir\MapboxPhpClient\Api\Navigation;

enum MapMatchingAnnotation: string
{
	case distance = 'distance';
	case duration = 'duration';
	case speed = 'speed';
	case congestion = 'congestion';
	case congestionNumeric = 'congestion_numeric';
	case maxspeed = 'maxspeed';
} {}
