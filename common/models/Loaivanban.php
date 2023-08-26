<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "loaivanban".
 *
 * @property int $id
 * @property string $ten Tên loại
 * @property string $kyhieu
 * @property int $soluong
 *
 * @property Vanban[] $vanbans
 */
class Loaivanban extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'loaivanban';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ten', 'kyhieu'], 'required'],
            [['soluong'], 'integer'],
            [['ten'], 'string', 'max' => 200],
            [['kyhieu'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten' => 'Tên loại',
            'kyhieu' => 'Kyhieu',
            'soluong' => 'Soluong',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVanbans()
    {
        return $this->hasMany(Vanban::className(), ['loaivanban_id' => 'id']);
    }
}
