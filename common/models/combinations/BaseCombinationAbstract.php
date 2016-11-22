<?php
/**
 * Created by PhpStorm.
 * User: gilko.nikolai
 * Date: 22.11.2016
 * Time: 11:39
 */

namespace common\models\combinations;


use common\models\Card;
use common\models\Player;
use yii\base\Model;

abstract class BaseCombinationAbstract extends Model
{

    /**
     * @var Player
     */
    public $player;

    public $value;

    /**
     * @var Card[]
     */
    public $winCards = [];

    /**
     * @var Card[]
     */
    public $cards = [];

    public abstract function check();


}