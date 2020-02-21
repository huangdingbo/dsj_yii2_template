<?php

namespace common\models\party;

use Yii;

/**
 * This is the model class for table "{{%t_party_visit}}".
 *
 * @property int $id
 * @property int $party_id 党组织id
 * @property string $problem 走访问题
 * @property string $visit_people 走访人
 * @property string $visit_organiz 走访单位
 * @property string $type 类别
 * @property int $time 走访时间
 * @property int $time_month 走访月份
 * @property int $time_year 走访年,(int)2019
 * @property int $participate_num 参与党员数量
 * @property string $uuid 工单id
 * @property string $feedback 反馈信息
 * @property string $feedback_recording 回访录音文件
 * @property string $feedback_pic 回访照片
 * @property string $feedback_video 回访视频
 * @property int $reg_time 登记时间
 * @property int $reg_time_month 登记月份
 * @property int $reg_time_year 登记年,(int)2019
 */
class PartyVisit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%t_party_visit}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['party_id'], 'required'],
            [['party_id', 'time', 'time_month', 'time_year', 'participate_num', 'reg_time', 'reg_time_month', 'reg_time_year'], 'integer'],
            [['problem', 'feedback', 'feedback_recording'], 'string', 'max' => 200],
            [['visit_people'], 'string', 'max' => 10],
            [['visit_organiz'], 'string', 'max' => 50],
            [['type'], 'string', 'max' => 30],
            [['uuid'], 'string', 'max' => 64],
            [['feedback_pic', 'feedback_video'], 'string', 'max' => 500],
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
            'problem' => '走访问题',
            'visit_people' => '走访人',
            'visit_organiz' => '走访单位',
            'type' => '类别',
            'time' => '走访时间',
            'time_month' => '走访月份',
            'time_year' => '走访年,(int)2019',
            'participate_num' => '参与党员数量',
            'uuid' => '工单id',
            'feedback' => '反馈信息',
            'feedback_recording' => '回访录音文件',
            'feedback_pic' => '回访照片',
            'feedback_video' => '回访视频',
            'reg_time' => '登记时间',
            'reg_time_month' => '登记月份',
            'reg_time_year' => '登记年,(int)2019',
        ];
    }
}
