<?php

namespace kouosl\platformer\bundles;

use yii\web\AssetBundle;

class CustomAsset extends AssetBundle {

    /**
     * @var string source assets path
     */
    public $sourcePath = '@kouosl/platformer/assets/';

    /**
     * @var array depended bundles
     */
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

    /**
     * @var array css assets
     */
    public $css = [
    ];

    /**
     * @var array js assets
     */
    public $js = [
        'oyunlar/runner.js',
        'oyunlar/flappy.js'
    ];

    public function init()
    {
        //parent::init();
        // $this->js[] = 'i18n/' . Yii::$app->language . '.js'; // dynamic file added
    }
}