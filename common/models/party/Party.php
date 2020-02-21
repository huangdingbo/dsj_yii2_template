<?php

namespace common\models\party;

use Yii;

/**
 * This is the model class for table "{{%t_party}}".
 *
 * @property int $id
 * @property string $party_code 党组织代码
 * @property string $party_name 党组织名称
 * @property string $party_type 组织类别
 * @property string $dep_relationship 属地关系
 * @property string $secretary 党组织书记
 * @property string $linkman 党组织联系人
 * @property string $phone 联系电话
 * @property int $set_time 建立党组织日期
 * @property string $location 通讯地址
 * @property string $fax_num 传真号码
 * @property string $monad_status 党组织所在单位情况
 * @property string $administrative_areas 党组织所在行政区划
 * @property string $unit_name 单位名称
 * @property string $unit_affiliation 单位隶属关系
 * @property string $type 单位性质类别
 * @property string $establish_status 单位建立党组织情况
 * @property string $corporate_identity 法人单位标识
 * @property string $legal 法人代表（单位负责人）
 * @property int $is_member 是否党员
 * @property string $credit_code 社会统一信用代码
 * @property string $enterprise_holdings 企业控制（控股）情况
 * @property string $enterprise_scale 企业规模
 * @property string $private_label 民营科技企业标识
 * @property string $service_type 社会服务机构类别
 * @property string $business_type 事业单位类别
 * @property int $online_person 在岗职工数（人）
 * @property int $online_workers 在岗职工中工人数（人）
 * @property int $online_technology 在岗专业技术人员数（人）
 * @property int $is_union 是否建有工会
 * @property string $mediation 中介组织标识
 * @property int $house_num 户数（户)
 * @property int $population 人口（人）
 * @property string $lng 经度
 * @property string $wgs_lng
 * @property string $lat 纬度
 * @property string $wgs_lat
 * @property string $grid_code 网格代号
 * @property string $grid_name 网格名称
 */
class Party extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%t_party}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['set_time', 'online_person', 'online_workers', 'online_technology', 'house_num', 'population'], 'integer'],
            [['lng', 'wgs_lng', 'lat', 'wgs_lat'], 'number'],
            [['party_code', 'dep_relationship', 'phone', 'fax_num', 'type', 'establish_status', 'corporate_identity', 'legal', 'enterprise_scale', 'private_label', 'service_type', 'business_type', 'mediation'], 'string', 'max' => 20],
            [['party_name', 'location'], 'string', 'max' => 100],
            [['party_type', 'secretary', 'linkman'], 'string', 'max' => 10],
            [['monad_status', 'administrative_areas', 'unit_name', 'unit_affiliation', 'credit_code', 'enterprise_holdings', 'grid_code'], 'string', 'max' => 50],
            [['is_member', 'is_union'], 'string', 'max' => 1],
            [['grid_name'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'party_code' => '党组织代码',
            'party_name' => '党组织名称',
            'party_type' => '组织类别',
            'dep_relationship' => '属地关系',
            'secretary' => '党组织书记',
            'linkman' => '党组织联系人',
            'phone' => '联系电话',
            'set_time' => '建立党组织日期',
            'location' => '通讯地址',
            'fax_num' => '传真号码',
            'monad_status' => '党组织所在单位情况',
            'administrative_areas' => '党组织所在行政区划',
            'unit_name' => '单位名称',
            'unit_affiliation' => '单位隶属关系',
            'type' => '单位性质类别',
            'establish_status' => '单位建立党组织情况',
            'corporate_identity' => '法人单位标识',
            'legal' => '法人代表（单位负责人）',
            'is_member' => '是否党员',
            'credit_code' => '社会统一信用代码',
            'enterprise_holdings' => '企业控制（控股）情况',
            'enterprise_scale' => '企业规模',
            'private_label' => '民营科技企业标识',
            'service_type' => '社会服务机构类别',
            'business_type' => '事业单位类别',
            'online_person' => '在岗职工数（人）',
            'online_workers' => '在岗职工中工人数（人）',
            'online_technology' => '在岗专业技术人员数（人）',
            'is_union' => '是否建有工会',
            'mediation' => '中介组织标识',
            'house_num' => '户数（户)',
            'population' => '人口（人）',
            'lng' => '经度',
            'wgs_lng' => 'Wgs Lng',
            'lat' => '纬度',
            'wgs_lat' => 'Wgs Lat',
            'grid_code' => '网格代号',
            'grid_name' => '网格名称',
        ];
    }
}
