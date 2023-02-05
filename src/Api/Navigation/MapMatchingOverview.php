<?php

declare(strict_types=1);

namespace Besir\MapboxPhpClient\Api\Navigation;

enum MapMatchingOverview: string
{
	case full = 'full';
	case simplified = 'simplified';
	case false = 'false';
}
