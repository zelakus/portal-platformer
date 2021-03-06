<?php
namespace kouosl\platformer;

use Yii;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\web\HttpException;


/**
 * platformer module definition class
 */
class Module extends \kouosl\base\Module
{
    public $controllerNamespace = '';

    public function init()
    {
        parent::init();
        $this->registerTranslations();
        // custom initialization code goes here
    }
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        switch ($this->namespace)
        {
            case 'backend':{

            };break;
            case 'frontend':{

            };break;
            case 'api':{

                $behaviors['authenticator'] = [
                    'class' => CompositeAuth::className(),
                    'authMethods' => [
                        HttpBasicAuth::className(),
                        HttpBearerAuth::className(),
                        QueryParamAuth::className(),
                    ],
                ];
            };break;
            case 'console':{

            };break;
            default:{
                throw new HttpException(500,'behaviors'.$this->namespace);
            };break;
        }

        return $behaviors;

    }

    public static $isInit = false;
    public function registerTranslations()
    {
        if (Module::$isInit)
            return;
        Yii::$app->i18n->translations['platformer/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' => '@kouosl/platformer/messages',
            'fileMap' => [
                'platformer/platformer' => 'platformer.php',
            ],
        ];
        Module::$isInit = true;
    }

    public function t($category, $message, $params = [], $language = null)
    {
        Module::registerTranslations();
        return Yii::t('platformer/'. $category, $message, $params, $language);
    }

    public static function initRules(){

        return $rules = [
            [
                'class' => 'yii\rest\UrlRule',
                'controller' => [
                   'platformer/platformers',
                ],
                'tokens' => [
                    '{id}' => '<id:\\w+>'
                ],
                /*'patterns' => [
                    'GET new-action' => 'new-action'
                ]*/
            ],

        ] ;

    }
}
