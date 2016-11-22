<?php
/**
 * Created by PhpStorm.
 * User: gilko.nikolai
 * Date: 21.11.2016
 * Time: 14:34
 */

namespace common\models;


use yii\base\Model;

class Player extends Model
{

    public $id;

    /**
     * @var Card[]
     */

    public $cards = [];

    public $name;

    private $cardsCount = 0;
    private $possibleCardsCount = 2;

    /**
     * @param $deck Deck
     */
    public function takeCard($deck){
        $this->cards[] = $deck->getCard();
    }

}