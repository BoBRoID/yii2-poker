<?php
/** @var \common\models\Deck $deck */
?>
<div class="row">
    <?php
    foreach($deck->cards as $card){
        echo $this->render('card', ['card' => $card]);
    }
    ?>
</div>