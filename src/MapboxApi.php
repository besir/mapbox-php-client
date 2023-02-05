<?php

declare(strict_types=1);

namespace Besir\MapboxPhpClient;

use Besir\MapboxPhpClient\Api\Navigation\MapMatching;
use Besir\MapboxPhpClient\Api\Navigation\MapMatchingProfile;
use Psr\Http\Client\ClientInterface;

class MapboxApi
{

	public function __construct(
		private readonly string $accessToken,
		private readonly ClientInterface $httpClient,
	) {}

	public function getMapMatching(
		array $coordinates,
		MapMatchingProfile $matchingProfile,
		string $version = 'v5'
	): MapMatching
	{
		return new MapMatching(
			$this->accessToken,
			$this->httpClient,
			$matchingProfile,
			$coordinates,
			$version
		);
	}
}
