<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "grproctag".
 *
 * @property int $id
 * @property string $tag
 * @property int $grproduct_id
 *
 * @property Grproduct $grproduct
 */
class Grproctag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'grproctag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tag', 'grproduct_id'], 'required'],
            [['grproduct_id'], 'integer'],
            [['tag'], 'string', 'max' => 200],
            [['grproduct_id'], 'exist', 'skipOnError' => true, 'targetClass' => Grproduct::className(), 'targetAttribute' => ['grproduct_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tag' => 'Tag',
            'grproduct_id' => 'Grproduct ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrproduct()
    {
        return $this->hasOne(Grproduct::className(), ['id' => 'grproduct_id']);
    }
}
