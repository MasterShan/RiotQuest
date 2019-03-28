<?php

namespace RiotQuest\Components\Framework\Collections;

use RiotQuest\Components\Framework\Client\Client;

/**
 * Class Match
 *
 * @see https://developer.riotgames.com/api-methods/#match-v4/GET_getMatch
 *
 * @property int $seasonId
 * @property int $queueId
 * @property double $gameId
 * @property ParticipantIdentityList $participantIdentities
 * @property string $gameVersion
 * @property string $platformId
 * @property string $gameMode
 * @property int $mapId
 * @property string $gameType
 * @property TeamStatsList $teams
 * @property MatchParticipantList $participants
 * @property double $gameDuration
 * @property double $gameCreation
 *
 * @package RiotQuest\Components\Framework\Collections
 */
class Match extends Collection
{

    /**
     * Gets the timeline for this match
     *
     * @return MatchTimeline
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * @throws \ReflectionException
     * @throws \RiotQuest\Contracts\RiotQuestException
     */
    public function getTimeline()
    {
        return Client::match($this->region)->timeline($this->gameId);
    }

}
