<?php
/**
 * Created by PhpStorm.
 * User: gilko.nikolai
 * Date: 21.11.2016
 * Time: 18:09
 */

namespace common\models\combinations;


class Straight extends BaseCombination
{

    public function check()
    {
        $cards = [];

        foreach($this->cards as $card){
            $cards[$card->suit] += 1;
        }

        krsort($cards);

        \Yii::trace($cards);
    }

}