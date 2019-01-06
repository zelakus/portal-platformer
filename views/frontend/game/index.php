<?php
use yii\data\ActiveDataProvider;
use kouosl\platformer\models\Games;
use kouosl\platformer\models\Highscores;
use kouosl\platformer\models\HighscoresSearch;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use kouosl\theme\widgets\GridView;
use kouosl\platformer\Module;
?>

<style>
.game_container {
    width: 90%;
    margin: auto;
    padding: 10px;
    height: 600px;
}
.one {
    width: 50%;
    float: left;
}
.two {
    
    margin-left:auto;
    margin-right:10%;

    width:30%;
}
</style>

<div class="site-index">
    <section class="game_container">
        <div class="one">
            <?php
            //Game info
            $dataprovider = new ActiveDataProvider([
                'query' => Games::find()->where("id='" . $_GET['id'] . "'")
            ]);
            $gamemodels = $dataprovider->GetModels();
            $game = $gamemodels[0];
        
            echo '<h1>'.$game['title'].'</h1>';
            echo '<p><a href="'. $_SERVER['REQUEST_URI'].'&play"><img width="400" height="400" src="'.$game['icon'].'"/></a></p>';
            echo '<p>'.$game['description'].'</p>';
            echo '<button class="btn btn-lg btn-success" onclick="location.href=\''. $_SERVER['REQUEST_URI']. '&play\'" type="button">' . Module::t('platformer','Start') . '</button>';
            ?>
        </div>
        <div class="two"><center>
            <h1><?php echo Module::t('platformer','Highscores');?></h1>
            <?php
            //Highscores
            $hdata =new ActiveDataProvider([
                'query' => Highscores::find()->where("gameid='". $_GET['id']."'")->orderBy([
                    'score' => SORT_DESC
                ]),
                'pagination' => [
                    'pageSize' => 10, 
                ],
            ]);

            $hmodel = $hdata->GetModels();
            
            echo GridView::widget([
                'dataProvider' => $hdata,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'userid',
                    'score',
                ],

            ]);
            ?>
        </center></div>
    </section>
</div>
