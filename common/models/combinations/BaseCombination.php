<?php
/**
 * Created by PhpStorm.
 * User: gilko.nikolai
 * Date: 21.11.2016
 * Time: 16:38
 */

namespace common\models\combinations;

use common\models\Card;

/**
 * @property Card[] hand
 */
class BaseCombination extends BaseCombinationAbstract
{

    public function check()
    {
        return false;
    }

    public function getHand(){
        return array_merge($this->player->cards, $this->cards);
    }

    /**
     * @param $suit
     * @param $realValue
     * @return Card|bool
     */
    public function findCard($suit, $realValue){
        foreach($this->hand as $card){
            if($card->suit == $suit && $card->realValue == $realValue){
                return $card;
            }
        }

        return false;
    }

    /**
     * @param $card Card
     * @return bool
     */
    public function updateCard($card){
        foreach($this->player->cards as $key => $fCard){
            if($card->realValue == $fCard->realValue && $card->suit == $fCard->suit){
                $this->player->cards[$key] = $card;

                return true;
            }
        }

        foreach($this->cards as $key => $fCard){
            if($card->realValue == $fCard->realValue && $card->suit == $fCard->suit){
                $this->cards[$key] = $card;

                return true;
            }
        }

        return false;
    }

    public function setWinners($values, $suit = null){
        if(!is_array($values)){
            $values = [$values];
        }

        $this->winCards = [];

        foreach($this->hand as $card){
            if(in_array($card->realValue, $values)){
                if($suit && $card->suit != $suit){
                    continue;
                }

                $this->winCards[] = $card;
            }
        }
    }

}