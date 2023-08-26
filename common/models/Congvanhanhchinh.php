<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "congvanhanhchinh".
 *
 * @property int $id
 * @property string $sokyhieu
 * @property string $ngaybanhanh
 * @property string $ngayhieuluc
 * @property string $nguoiky
 * @property string $trichyeu
 * @property string $link
 * @property bool $active
 * @property int $loaivbhc_id
 * @property int $coquanbanhanh_id
 * @property int $Linhvucvanban_id
 *
 * @property Linhvucvanban $linhvucvanban
 * @property Coquanbanhanh $coquanbanhanh
 * @property Loaivbhc $loaivbhc
 */
class Congvanhanhchinh extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'congvanhanhchinh';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sokyhieu', 'ngaybanhanh', 'ngayhieuluc', 'nguoiky', 'link','loaivbhc_id', 'coquanbanhanh_id', 'Linhvucvanban_id'], 'required'],
            [['ngaybanhanh', 'ngayhieuluc'], 'safe'],
            [['trichyeu', 'link'], 'string'],
            [['active'], 'boolean'],
            [['loaivbhc_id', 'coquanbanhanh_id', 'Linhvucvanban_id'], 'integer'],
            [['sokyhieu'], 'string', 'max' => 50],
            [['nguoiky'], 'string', 'max' => 45],
            [['Linhvucvanban_id'], 'exist', 'skipOnError' => true, 'targetClass' => Linhvucvanban::className(), 'targetAttribute' => ['Linhvucvanban_id' => 'id']],
            [['coquanbanhanh_id'], 'exist', 'skipOnError' => true, 'targetClass' => Coquanbanhanh::className(), 'targetAttribute' => ['coquanbanhanh_id' => 'id']],
            [['loaivbhc_id'], 'exist', 'skipOnError' => true, 'targetClass' => Loaivbhc::className(), 'targetAttribute' => ['loaivbhc_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sokyhieu' => 'Số - Ký hiệu',
            'ngaybanhanh' => 'Ngày ban hành',
            'ngayhieuluc' => 'Ngày bắt đầu hiệu lực',
            'nguoiky' => 'Người ký',
            'trichyeu' => 'Trích yếu',
            'active' => 'Hiện thị',
            'link' => 'link',
            'loaivbhc_id' => 'Loại Hồ sơ sức khỏe',
            'coquanbanhanh_id' => 'Bộ phận xử lý Hồ sơ sức khỏe',
            'Linhvucvanban_id' => 'Lĩnh vực Hồ sơ sức khỏe',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLinhvucvanban()
    {
        return $this->hasOne(Linhvucvanban::className(), ['id' => 'Linhvucvanban_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoquanbanhanh()
    {
        return $this->hasOne(Coquanbanhanh::className(), ['id' => 'coquanbanhanh_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoaivbhc()
    {
        return $this->hasOne(Loaivbhc::className(), ['id' => 'loaivbhc_id']);
    }


}
