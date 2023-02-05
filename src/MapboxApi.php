<?php

declare(strict_types=1);

namespace Besir\MapboxPhpClient;

use Besir\MapboxPhpClient\Api\Navigation\MapMatching;
use Psr\Http\Client\ClientInterface;

class MapboxApi
{

	public function __construct(
		private readonly string $accessToken,
		private readonly ClientInterface $httpClient,
	) {}

	public function getMapMatching(string $version = 'v5'): MapMatching
	{
		return new MapMatching($this->accessToken, $this->httpClient, $version);
	}
}
