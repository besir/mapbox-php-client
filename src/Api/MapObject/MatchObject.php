<?php

declare(strict_types=1);

namespace Besir\MapboxPhpClient\Api\MapObject;

class MatchObject
{

	public function __construct(
		private integer $confidence,
		private integer $distance,
		private integer $duration,
		private integer $weight,
		private string $weightName,
		private string $geometry,
		private array $legs,
		private string $voiceLocale,
		private array $linearReferences,
	) {}

	public function getConfidence(): integer
	{
		return $this->confidence;
	}

	public function getDistance(): integer
	{
		return $this->distance;
	}

	public function getDuration(): integer
	{
		return $this->duration;
	}

	public function getWeight(): integer
	{
		return $this->weight;
	}

	public function getWeightName(): string
	{
		return $this->weightName;
	}

	public function getGeometry(): string
	{
		return $this->geometry;
	}

	public function getLegs(): array
	{
		return $this->legs;
	}

	public function getVoiceLocale(): string
	{
		return $this->voiceLocale;
	}

	public function getLinearReferences(): array
	{
		return $this->linearReferences;
	}

}
