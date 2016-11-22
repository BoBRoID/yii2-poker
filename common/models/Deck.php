<?php
/**
 * Created by PhpStorm.
 * User: gilko.nikolai
 * Date: 21.11.2016
 * Time: 11:59
 */

namespace common\models;


use yii\base\Model;
use yii\helpers\ArrayHelper;

class Deck extends Model
{

    /**
     * @var Card[]
     */
    public $cards = [];

    public function init(){
        $cards = [];

        foreach(Card::getPossibleSuits() as $suit){
            foreach(Card::getPossibleValues() as $value){
                $cards[] = new Card(['suit' => $suit, 'value' => $value]);
            }
        }

        $this->cards = $cards;
        $this->shuffle();
    }

    public function getCard(){
        return array_shift($this->cards);
    }

    public function shuffle($count = 1){
        while($count){
            shuffle($this->cards);
            $count--;
        }
    }

}