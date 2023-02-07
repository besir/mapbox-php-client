<?php

declare(strict_types=1);

namespace Besir\MapboxPhpClient\Api\Navigation\MapMatching\Parameters;

enum Overview: string
{
	case full = 'full';
	case simplified = 'simplified';
	case false = 'false';
}
