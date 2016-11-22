<?php
/**
 * Created by PhpStorm.
 * User: gilko.nikolai
 * Date: 21.11.2016
 * Time: 17:52
 */

namespace common\models\combinations;


class Three extends BaseCombination
{

    public function check()
    {
        $cards = [];

        foreach($this->hand as $card){
            $cards[$card->realValue] += 1;
        }

        krsort($cards, SORT_NUMERIC);

        foreach($cards as $card => $count){
            if($count >= 3){
                $this->value = ($card * 3);

                $this->setWinners($card);

                return true;
            }
        }

        return false;
    }

}