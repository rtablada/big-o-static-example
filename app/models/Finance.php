<?php

class Finance extends Eloquent
{

	protected $appends = ['test'];

	protected static $indexValue = 24;

	public function getTestAttribute()
	{
		return 'test';
	}

	public function getComputedPropertyAttribute()
	{
		return $this->price * $this->ttl / static::$indexValue;
	}
}
