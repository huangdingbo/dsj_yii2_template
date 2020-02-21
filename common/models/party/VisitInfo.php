<?php

namespace common\models\party;

use Yii;
use yii\helpers\Json;

/**
 * This is the model class for table "{{%t_visit_info}}".
 *
 * @property int $id
 * @property string $people 走访人
 * @property string $unit 走访单位
 * @property string $type 类别
 * @property string $problem 问题和意见
 * @property string $feedback 回访反馈信息
 * @property string $recording 回访录音文件
 * @property string $pics 现场图片
 * @property string $videos 现场视频
 */
class VisitInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%t_visit_info}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['people'], 'string', 'max' => 10],
            [['unit', 'type'], 'string', 'max' => 50],
            [['problem', 'recording'], 'string', 'max' => 200],
            [['feedback', 'pics', 'videos'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'people' => '走访人',
            'unit' => '走访单位',
            'type' => '类别',
            'problem' => '问题和意见',
            'feedback' => '回访反馈信息',
            'recording' => '回访录音文件',
            'pics' => '现场图片',
            'videos' => '现场视频',
        ];
    }

    public function dealData(){
        $this->pics = Json::encode($this->pics);
        $this->videos = Json::encode([$this->videos]);
        $this->recording = Json::encode([$this->recording]);
    }

}
