<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model vendor\kouosl\platformer\models\Highscores */

$this->title = 'Update Highscores: ' . $model->userid;
$this->params['breadcrumbs'][] = ['label' => 'Highscores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->userid, 'url' => ['view', 'userid' => $model->userid, 'gameid' => $model->gameid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="highscores-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
