<?php
/** @var \common\models\Card $card */

$addClass = $addClass ? : null;

?>
<div class="panel panel-default card <?=$addClass?>" data-suit="<?=$card->suit?>" data-value="<?=$card->realValue?>">
    <div class="panel-body" style="padding: 0 5px;">
        <div class="text-left<?=!$card->isBlack ? ' red' : ''?>">
            <?=$card->getImage()?>
        </div>
        <div class="text-center card-body"><b><?=$card->value?></b></div>
        <div class="text-left rotated<?=!$card->isBlack ? ' red' : ''?>">
            <?=$card->getImage()?>
        </div>
    </div>
</div>
