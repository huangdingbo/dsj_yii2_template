<?php

namespace common\models\party;

use Yii;

/**
 * This is the model class for table "{{%t_party_member}}".
 *
 * @property int $id
 * @property int $party_id 党组织id
 * @property int $dr_num 博士学历人数
 * @property int $degree_num 硕士学历人数
 * @property int $undegree_num 本科学历人数
 * @property int $subject_num 专科学人数
 * @property int $formal_num 正式党员人数
 * @property int $prepare_num 预备党员人数
 * @property int $lost_num 失联党员人数
 * @property int $new_num 本月新增党员人数
 * @property int $develop_num 本月发展党员人数
 * @property int $time_month 月份，用int存，代码里用unix_timestamp('2019-11')函数转
 */
class PartyMember extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%t_party_member}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['party_id', 'dr_num'], 'required'],
            [['party_id', 'dr_num', 'degree_num', 'undegree_num', 'subject_num', 'formal_num', 'prepare_num', 'lost_num', 'new_num', 'develop_num', 'time_month'], 'integer'],
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
            'dr_num' => '博士学历人数',
            'degree_num' => '硕士学历人数',
            'undegree_num' => '本科学历人数',
            'subject_num' => '专科学人数',
            'formal_num' => '正式党员人数',
            'prepare_num' => '预备党员人数',
            'lost_num' => '失联党员人数',
            'new_num' => '本月新增党员人数',
            'develop_num' => '本月发展党员人数',
            'time_month' => '月份，用int存，代码里用unix_timestamp(\'2019-11\')函数转',
        ];
    }
}
