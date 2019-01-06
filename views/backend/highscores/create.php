<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model vendor\kouosl\platformer\models\Highscores */

$this->title = 'Create Highscores';
$this->params['breadcrumbs'][] = ['label' => 'Highscores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="highscores-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
