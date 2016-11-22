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

        foreach($this->hand as $card){
            $cards[$card->realValue] = 1;
        }

        $cards = array_keys($cards);

        rsort($cards);

        $lastCard = array_shift($cards);
        $cardsInRow = [$lastCard];

        foreach($cards as $card){
            if($card == ($lastCard - 1)){
                $cardsInRow[] = $card;
            }else{
                $cardsInRow = [];
            }

            if(sizeof($cardsInRow) == 5){
                break;
            }

            $lastCard = $card;
        }

        $hasWin = sizeof($cardsInRow) == 5;

        if($hasWin){
            $this->value = $cardsInRow[0];
            $this->setWinners($cardsInRow);
        }

        return $hasWin;
    }

}