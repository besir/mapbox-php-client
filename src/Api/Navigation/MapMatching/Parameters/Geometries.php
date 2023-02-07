<?php

declare(strict_types=1);

namespace Besir\MapboxPhpClient\Api\Navigation\MapMatching\Parameters;

enum Geometries: string
{
	case geojson = 'geojson';
	case polyline = 'polyline';
	case polyline6 = 'polyline6';
}
