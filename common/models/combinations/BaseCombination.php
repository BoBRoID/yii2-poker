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

    protected $_hand = [];

    public function check()
    {
        return false;
    }

    /**
     * @return Card[]
     */
    public function getHand(){
        if(!$this->_hand){
            $this->_hand = array_merge($this->player->cards, $this->cards);
        }

        return $this->_hand;
    }

    /**
     * @param $cards Card[]
     */
    public function setHand($cards){
        if(!is_array($cards) && $cards instanceof Card){
            $cards = [$cards];
        }

        $this->_hand = $cards;
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

        $winCards = [];

        $this->winCards = [];

        foreach($this->hand as $card){
            if(in_array($card->realValue, $values)){
                if($suit && $card->suit != $suit){
                    continue;
                }

                $winCards[$card->realValue][] = $card;
            }
        }

        ksort($winCards);

        foreach($winCards as $cardsArray){
            foreach($cardsArray as $card){
                $this->winCards[] = $card;
            }
        }
    }

}