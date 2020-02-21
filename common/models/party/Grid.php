<?php

namespace common\models\party;

use Yii;

/**
 * This is the model class for table "{{%t_grid}}".
 *
 * @property int $id
 * @property int $pid
 * @property int $type
 * @property string $code
 * @property string $name
 * @property string $points
 */
class Grid extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%t_grid}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid'], 'integer'],
            [['points'], 'string'],
            [['type'], 'string', 'max' => 1],
            [['code'], 'string', 'max' => 64],
            [['name'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pid' => 'Pid',
            'type' => 'Type',
            'code' => 'Code',
            'name' => 'Name',
            'points' => 'Points',
        ];
    }
}
