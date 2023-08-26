<?php
namespace backend\models;

use yii\base\Model;
use common\models\Admin;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * ThayPass form
 */
class ThayPass extends Model
{
    public $password;


    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }


    public function setPassword()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new Admin();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->status = 0;
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
