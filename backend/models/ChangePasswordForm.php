<?php
namespace backend\models;

use yii\base\Model;
use common\models\Admin;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * ThayPass form
 */
class ChangePasswordForm extends Model
{
    public $old_password;
    public $password;
    public $password_repeat;


    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['old_password','password','password_repeat'], 'required'],
            [['old_password','password'], 'string', 'min' => 6],
            ['old_password', 'findPasswords'],
            ['password_repeat', 'compare', 'compareAttribute'=>'password', 'message'=>"Mật khẩu mới nhắc lại phải trùng nhau!" ],
        ];
    }

    public function attributeLabels(){
        return [
            'old_password'=>'Mật khẩu cũ',
            'password'=>'Mật khẩu mới',
            'password_repeat'=>'Xác nhận mật khẩu mới lần nữa',
        ];
    }

    public function findPasswords()
    {
        $admin = Admin::findByUsername(\Yii::$app->user->identity->username);
        if(\Yii::$app->security->validatePassword($this->old_password,$admin->password_hash)==false)
            $this->addError("old_password","Old password is incorrect");
    }

    public function changePassword()
    {
        $admin = Admin::findOne(\Yii::$app->user->identity->getId());
        $admin->setPassword($this->password);
        $admin->removePasswordResetToken();

        return $admin->save(false);
    }
}
