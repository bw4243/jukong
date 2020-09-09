<?php


namespace dpi\controllers;


use common\models\dpi\ScadaBox;
use yii\web\Controller;

class MonitorController extends Controller
{
    public $enableCsrfValidation = false;

    public function actionIndex() {
        $json = file_get_contents('php://input');
        $json= str_replace("id", '"id"', $json);
        $json= str_replace("=", ":", $json);
        $json="{".$json."}";
        $post= (new \yii\helpers\BaseJson)->decode($json);
        //var_dump($post);die;
        //echo \Yii::getAlias('@dpi').DIRECTORY_SEPARATOR.'info'.DIRECTORY_SEPARATOR;die;
        file_put_contents(\Yii::getAlias('@dpi').DIRECTORY_SEPARATOR.'info'.DIRECTORY_SEPARATOR.'monitor.log',
            $json.PHP_EOL,FILE_APPEND);
        if(!isset($post['id'])){
            echo(json_encode([
                'code' => 1,
                'msg' => 'id错误'
            ]));
            return;
        }

        ini_set("date.timezone", "Etc/GMT");
        $date = gmdate('Y-m-d\TH:i:s.000\Z') ;
        $token=  md5($post['id']);

        $boxIns= new ScadaBox();
        $boxIns->no= (String) $post['id'];
        $boxIns->token= $token;
        try {
            if (!$boxIns->save()) {
                echo(json_encode([
                    'code' => 1,
                    'msg' => 'id格式不正确'
                ]));
                return;
            }
        }catch(\Exception $e) {

        }

        echo json_encode([
            'code' => 0,
            'data' => [
                'deviceToken' => $token,
                'time' => $date
            ]
        ]);
    }
}
