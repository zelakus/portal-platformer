<?php
use kouosl\theme\helpers\Html;
use kouosl\theme\widgets\Portlet;
use yii\data\ActiveDataProvider;
use kouosl\platformer\models\Games;

$dataprovider = new ActiveDataProvider([
    'query' => Games::find()->where("id='" . $_GET['id']."'")
]);
$gamemodels = $dataprovider->GetModels();

if (count($gamemodels) != 1) {
    header("Location: http://portal.kouosl/platformer/");
    die();
}

$game = $gamemodels[0];


$this->title = $game['title'];
$data['title'] = Html::encode($this->title);
$this->params['breadcrumbs'][] = $this->title;



Portlet::begin();//['title' => $this->title]

echo $this->render('index');

Portlet::end();



