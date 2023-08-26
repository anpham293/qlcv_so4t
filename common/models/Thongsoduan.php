<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "thongsoduan".
 *
 * @property int $id
 * @property string $ten
 * @property int $parent
 * @property int $thapphan
 */
class Thongsoduan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'thongsoduan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ten'], 'string'],
            [['thapphan'], 'required'],
            [['parent','thapphan'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten' => 'Tên',
            'parent' => 'Parent',
            'thapphan'=>'Số chữ số phần thập phân'
        ];
    }
    public static function getListThongSoForSelect(){
        $return =[];
        foreach (Thongsoduan::find()->where(['parent'=>-1])->all() as $value){
            $thongsobac2 = Thongsoduan::find()->where(['parent'=>$value->id])->all();
            if(empty($thongsobac2)){
                $return[]=[
                    'id'=>$value->id,
                    'ten'=>$value->ten,
                ];
            }else{
                foreach ($thongsobac2 as $value2){
                    $return[]=[
                        'id'=>$value2->id,
                        'ten'=>$value2->ten,
                        'group'=>$value->ten
                    ];
                }
            }
        }
        return $return;
    }
}
