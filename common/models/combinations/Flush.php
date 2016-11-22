<?php
/**
 * Created by PhpStorm.
 * User: gilko.nikolai
 * Date: 21.11.2016
 * Time: 18:09
 */

namespace common\models\combinations;


class Flush extends BaseCombination
{

    public function check()
    {
        $cards = [];

        foreach($this->hand as $card){
            $cards[$card->suit] += 1;
        }

        arsort($cards);

        $winSuit = null;
        $winners = [];

        foreach($cards as $suit => $count){
            if($count >= 5){
                $winSuit = $suit;
            }
        }

        foreach($this->hand as $card){
            if($card->suit == $winSuit){
                $winners[] = $card->realValue;
            }
        }

        if($winSuit){
            $value = $winners;
            arsort($value);

            $this->value = array_shift($value);

            $this->setWinners($winners, $winSuit);

            return true;
        }

        return false;
    }

}