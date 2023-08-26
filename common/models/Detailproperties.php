<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "detail_properties".
 *
 * @property int $id
 * @property int $properties_id
 * @property int $catproduct_id
 *
 * @property Catproduct $catproduct
 * @property Properties $properties
 */
class Detailproperties extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detail_properties';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['properties_id', 'catproduct_id'], 'required'],
            [['properties_id', 'catproduct_id'], 'integer'],
            [['catproduct_id'], 'exist', 'skipOnError' => true, 'targetClass' => Catproduct::className(), 'targetAttribute' => ['catproduct_id' => 'id']],
            [['properties_id'], 'exist', 'skipOnError' => true, 'targetClass' => Properties::className(), 'targetAttribute' => ['properties_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'properties_id' => 'Properties ID',
            'catproduct_id' => 'Catproduct ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatproduct()
    {
        return $this->hasOne(Catproduct::className(), ['id' => 'catproduct_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProperties()
    {
        return $this->hasOne(Properties::className(), ['id' => 'properties_id']);
    }

}
