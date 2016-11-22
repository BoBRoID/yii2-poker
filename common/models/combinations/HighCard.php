<?php
/**
 * Created by PhpStorm.
 * User: gilko.nikolai
 * Date: 21.11.2016
 * Time: 18:12
 */

namespace common\models\combinations;


class HighCard extends BaseCombination
{

    public function check()
    {
        $cards = [];

        foreach($this->player->cards as $card){
            $cards[] = $card->realValue;
        }

        rsort($cards);

        $this->value = array_shift($cards);

        return true;
    }

}