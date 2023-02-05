<?php

declare(strict_types=1);

namespace Besir\MapboxPhpClient\Api\Navigation;

enum MapMatchingProfile: string
{
	case driving = 'driving';
	case drivingTraffic = 'driving-traffic';
	case walking = 'walking';
	case cycling = 'cycling';
}
