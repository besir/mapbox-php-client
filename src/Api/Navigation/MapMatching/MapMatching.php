<?php

declare(strict_types=1);

namespace Besir\MapboxPhpClient\Api\Navigation\MapMatching;

use GuzzleHttp\Psr7\Request;
use Psr\Http\Client\ClientInterface;
use Besir\MapboxPhpClient\Api\Navigation\MapMatching\Parameters\Geometries;
use Besir\MapboxPhpClient\Api\Navigation\MapMatching\Parameters\Overview;
use Besir\MapboxPhpClient\Api\Navigation\MapMatching\Parameters\Profile;
use Besir\MapboxPhpClient\Api\Navigation\MapMatching\Parameters\Annotation;
use Tracy\Debugger;

class MapMatching
{
	const API_ROUTE = 'matching';

	private array $annotations = [];
	private array $approaches;
	private Geometries $geometries = Geometries::polyline;
	private string $language;
	private Overview $overview = Overview::simplified;
	private bool $steps = false;

	public function __construct(
		private string $accessToken,
		private ClientInterface $httpClient,
		private Profile $profile,
		private array $coordinates,
		private string $version = 'v5',
	) {
		if (count($this->coordinates) < 2 || count($this->coordinates) > 100) {
			throw new \InvalidArgumentException('The coordinates must be between 2 and 100');
		}
	}

	// Function to send request to Mapbox API
	public function send(): Response
	{
		$requestString = sprintf('%s/%s/%s/%s?access_token=%s%s',
			self::API_ROUTE,
			$this->version,
			'mapbox' . '/' .$this->profile->value,
			$this->getCoordinates(),
			$this->accessToken,
			$this->computeRequestArgs(),
		);

		Debugger::log('https://api.mapbox.com/'.$requestString);

		// Create a new request
		$request = new Request(
			'GET',
			$requestString
		);

		// Send the request
		return Response::factory($this->httpClient->sendRequest($request));

		// Return the response
//		return json_decode((string) $response->getBody()->getContents(), true);
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

	public function addAnnotation(Annotation $annotation): self
	{
		if (!in_array($annotation->value, $this->annotations)) {
			$this->annotations[] = $annotation->value;
		}

		return $this;
	}

	public function setGeometries(Geometries $geometries): self
	{
		$this->geometries = $geometries;

		return $this;
	}

	public function setOverview(Overview $overview): self
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
