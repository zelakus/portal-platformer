<?php
use yii\data\ActiveDataProvider;
use kouosl\platformer\models\Games;

//Game info
$dataprovider = new ActiveDataProvider([
    'query' => Games::find()
]);
$gamemodels = $dataprovider->GetModels();
?>

<div class="site-index">

        <!--h1>Oyunlar</h1-->

        <div class="grid-container">
        

        <?php

        //echo yii::$app->session->get('lang');
        
        for ($i = 0; $i<count($gamemodels);$i++)
                echo '<div class="grid-item"><a href="/platformer/game?id='.($i+1).'"><p><img width="200" height="200" src="'.$gamemodels[$i]['icon'].'"/></p><p>'.$gamemodels[$i]['title'].'</p></a></div>';
        ?>
        
        </div>

</div>