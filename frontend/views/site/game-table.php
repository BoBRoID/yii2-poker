<?php
/** @var \common\models\Table $table */
?>
<div class="row">
<?php
foreach($table->players as $player){
    echo $this->render('game-table-hand', [
        'player'    =>  $player
    ]);
}
?>
</div>
<hr>
<div class="row">
    <div class="col-xs-6 col-xs-offset-2 text-center">
        <b>Карты на столе:</b>
    </div>
    <div class="col-xs-6 col-xs-offset-3">
        <div class="row">
            <?php
            foreach($table->cards as $card){
                echo $this->render('card', [
                    'card'  =>  $card
                ]);
            }
            ?>
        </div>
    </div>
</div>
<?php if($winCombos = $table->getWinCombinations()){
    foreach($winCombos as $combination){ ?>
        <div class="col-xs-3">
            Игрок <?=$combination->player?> выиграл с комбинацией <?=$combination->formName()?> (weight <?=$combination->value?>)
        </div>
    <?php }
} ?>