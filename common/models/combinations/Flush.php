<?php
/**
 * Created by PhpStorm.
 * User: gilko.nikolai
 * Date: 21.11.2016
 * Time: 18:09
 */

namespace common\models\combinations;


class Flush extends BaseCombination
{

    public function check()
    {
        return false;
    }

}