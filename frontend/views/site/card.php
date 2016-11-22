<?php
/** @var \common\models\Card $card */

$isRed = false;

if(in_array($card->suit, [$card::SUIT_HEARTS, $card::SUIT_DIAMONDS])){
    $isRed = true;
}
?>
<div class="col-xs-2 card">
    <div class="panel panel-default">
        <div class="panel-body" style="padding: 0 5px;">
            <div class="text-left<?=$isRed ? ' red' : ''?>">
                <?=$card->getImage()?>
            </div>
            <div class="text-center card-body"><b><?=$card->value?></b></div>
            <div class="text-left rotated<?=$isRed ? ' red' : ''?>">
                <?=$card->getImage()?>
            </div>
        </div>
    </div>
</div>
