<?php
/** @var \common\models\Table $table */

$js = <<<'JS'
var highlightWinCards = function(){
    $.each(winCards, function(key, card){
        $('.game-table .card[data-suit="' + card.suit + '"].card[data-value="' + card.value + '"]').addClass('winner');
    });
    
    $.each($('.game-table .card'), function(key, card){
        if($(card).hasClass('winner') == false){
            $(card).addClass('muted');
        }
    });
};

$(document).on('mouseover mouseout', '.card.winner', function(e){
    console.log(e);
    
    var suit = $(this).attr('data-suit'),
        value = $(this).attr('data-value'),
        handCard = $('.card[data-suit="' + suit + '"].card[data-value="' + value + '"]');
    
    if(e.type == 'mouseover'){ 
        handCard.addClass('highlight');
        $(this).addClass('highlight');
    }else{
        handCard.removeClass('highlight');
        $(this).removeClass('highlight');
    }
    
});

highlightWinCards();
JS;

$this->registerJs($js);

$winCards = '[]';

if($table->getWinCards()){
    $winCards = json_encode($table->getWinCards());
}

$this->registerJs('var winCards = '.$winCards, $this::POS_BEGIN);
?>
<div class="game-table">
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
</div>
<hr>
<?php if($winCombos = $table->getWinCombinations()){
    foreach($winCombos as $combination){ ?>
        <div class="col-xs-4">
            Игрок <?=$combination->player->name?> выиграл с комбинацией <?=$combination->formName()?>
        </div>
        <div class="col-xs-8">
            <?php foreach($combination->winCards as $card){
                echo $this->render('card', [
                    'card'      =>  $card,
                    'addClass'  =>  'winner'
                ]);
            }
            ?>
        </div>
<?php
    }
}
?>