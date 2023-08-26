<?php
/**
* @property string $mahogiadinh
* @property string $cmnd

*/
namespace frontend\models;


use common\models\Dulieuhososuckhoe;

class UpdateDulieu extends \yii\db\ActiveRecord
{
    public $cmnd;
    public $mahogiadinh;
    public $hoten;
    public $istreem;
    public $idcheck;
    public $errorT;
    public static function tableName()
    {
        return 'dulieuhososuckhoe';
    }

    public function rules()
    {
        return [
           [['cmnd','mahogiadinh','hoten'], 'required'],
           [['hoten'], 'string'],
        ];
    }
    public function validates(){

        if($this->istreem){
            $check = Dulieuhososuckhoe::find()->where(['mahogiadinh'=>$this->mahogiadinh])->all();

            if(empty($check)){
                return false;
            }
            else{
                $checkExist = false;
                foreach ($check as $value){
                    if ((\func::taoduongdan($value->hovaten) == \func::taoduongdan($this->hoten)) && $value->id!=1){
                        $this->idcheck=$value->socmnd;
                        $this->cmnd="TREEM";
                        return true;
                    }
                }

                return false;
            }

        }else{
            $check = Dulieuhososuckhoe::findOne(['socmnd'=>$this->cmnd,'mahogiadinh'=>$this->mahogiadinh]);

            if(is_null($check)){

                return false;
            }elseif(\func::taoduongdan($check->hovaten)!= \func::taoduongdan($this->hoten)){

                return false;
            }
            else{
                if($check->id==1){
                    return false;
                }
                return true;

            }
        }

    }
    public function attributeLabels()
    {
        return [
            'cmnd' => 'Số CMND/CCCD',
            'mahogiadinh' => 'Mã hộ GĐ',
            'hoten' => 'Họ và tên',
            'istreem' => 'Là trẻ em chưa có CMND/CCCD',
        ];

    }


}