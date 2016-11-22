<?php
/**
 * Created by PhpStorm.
 * User: gilko.nikolai
 * Date: 21.11.2016
 * Time: 18:09
 */

namespace common\models\combinations;


class FullHouse extends BaseCombination
{

    public function check()
    {
        $cards = [];

        foreach($this->cards as $card){
            $cards[$card->realValue] += 1;
        }

        arsort($cards, SORT_NUMERIC);

        foreach($cards as $card => $count){
            if(!$this->value && $count >= 3){
                $this->value = ($card * 3);

                continue;
            }

            if($this->value && $count >= 2){
                $this->value += ($card * 2);
                return true;
            }
        }

        return false;
    }

}