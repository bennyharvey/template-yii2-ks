<?php


namespace backend\controllers;


use yii\base\Security;
use yii\web\Controller;
use Yii;

class AdController extends Controller
{
    public function actionIndex()
    {
        $userLogin = Yii::$app->request->get('userLogin');

        $adUser = \Yii::$app->ad->getDefaultProvider()
            ->search()
            ->select(['*'])
            ->where('samaccountname', '=', $userLogin)
            ->first();

        if (!$adUser) {
            $adUser = \Yii::$app->ad->getDefaultProvider()
                ->search()
                ->select(['*'])
                ->where('cn', 'contains', $userLogin)
                ->first();
        }

        return $this->render('index', [
            'adUser' => $adUser,
        ]);
    }
}
