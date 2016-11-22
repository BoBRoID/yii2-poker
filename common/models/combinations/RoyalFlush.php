<?php
/**
 * Created by PhpStorm.
 * User: gilko.nikolai
 * Date: 21.11.2016
 * Time: 18:11
 */

namespace common\models\combinations;


use common\models\Card;

class RoyalFlush extends BaseCombination
{

    public function check()
    {
        $cards = [];

        foreach($this->hand as $card){
            $cards[$card->realValue] = 1;
        }

        $cards = array_keys($cards);
        $ace = Card::getAce();

        if(in_array($ace, $cards)){
            $straightFlush = new StraightFlush([
                'player'    =>  $this->player,
                'cards'     =>  $this->cards
            ]);

            if($straightFlush->check()){
                foreach($straightFlush->winCards as $card){
                    if($card->realValue == $ace){
                        $this->winCards = $straightFlush->winCards;

                        return true;
                    }
                }
            }
        }

        return false;
    }

}