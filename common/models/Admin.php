<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\Json;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $ten

 * @property string $username

 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email

 * @property string $auth_key

 * @property integer $status
 * @property integer $phongban_id
 * @property integer $chucvu_id
 * @property integer $donvi_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 * @property string $userdb
 * @property Chucvu $chucVu
 * @property Phongban $phongBan
 */
class Admin extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%admin}}';
    }

    /**
     * @inheritdoc
     */


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],

            [['chucvu_id'], 'exist', 'skipOnError' => true, 'targetClass' => Chucvu::className(), 'targetAttribute' => ['chucvu_id' => 'id']],
            [['phongban_id'], 'exist', 'skipOnError' => true, 'targetClass' => Phongban::className(), 'targetAttribute' => ['phongban_id' => 'id']],
        ];
    }
    public function attributeLabels()
    {
        return [
            'username' => 'Tên đăng nhập',
            'ten' => 'Họ và tên',
            'status' => 'Trạng thái',
            'phongban_id' => 'Phòng ban',
            'chucvu_id' => 'Chức vụ',
            'donvi_id' => 'Người quản lý',
        ];
    }


    /**
     * @inheritdoc
     */
    public function getChucVu()
    {
        return $this->hasOne(Chucvu::className(), ['id' => 'chucvu_id']);
    }
    public function getPhongBan()
    {
        return $this->hasOne(Phongban::className(), ['id' => 'phongban_id']);
    }
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
    public static function getAdminForQuanly(){
        $return = [
            ['id'=>'-1','ten'=>'Không gán']
        ];
        $phongban = Phongban::find()->orderBy('ord asc')->all();
        foreach ($phongban as $value){
            $admin = Admin::findAll(['phongban_id'=>$value->id]);
            foreach ($admin as $admins){
                $chucvu = Chucvu::findOne($admins->chucvu_id);
                $return[]=[
                    'id'=>$admins->id,
                    'ten'=>((is_null($chucvu))?"Chưa gán chức vụ":$chucvu->ten)." - ".$admins->ten,
                    'group'=>$value->ten
                ];
            }
        }
        return $return;
    }
    public static function getAllUserManaged($id){
        $returns = [];
        if(strtolower(Yii::$app->user->identity->username)=="superadmin"){
            foreach (Admin::find()->select('id')->all() as $value){
                $returns[]=$value->id;
            }
            return $returns;
        }

        $quanly = Admin::find()->where(['donvi_id'=>$id])->all();
        if(empty($quanly))
            return $returns;
        foreach ($quanly as $value){
            $returns[]=$value->id;
            array_merge($returns,self::getAdminForQuanly($value->id));
        }
        return $returns;
    }
    public static function getAllUserManagedByCurrentUser(){
        return array_merge([Yii::$app->user->id],self::getAllUserManaged(Yii::$app->user->identity->id));
    }
    public static function getAllUserUnderManagedByCurrentUser(){
        $chucvu = Chucvu::findOne(Yii::$app->user->identity->chucvu_id);
        if(is_null($chucvu) && Yii::$app->user->identity->username!="Superadmin"){
            return [];
        }
        if(Yii::$app->user->identity->username=="Superadmin"){
            $chucvuManaged = Chucvu::find()->orderBy("bacdongcap desc")->all();
        }else{
            $chucvuManaged = Chucvu::find()->where("bacdongcap<".$chucvu->bacdongcap)->orderBy("bacdongcap desc")->all();

        }


        $listReturn = [];
        foreach ($chucvuManaged as $value){
            $admin = Admin::find()->where(['chucvu_id'=>$value->id])->orderBy('phongban_id asc')->all();
            foreach ($admin as $valueAdmin){/** @var Admin $valueAdmin */

                $listReturn[]=[
                  'id'=>$valueAdmin->id,
                  'ten'=>$valueAdmin->ten." - ".((is_null($valueAdmin->phongBan))?"#N/A":$valueAdmin->phongBan->ten),
                  'group'=>$value->ten
                ];
            }
        }
        return $listReturn;
    }
    public static function getAllUserInPhongBanUnderManagedByCurrentUser($duanid){

        $phongbanid = Duan::findOne($duanid)->truongphongphutrach;
        $chucvu = Chucvu::findOne(Yii::$app->user->identity->chucvu_id);
        if(is_null($chucvu) && Yii::$app->user->identity->username!="Superadmin"){
            return [];
        }
        if(Yii::$app->user->identity->username=="Superadmin"){
            $chucvuManaged = Chucvu::find()->orderBy("bacdongcap desc")->all();
        }else{
            $chucvuManaged = Chucvu::find()->where("bacdongcap<".$chucvu->bacdongcap)->orderBy("bacdongcap desc")->all();

        }


        $listReturn = [];
        foreach ($chucvuManaged as $value){

            $admin = Admin::find()->where(['chucvu_id'=>$value->id])->andWhere(['IN','phongban_id',Json::decode($phongbanid)])->andWhere(['<>','phongban_id',2])->orderBy('phongban_id asc')->all();

            foreach ($admin as $valueAdmin){/** @var Admin $valueAdmin */

                $listReturn[]=[
                    'id'=>$valueAdmin->id,
                    'ten'=>$valueAdmin->ten." - ".$valueAdmin->chucVu->ten." - ".((is_null($valueAdmin->phongBan))?"#N/A":$valueAdmin->phongBan->ten),
                    'group'=>$value->ten
                ];
            }
        }
        return $listReturn;
    }
    public static function getAllUserDuocGiao($duanid){

        $model= Duan::findOne($duanid);
        $nguoinhan =Json::decode($model->nguoinhanviec);
        $nguoinhanphoihop =Json::decode($model->nguoinhan);
        return $listReturn;
    }

    public static function getAdminList(){
        $result=[];
        foreach (Phongban::find()->orderBy('ord asc')->all() as $value){
            foreach (Admin::findAll(['phongban_id'=>$value->id]) as $item) {
                $chucvu = Chucvu::findOne($item->chucvu_id);
                $result[]=[
                    'id'=>$item->id,
                    'ten'=>"--| ".$item->ten." - ".((is_null($chucvu))?"#N/A":$chucvu->ten),
                    'group'=>$value->ten
                ];
            }

        }
        return $result;
    }
    public static function getAdminListByPhongBanId($id){
        $result=[];
        $value=Phongban::findOne($id);
            foreach (Admin::findAll(['phongban_id'=>$value->id]) as $item) {
                $chucvu = Chucvu::findOne($item->chucvu_id);
                $result[]=[
                    'id'=>$item->id,
                    'ten'=>"--| ".$item->ten." - ".((is_null($chucvu))?"#N/A":$chucvu->ten),
                    'group'=>$value->ten
                ];
            }

        return $result;
    }
    public static function getKeToan(){
        $returnlist =[];
        $chucvu = Phongban::findOne(['ten'=>'Phòng tài chính - kế hoạch']);
        if(!is_null($chucvu)){
            foreach (Admin::findAll(['phongban_id'=>$chucvu->id]) as $value){
                $returnlist[]=[
                  'id'=>$value->id,
                  'ten'=>$value->ten
                ];
            }
        }
        return $returnlist;
    }
}
