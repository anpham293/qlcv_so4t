<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "tongiao".
 *
 * @property int $id
 * @property string $ten
 */
class Tongiao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tongiao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ten'], 'required'],
            [['id'], 'integer'],
            [['ten'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten' => 'Ten',
        ];
    }
    public static function getListTonGiaoForDropdown(){
        return ArrayHelper::map(Tongiao::find()->all(),'ten','ten');
    }
}
