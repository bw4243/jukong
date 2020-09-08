<?php


namespace dpi\controllers;


use common\models\dpi\ScadaBox;
use yii\web\Controller;

class MachineController extends Controller
{
    public $enableCsrfValidation = false;

    public function actionIndex() {
        $json = file_get_contents('php://input');
        file_put_contents(\Yii::getAlias('@dpi').DIRECTORY_SEPARATOR.'info'.DIRECTORY_SEPARATOR.'machine.log',
            $json.PHP_EOL,FILE_APPEND);
        echo (new \yii\helpers\BaseJson)->encode([
            "code" => -1,
            "msg" => "deviceToken 无效"
        ]);
        return;
    }

    public function actionArgs() {
        $json = file_get_contents('php://input');
        file_put_contents(\Yii::getAlias('@dpi').DIRECTORY_SEPARATOR.'info'.DIRECTORY_SEPARATOR.'args.log',
            $json.PHP_EOL,FILE_APPEND);
        echo (new \yii\helpers\BaseJson)->encode([
            "code" => -1,
            "msg" => "deviceToken 无效"
        ]);
        return;
    }

    public function actionState() {
        $json = file_get_contents('php://input');
        file_put_contents(\Yii::getAlias('@dpi').DIRECTORY_SEPARATOR.'info'.DIRECTORY_SEPARATOR.'state.log',
            $json.PHP_EOL,FILE_APPEND);
        echo (new \yii\helpers\BaseJson)->encode([
            "code" => -1,
            "msg" => "deviceToken 无效"
        ]);
        return;
    }
}
