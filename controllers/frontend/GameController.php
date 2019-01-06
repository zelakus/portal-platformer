<?php
namespace kouosl\platformer\controllers\frontend;


/**
 * Default controller for the `platformer` module
 */
class GameController extends \kouosl\base\controllers\frontend\BaseController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        if (isset($_GET['setscore']))
            return $this->render('_setscore');
        if (isset($_GET['play']))
            return $this->render('_game');
        return $this->render('_index');
    }
}
