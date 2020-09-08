<?php
namespace dpi\modules\member\controllers;

use yii\filters\AccessControl;
use dpi\controllers\BaseController;

/**
 * Class MController
 * @package dpi\modules\member\controllers
 * @author jianyan74 <751393839@qq.com>
 */
class MController extends BaseController
{
    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],// 登录
                    ],
                ],
            ],
        ];
    }
}
