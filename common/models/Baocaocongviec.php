<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "baocaocongviec".
 *
 * @property int $id
 * @property string $ngaybaocao
 * @property int $nguoibaocao
 * @property int $congviec_id
 * @property int $nguoidanhgia
 * @property int $parent
 * @property string $noidungbaocao
 * @property string $ketquadatduoc
 * @property string $danhgaibaocao
 * @property string $thoigiandanhgia
 * @property string $filedinhkem
 *
 * @property Congviec $congviec
 */
class Baocaocongviec extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'baocaocongviec';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ngaybaocao'], 'safe'],
            [['nguoibaocao', 'congviec_id', 'noidungbaocao'], 'required'],
            [['nguoibaocao', 'congviec_id', 'nguoidanhgia', 'parent'], 'integer'],
            [['noidungbaocao', 'ketquadatduoc',"danhgaibaocao","thoigiandanhgia","filedinhkem"], 'string'],
            [['congviec_id'], 'exist', 'skipOnError' => true, 'targetClass' => Congviec::className(), 'targetAttribute' => ['congviec_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ngaybaocao' => 'Ngaybaocao',
            'nguoibaocao' => 'Nguoibaocao',
            'nguoidanhgia' => 'Người đánh giá',
            'congviec_id' => 'Congviec ID',
            'noidungbaocao' => 'Nội dung công việc',
            'ketquadatduoc' => 'Mô tả chi tiết',
            'danhgaibaocao' => 'Đánh giá báo cáo',
            'thoigiandanhgia' => 'Thời gian đánh giá',
            'parent' => '',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCongviec()
    {
        return $this->hasOne(Congviec::className(), ['id' => 'congviec_id']);
    }
}
