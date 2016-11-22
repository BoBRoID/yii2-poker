<?php
/**
 * @var \common\models\Player $player
 */
?>
<div class="col-xs-6">
    <div class="row">
        <?php foreach($player->cards as $card){
            echo $this->render('card', [
                'card'  =>  $card
            ]);
        } ?>
        <div class="col-xs-8">
            <h3><?=$player->name?></h3>
        </div>
    </div>
</div>
