<?php
use kouosl\theme\helpers\Html;
use kouosl\theme\widgets\Portlet;
use yii\data\ActiveDataProvider;
use kouosl\platformer\models\Games;
use kouosl\platformer\models\Highscores;
use kouosl\platformer\models\HighscoresSearch;

$dataprovider = new ActiveDataProvider([
    'query' => Games::find()->where("id='" . $_GET['id']."'")
]);
$gamemodels = $dataprovider->GetModels();

if (count($gamemodels) != 1) {
    header("Location: http://portal.kouosl/platformer/");
    die();
}

$game = $gamemodels[0];


$dataprovider = new ActiveDataProvider([
    'query' => Highscores::find()->where("userid='" . Yii::$app->user->identity->id . "' " . " and gameid='" . $_GET['id'] . "'")
]);
$models = $dataprovider->GetModels();
$model;

if (count($models) == 0) {
    $model = new Highscores;

    $model->userid = Yii::$app->user->identity->id;
    $model->gameid = $_GET['id'];
} else {
    $model = $models[0];
}

$model->score = $_GET['setscore'];
$model->save();

header("Location: http://portal.kouosl/platformer/game?id=".$_GET['id']);
die();