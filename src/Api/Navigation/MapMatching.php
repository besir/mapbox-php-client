<?php

declare(strict_types=1);

namespace Besir\MapboxPhpClient\Api\Navigation;

use Psr\Http\Client\ClientInterface;

class MapMatching
{

	public function __construct(
		private readonly string $accessToken,
		private readonly ClientInterface $httpClient,
		private readonly string $version = 'v5',
		private readonly MapMatchingProfile $profile,
		private readonly array $coordinates,
	) {
		if (count($this->coordinates) < 2 && count($this->coordinates) > 100) {
			throw new \InvalidArgumentException('The coordinates must be between 2 and 100');
		}
	}



}
