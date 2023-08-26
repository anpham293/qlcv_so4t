<?php
namespace backend\models;

use common\models\Log;
use phpDocumentor\Reflection\Types\This;
use function foo\func;
use yii\base\Model;
use common\models\Admin;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * Signup form
 */
class SignupAdminForm extends Model
{
    public $username;
    public $ten;
    public $email;
    public $donvi;
    public $phongban;
    public $chucvu;


    public $password;
    public $password_repeat;
    public $role;
    public $hierachy;



    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\Admin', 'message' => 'Username đã tồn tại.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['donvi','integer'],
            ['phongban','integer'],
            ['chucvu','integer'],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\Admin', 'message' => 'This email address has already been taken.'],


            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['ten', 'required'],
            ['ten', 'string', 'min' => 6,'max'=>50],

            ['hierachy', 'string'],
            ['hierachy', 'required'],

            ['password_repeat', 'required'],
            ['password_repeat', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match" ],

            ['role', 'trim'],
            ['role', 'required'],

        ];
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Signs user up.
     *
     * @return Admin|null the saved model or null if saving fails
     */

    public function signup($dsn)
    {


        try{
        if (!$this->validate()) {

            return null;
        }
        }catch (\Exception $e){
            return $e;
        }
        $user = new Admin();
        $user->username = strtolower(\func::taoduongdan($this->username));
        $user->email = $this->email;
        $user->ten = $this->ten;

        $user->donvi_id=$this->donvi;
        if(empty($this->donvi)){
            $user->donvi_id=-1;
        }
        $user->setPassword($this->password);
        $user->status = 10;
        $user->userdb=$this->hierachy;
        $user->phongban_id=$this->phongban;
        $user->chucvu_id=$this->chucvu;
        \Yii::$app->db->close();
        \Yii::$app->db->dsn = $dsn;
        \Yii::$app->db->open();

        $user->generateAuthKey();

        if($user->save()){
            $auth = \Yii::$app->authManager;
            $role = $auth->getRole($this->role);
            $auth->assign($role,$user->id);
            $log = new Log();
            $log->time = \func::getTimeNow();
            $log->noidung= "Thêm mới user ".$user->username;
            $log->user=\Yii::$app->user->identity->username;
            $log->loai= "User";
            $log->banghi=1;
            $log->save();
            return $user;
        }
        else
            return $user->errors;
    }

}
