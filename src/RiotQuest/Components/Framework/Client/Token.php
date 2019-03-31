<?php

namespace RiotQuest\Components\Framework\Client;

/**
 * Class Token
 *
 * Definition for an API key class
 *
 * @package RiotQuest\Components\Riot\Client
 */
class Token
{

    /**
     * The raw API key
     *
     * @var string
     */
    private $key;

    /**
     * The key type: STANDARD | TOURNAMENT
     *
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $limits;

    /**
     * Create a new API key
     *
     * @param $key
     * @param $type
     * @param $limits
     */
    public function __construct($key, $type, $limits)
    {
        $this->type = $type;
        $this->key = $key;
        $this->limits = $limits;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Get the given rate limit for this key
     *
     * @return array
     */
    public function getLimits()
    {
        return explode(':', $this->limits);
    }

}
