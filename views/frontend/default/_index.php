<?php
use kouosl\theme\helpers\Html;
use kouosl\theme\widgets\Portlet;
use kouosl\platformer\Module; 

$this->title = Module::t('platformer','Games');
$data['title'] = Html::encode($this->title);
//$this->params['breadcrumbs'][] = $this->title;


Portlet::begin(['title' => $this->title]); //, 'href'=>'platformer'

echo $this->render('index');

Portlet::end();
