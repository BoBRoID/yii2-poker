<?php
/**
 * Created by PhpStorm.
 * User: gilko.nikolai
 * Date: 21.11.2016
 * Time: 16:38
 */

namespace common\models\combinations;


use common\models\Card;
use yii\base\Model;

abstract class BaseCombination extends Model
{

    public $player;

    public $value;

    /**
     * @var Card[]
     */
    public $cards = [];

    public abstract function check();


}