<?php

namespace backend\modules\demo\models;

/**
 * This is the model class for table "{{%t_demo}}".
 *
 * @property int $id
 * @property string $text
 * @property int $type
 * @property string $time
 * @property int $radio
 * @property string $area
 * @property string $pic
 * @property string $video
 */
class Demo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%t_demo}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['radio'], 'integer'],
            [['text', 'time'], 'string', 'max' => 50],
            [['type'], 'string', 'max' => 2],
            [['area','pic','video'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Text',
            'type' => 'Type',
            'time' => 'Time',
            'radio' => 'Radio',
            'area' => 'Area',
        ];
    }
}
