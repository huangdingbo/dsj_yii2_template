<?php

namespace common\models\party;

use Yii;

/**
 * This is the model class for table "{{%t_activity_info}}".
 *
 * @property int $id
 * @property string $name 活动名称
 * @property string $content 党建活动详情
 */
class ActivityInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%t_activity_info}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 100],
            [['content'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '活动名称',
            'content' => '党建活动详情',
        ];
    }
}
