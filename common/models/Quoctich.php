<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "quoctich".
 *
 * @property int $id
 * @property string $ten
 * @property string $tengoi
 */
class Quoctich extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quoctich';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ten', 'tengoi'], 'required'],
            [['ten', 'tengoi'], 'string', 'max' => 200],
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
            'tengoi' => 'Tengoi',
        ];
    }
    public static function getListQuocTichForDropdown(){
        return ArrayHelper::map(Quoctich::find()->all(),'ten','ten');
    }
}
