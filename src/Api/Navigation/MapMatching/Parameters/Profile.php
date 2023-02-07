<?php

declare(strict_types=1);

namespace Besir\MapboxPhpClient\Api\Navigation\MapMatching\Parameters;

enum Profile: string
{
	case driving = 'driving';
	case drivingTraffic = 'driving-traffic';
	case walking = 'walking';
	case cycling = 'cycling';
}
