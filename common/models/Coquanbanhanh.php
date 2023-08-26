<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "coquanbanhanh".
 *
 * @property int $id
 * @property string $ten
 * @property string $ghichu
 *
 * @property Congvanhanhchinh[] $congvanhanhchinhs
 */
class Coquanbanhanh extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'coquanbanhanh';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ten'], 'required'],
            [['ghichu'], 'string'],
            [['ten'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten' => 'Bộ phận',
            'ghichu' => 'Ghi chú',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCongvanhanhchinhs()
    {
        return $this->hasMany(Congvanhanhchinh::className(), ['coquanbanhanh_id' => 'id']);
    }

    public static function  coquanbanhanhForSelect(){
        return ArrayHelper::map(Coquanbanhanh::find()->all(), 'id', 'ten');
    }
}
