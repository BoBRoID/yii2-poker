<?php
/**
 * Created by PhpStorm.
 * User: gilko.nikolai
 * Date: 21.11.2016
 * Time: 11:54
 */

namespace common\models;


use yii\base\Model;

/**
 * @property int realValue
 * @property bool isBlack
 */
class Card extends Model
{

    const SUIT_DIAMONDS = 0;
    const SUIT_SPADES = 1;
    const SUIT_CLUBS = 2;
    const SUIT_HEARTS = 3;

    public $suit;

    public $value;

    public static function getPossibleSuits(){
        return [
            self::SUIT_DIAMONDS,
            self::SUIT_SPADES,
            self::SUIT_CLUBS,
            self::SUIT_HEARTS
        ];
    }

    public function getIsBlack(){
        return in_array($this->suit, [self::SUIT_CLUBS, self::SUIT_SPADES]);
    }

    public static function getSuitImages(){
        return [
            self::SUIT_DIAMONDS =>  '&#9830;',
            self::SUIT_SPADES   =>  '&#9824;',
            self::SUIT_CLUBS    =>  '&#9827;',
            self::SUIT_HEARTS   =>  '&#9829;'
        ];
    }

    public function getImage(){
        if(!in_array($this->suit, array_keys(self::getSuitImages()))){
            return null;
        }

        return self::getSuitImages()[$this->suit];
    }

    public function getRealValue(){
        foreach(self::getPossibleValues() as $key => $value){
            if($value == $this->value){
                return $key;
            }
        }

        return 0;
    }

    public static function getPossibleValues(){
        return [
            2, 3, 4, 5, 6, 7, 8, 9, 10, 'J', 'Q', 'K', 'A'
        ];
    }
}