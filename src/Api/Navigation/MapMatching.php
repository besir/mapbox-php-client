<?php

declare(strict_types=1);

namespace Besir\MapboxPhpClient\Api\Navigation;

use GuzzleHttp\Psr7\Request;
use Psr\Http\Client\ClientInterface;

class MapMatching
{
	const API_ROUTE = 'matching';

	private array $annotations = [];
	private array $approaches;
	private MapMatchingGeometries $geometries = MapMatchingGeometries::polyline;
	private string $language;
	private MapMatchingOverview $overview = MapMatchingOverview::simplified;
	private bool $steps = false;

	public function __construct(
		private string $accessToken,
		private ClientInterface $httpClient,
		private MapMatchingProfile $profile,
		private array $coordinates,
		private string $version = 'v5',
	) {
		if (count($this->coordinates) < 2 || count($this->coordinates) > 100) {
			throw new \InvalidArgumentException('The coordinates must be between 2 and 100');
		}
	}

	// Function to send request to Mapbox API
	public function send()
	{
		$requestString = sprintf('%s/%s/%s/%s?access_token=%s%s',
			self::API_ROUTE,
			$this->version,
			'mapbox' . '/' .$this->profile->value,
			$this->getCoordinates(),
			$this->accessToken,
			$this->computeRequestArgs(),
		);

		// Create a new request
		$request = new Request(
			'GET',
			$requestString
		);

		// Send the request
		$response = $this->httpClient->sendRequest($request);

		// Return the response
		return json_decode((string) $response->getBody()->getContents(), true);
	}

	// Function to get the coordinates
	private function getCoordinates(): string
	{
		$coordinatesArray = $this->coordinates;

		// Loop through the coordinates
		foreach ($coordinatesArray as &$coordinate) {
			// Add the coordinate to the string
			$coordinate = implode(',', $coordinate);
		}

		return implode(';', $coordinatesArray);
	}

	private function computeRequestArgs(): string
	{
		$queryString = '';
		$queryString .= count($this->annotations) > 0 ? '&annotations=' . implode(',', $this->annotations) : '';
		$queryString .= '&geometries=' . $this->geometries->value;
		$queryString .= $this->steps ? '&steps=' . $this->steps : '';
		$queryString .= '&overview=' . $this->overview->value;

		return $queryString;
	}


	/* ********************************** Optional parameter setters ********************************** */

	public function addAnnotation(MapMatchingAnnotation $annotation): self
	{
		if (!in_array($annotation->value, $this->annotations)) {
			$this->annotations[] = $annotation->value;
		}

		return $this;
	}

	public function setGeometries(MapMatchingGeometries $geometries): self
	{
		$this->geometries = $geometries;

		return $this;
	}

	public function setOverview(MapMatchingOverview $overview): self
	{
		$this->overview = $overview;

		return $this;
	}

	public function setSteps(bool $steps): self
	{
		$this->steps = $steps;

		return $this;
	}

}
