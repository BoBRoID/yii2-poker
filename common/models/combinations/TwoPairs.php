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
        $cards = [];
        $pairsCount = 0;

        foreach($this->cards as $card){
            $cards[$card->realValue] += 1;
        }

        krsort($cards, SORT_NUMERIC);

        foreach($cards as $card => $count){
            if($count >= 2){
                $this->value += ($card * 2);

                $pairsCount++;
            }
        }

        return $pairsCount >= 2;
    }

}