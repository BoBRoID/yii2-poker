<?php
/**
 * Created by PhpStorm.
 * User: gilko.nikolai
 * Date: 21.11.2016
 * Time: 18:08
 */

namespace common\models\combinations;


class Four extends BaseCombination
{
    public function check()
    {
        $cards = [];

        foreach($this->cards as $card){
            $cards[$card->realValue] += 1;
        }

        krsort($cards, SORT_NUMERIC);

        foreach($cards as $card => $count){
            if($count >= 4){
                $this->value = $card;

                return true;
            }
        }

        return false;
    }
}