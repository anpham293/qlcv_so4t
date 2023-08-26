<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "dantoc".
 *
 * @property int $id
 * @property string $ten
 * @property string $tengoikhac
 */
class Dantoc extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dantoc';
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
            [['tengoikhac'], 'string', 'max' => 300],
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
            'tengoikhac' => 'Tengoikhac',
        ];
    }
    public static function getListDanTocForDropdown(){
        return ArrayHelper::map(Dantoc::find()->all(),'ten','ten');
    }
}
