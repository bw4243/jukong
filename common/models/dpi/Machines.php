<?php

namespace common\models\dpi;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "rf_machines".
 *
 * @property int $id 主键
 * @property string $token 机床token
 * @property string $mac_address mac地址
 * @property string $box_token 采集盒token
 * @property array $data 基本资料
 * @property int $created_at 创建时间
 * @property int $updated_at 修改时间
 */
class Machines extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rf_machines';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['token', 'mac_address', 'box_token', 'data'], 'required'],
            [['data'], 'safe'],
            [['created_at', 'updated_at'], 'integer'],
            [['token', 'box_token'], 'string', 'max' => 40],
            [['mac_address'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'token' => 'Token',
            'mac_address' => 'Mac Address',
            'box_token' => 'Box Token',
            'data' => 'Data',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ]
        ];
    }
}
