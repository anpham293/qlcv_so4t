<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "commentvanban".
 *
 * @property int $id
 * @property string $comment
 * @property int $nguoicomment
 * @property string $ngaycomment
 * @property int $vanbandi_id
 * @property int $commentvanban_id
 *
 * @property Admin $nguoicomment0
 * @property Commentvanban $commentvanban
 * @property Commentvanban[] $commentvanbans
 * @property Vanbandi $vanbandi
 */
class Commentvanban extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'commentvanban';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comment', 'nguoicomment', 'vanbandi_id'], 'required'],
            [['comment'], 'string'],
            [['nguoicomment', 'vanbandi_id', 'commentvanban_id'], 'integer'],
            [['ngaycomment'], 'safe'],
            [['nguoicomment'], 'exist', 'skipOnError' => true, 'targetClass' => Admin::className(), 'targetAttribute' => ['nguoicomment' => 'id']],
            [['commentvanban_id'], 'exist', 'skipOnError' => true, 'targetClass' => Commentvanban::className(), 'targetAttribute' => ['commentvanban_id' => 'id']],
            [['vanbandi_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vanbandi::className(), 'targetAttribute' => ['vanbandi_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'comment' => 'Comment',
            'nguoicomment' => 'Nguoicomment',
            'ngaycomment' => 'Ngaycomment',
            'vanbandi_id' => 'Vanbandi ID',
            'commentvanban_id' => 'Commentvanban ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNguoicomment0()
    {
        return $this->hasOne(Admin::className(), ['id' => 'nguoicomment']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommentvanban()
    {
        return $this->hasOne(Commentvanban::className(), ['id' => 'commentvanban_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommentvanbans()
    {
        return $this->hasMany(Commentvanban::className(), ['commentvanban_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVanbandi()
    {
        return $this->hasOne(Vanbandi::className(), ['id' => 'vanbandi_id']);
    }
}
