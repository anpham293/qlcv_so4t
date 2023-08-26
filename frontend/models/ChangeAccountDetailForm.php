<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * ThayPass form
 */
class ChangeAccountDetailForm extends Model
{
    public $address;
    public $address2;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                [
                    'address',
                    'address2',
                ],
                'trim'
            ],

            ['address', 'required', 'message'=>'Address cannot be blanked.'],

            ['address', 'string', 'max' => 500],
            ['address2', 'string', 'max' => 500],
        ];
    }


    public function changeInformation()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = User::findOne(\Yii::$app->user->identity->getId());

        $user->address = $this->address;
        $user->address2 = $this->address2;
        return $user->save();
    }
}
