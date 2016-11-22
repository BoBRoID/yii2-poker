<?php
/**
 * Created by PhpStorm.
 * User: gilko.nikolai
 * Date: 21.11.2016
 * Time: 16:46
 */

namespace common\models\combinations;


class TwoPairs extends BaseCombination
{

    public function check(){
        $cards = $pairCards = [];
        $pairsCount = 0;

        foreach($this->hand as $card){
            $cards[$card->realValue] += 1;
        }

        krsort($cards, SORT_NUMERIC);

        foreach($cards as $card => $count){
            if($pairsCount >= 2){
                continue;
            }

            if($count >= 2){
                $this->value += ($card * 2);

                $pairsCount++;
                $pairCards[] = $card;
            }
        }

        $isWin = $pairsCount >= 2;

        if($isWin){
            $this->setWinners($pairCards);
        }

        return $isWin;
    }

}