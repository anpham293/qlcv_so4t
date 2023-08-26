<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * ThayPass form
 */
class ChangeCompanyVerificationForm extends Model
{
    public $vat_number;

    public $file1;
    public $file2;
    public $file3;
    public $file4;

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['vat_number', 'trim'],
            ['vat_number', 'string', 'max' => 50],

            [
                [
                    'file1',//$company_registration_certificate
                    'file2',//vat_document
                    'file3',//supplier_invoice
                    'file4',//shop_picture
                ],
                'file',
                'skipOnEmpty' => true,
                'extensions' => 'png, jpg, jpeg, pdf, doc'
            ],

        ];
    }

    public function changeInformation()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = User::findOne(\Yii::$app->user->identity->getId());
        $user->vat_number = $this->vat_number;
        $baseUrl = dirname(dirname(__DIR__));

        $t = time();
        $temp = '/images/user/'.$user->username.'/';
        $folder = dirname(dirname(__DIR__)).$temp;

        if (!is_null($this->file1)) {
            $filename = \func::taoduongdan($t. '-1-' . $this->file1->name);
            $path = $folder.$filename;
            $this->file1->saveAs($path);
            unlink($baseUrl.$user->company_registration_certificate);
            $user->company_registration_certificate = $temp . $filename;
        }

        if (!is_null($this->file2)) {
            $filename = \func::taoduongdan($t. '-2-' . $this->file2->name);
            $path = $folder.$filename;
            $this->file2->saveAs($path);
            unlink($baseUrl.$user->vat_document);
            $user->vat_document = $temp . $filename;
        }

        if (!is_null($this->file3)) {
            $filename = \func::taoduongdan($t. '-3-' . $this->file3->name);
            $path = $folder.$filename;
            $this->file3->saveAs($path);
            unlink($baseUrl.$user->supplier_invoice);
            $user->supplier_invoice = $temp . $filename;
        }

        if (!is_null($this->file4)) {
            $filename = \func::taoduongdan($t. '-4-' . $this->file4->name);
            $path = $folder.$filename;
            $this->file4->saveAs($path);
            unlink($baseUrl.$user->shop_picture);
            $user->shop_picture = $temp . $filename;
        }

        return $user->save();
    }
}
