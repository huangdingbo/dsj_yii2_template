<?php

namespace common\models\party;

use Yii;

/**
 * This is the model class for table "{{%t_party_activity}}".
 *
 * @property int $id
 * @property int $party_id 党组织id
 * @property string $name 活动名称
 * @property int $name_type 1不忘初心，2五个一，3三会一，4主题
 * @property string $detail 活动详情
 * @property int $time 时间
 * @property int $time_month 月份
 * @property int $time_year 年,(int)2019
 */
class PartyActivity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%t_party_activity}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['party_id'], 'required'],
            [['party_id', 'time', 'time_month', 'time_year'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['name_type'], 'string', 'max' => 1],
            [['detail'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'party_id' => '党组织id',
            'name' => '活动名称',
            'name_type' => '1不忘初心，2五个一，3三会一，4主题',
            'detail' => '活动详情',
            'time' => '时间',
            'time_month' => '月份',
            'time_year' => '年,(int)2019',
        ];
    }
}
