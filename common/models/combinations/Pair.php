<?php
/**
 * Created by PhpStorm.
 * User: gilko.nikolai
 * Date: 21.11.2016
 * Time: 16:40
 */

namespace common\models\combinations;

class Pair extends BaseCombination
{

    public function check(){
        $cards = [];

        foreach($this->hand as $card){
            $cards[$card->realValue] += 1;
        }

        krsort($cards, SORT_NUMERIC);

        foreach($cards as $card => $count){
            if($count >= 2){
                $this->value = $card;

                $this->setWinners($card);
                return true;
            }
        }

        return false;
    }

}