<?php

/**
 * Контролер для логування переходів по лінкам
 * Приймаємо permalink по адресі сайт/l/perma_link
 * шукаємо цей permalink по базі і якщо знайшли то логуємо
 * Class LogController
 */

class LogController extends Controller
{
	private function getRefferer(){
        return  isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;
    }

    function actionRegister($permalink){
        $link = Link::model()->findByAttributes(array('link' => $permalink));
        if(!$link){
            throw new CHttpException(404, Yii::t(
                'yii',
                'Unable to resolve the request "{route}".',
                array('{route}' => $this->_pathInfo)
            ));
        } else {
            $statLog = new Stat();
            $statLog->link_id = $link->id;
            $statLog->datetime = date("Y-m-d H:i:s");
            $statLog->referer = $this->getRefferer();
            $statLog->save();
            $this->redirect($this->createUrl('log/hack'));
        }
    }

    function actionHack(){
        $this->layout = false;
        $this->render('hack', array());
    }
}