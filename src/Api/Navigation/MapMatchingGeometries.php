<?php

declare(strict_types=1);

namespace Besir\MapboxPhpClient\Api\Navigation;

enum MapMatchingGeometries: string
{
	case geojson = 'geojson';
	case polyline = 'polyline';
	case polyline6 = 'polyline6';
}
