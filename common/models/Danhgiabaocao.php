<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "danhgiabaocao".
 *
 * @property int $id
 * @property int $baocao_id
 * @property int $nguoidanhgia
 * @property string $noidungdanhgia
 * @property string $thoigiandanhgia
 * @property string $filedinhkem
 */
class Danhgiabaocao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'danhgiabaocao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['baocao_id', 'nguoidanhgia', 'noidungdanhgia'], 'required'],
            [['baocao_id', 'nguoidanhgia'], 'integer'],
            [['noidungdanhgia', 'filedinhkem'], 'string'],
            [['thoigiandanhgia'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'baocao_id' => 'Baocao ID',
            'nguoidanhgia' => 'Nguoidanhgia',
            'noidungdanhgia' => 'Noidungdanhgia',
            'thoigiandanhgia' => 'Thoigiandanhgia',
            'filedinhkem' => 'Filedinhkem',
        ];
    }
}
