<?php

namespace RiotQuest\Components\Framework\Collections;

use RiotQuest\Client;
use RiotQuest\Components\Framework\Utils\Versions;

/**
 * Class Summoner
 *
 * @see https://developer.riotgames.com/api-methods/#summoner-v4/GET_getBySummonerName
 *
 * @property string $id
 * @property string $accountId
 * @property string $puuid
 * @property string $name
 * @property int $profileIconId
 * @property double $revisionDate
 * @property int $summonerLevel
 *
 * @package RiotQuest\Components\Framework\Collections
 */
class Summoner extends Collection
{

    /**
     * Get the current summoner icon link
     *
     * @param string $provider
     * @return string
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function getIconLink($provider = 'ddragon'): string
    {
        switch ($provider) {
            case 'ddragon':
                return sprintf('https://ddragon.leagueoflegends.com/cdn/%s/img/profileicon/%d.png', Versions::current(), $this['profileIconId']);
            case 'sdragon':
                return sprintf('https://static.supergrecko.com/superdragon/icon/%d.png', $this['profileIconId']);
        }
        return null;
    }

    /**
     * Get the ranked positions for summoner
     *
     * @return LeaguePositionList
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * @throws \ReflectionException
     * @throws \RiotQuest\Contracts\RiotQuestException
     */
    public function getRanked()
    {
        return Client::league($this->region)->positions($this->id);
    }

    /**
     * Get the matchlist for summoner
     *
     * @return MatchHistory
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * @throws \ReflectionException
     * @throws \RiotQuest\Contracts\RiotQuestException
     */
    public function getMatchlist()
    {
        return Client::match($this->region)->list($this->accountId);
    }

    /**
     * Get the total mastery score for summoner
     *
     * @return int
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * @throws \ReflectionException
     * @throws \RiotQuest\Contracts\RiotQuestException
     */
    public function getMasteryScore()
    {
        return Client::mastery($this->region)->score($this->id);
    }

    /**
     * Get all masteries for summoner
     *
     * @return ChampionMasteryList
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * @throws \ReflectionException
     * @throws \RiotQuest\Contracts\RiotQuestException
     */
    public function getMasteryList()
    {
        return Client::mastery($this->region)->all($this->id);
    }

    /**
     * Get the live game for summoner
     *
     * @return CurrentGameInfo
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * @throws \ReflectionException
     * @throws \RiotQuest\Contracts\RiotQuestException
     */
    public function getCurrentGame()
    {
        return Client::spectator($this->region)->active($this->id);
    }

    /**
     * Get the set third-party-code for summoner
     *
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * @throws \ReflectionException
     * @throws \RiotQuest\Contracts\RiotQuestException
     */
    public function getExternalCode()
    {
        return Client::code($this->region)->id($this->id);
    }

}
