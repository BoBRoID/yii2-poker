<?php
/**
 * Created by PhpStorm.
 * User: gilko.nikolai
 * Date: 21.11.2016
 * Time: 18:11
 */

namespace common\models\combinations;


class StraightFlush extends BaseCombination
{

    public function check()
    {
        $flush = new Flush([
            'player'    =>  $this->player,
            'cards'     =>  $this->cards
        ]);

        if($flush->check()){
            $straight = new Straight();
            $straight->setHand($flush->winCards);

            if($straight->check()){
                $this->winCards = $straight->winCards;

                return true;
            }
        }

        return false;
    }

}