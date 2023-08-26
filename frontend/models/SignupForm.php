<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;
use yii\web\UploadedFile;

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $title;
    public $firstname;
    public $surname;
    public $password;
    public $password_repeat;
    public $email;
    public $email_confirm;
    public $phone;
    public $address;
    public $address2;
    public $websiteurl;
    public $city;
    public $street;
    public $postcode;
    public $country;
    public $company;
    public $company_registration_number;
    public $vat_number;
    public $brief;

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
            [
                [
                    'username',
                    'email',
                    'email_confirm',
                    'phone',
                    'firstname',
                    'surname',
                    'address',
                    'address2',
                    'websiteurl',
                    'city',
                    'street',
                    'postcode',
                    'country',
                    'company',
                    'vat_number',
                    'company_registration_number',
                    'brief',
                ],
                'trim'
            ],

            ['username', 'required', 'message'=>'Username cannot be blanked.'],
            ['email', 'required', 'message'=>'Email cannot be blanked.'],
            ['email_confirm', 'required', 'message'=>'Confirm Email cannot be blanked.'],
            ['phone', 'required', 'message'=>'Phone number cannot be blanked.'],
            ['password', 'required', 'message'=>'Password cannot be blanked.'],
            ['password_repeat', 'required', 'message'=>'Confirm Password cannot be blanked.'],
            ['firstname', 'required', 'message'=>'Firstname cannot be blanked.'],
            ['surname', 'required', 'message'=>'Surname cannot be blanked.'],
            ['address', 'required', 'message'=>'Address cannot be blanked.'],
            ['city', 'required', 'message'=>'City cannot be blanked.'],
            ['street', 'required', 'message'=>'Street cannot be blanked.'],
            ['postcode', 'required', 'message'=>'Postcode cannot be blanked.'],
            ['country', 'required', 'message'=>'Country cannot be blanked.'],
            ['company', 'required', 'message'=>'Company cannot be blanked.'],
            ['title', 'required', 'message'=>'Title cannot be blanked.'],
            ['company_registration_number', 'required', 'message'=>'Company Registration Number cannot be blanked.'],

            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'email', 'message' => 'Please enter valid Email Address'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['phone', 'string', 'max' => 20],

            ['firstname', 'string', 'max' => 100],
            ['surname', 'string', 'max' => 100],
            ['address', 'string', 'max' => 500],
            ['websiteurl', 'string', 'max' => 1000],
            ['city', 'string', 'max' => 100],
            ['street', 'string', 'max' => 100],
            ['postcode', 'string', 'max' => 20],
            ['country', 'string', 'max' => 100],
            ['company', 'string', 'max' => 200],
            ['vat_number', 'string', 'max' => 50],
            ['company_registration_number', 'string', 'max' => 50],
            ['brief', 'string', 'max' => 2000],

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

            ['password', 'string', 'min' => 6],
            ['password_repeat', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match" ],
            ['email_confirm', 'compare', 'compareAttribute'=>'email', 'message'=>"Email don't match" ],

        ];
    }

    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->title = $this->title;
        $user->email = $this->email;
        $user->phone = $this->phone;
        $user->address = $this->address;
        $user->address2 = $this->address2;
        $user->firstname = $this->firstname;
        $user->surname = $this->surname;
        $user->websiteurl = $this->websiteurl;
        $user->city = $this->city;
        $user->street = $this->street;
        $user->postcode = $this->postcode;
        $user->country = $this->country;
        $user->company = $this->company;
        $user->company_registration_number = $this->company_registration_number;
        $user->vat_number = $this->vat_number;
        $user->brief = $this->brief;
        $user->status = 0;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        $t = time();
        $temp = '/images/user/'.$user->username.'/';
        $folder = dirname(dirname(__DIR__)).$temp;

        if (!file_exists($folder)) {
            mkdir($folder, 0777, true);
        }

        if (!is_null($this->file1)) {
            $filename = \func::taoduongdan($t. '-1-' . $this->file1->name);
            $user->company_registration_certificate = $temp . $filename;
            $path = $folder.$filename;
            $this->file1->saveAs($path);
        }

        if (!is_null($this->file2)) {
            $filename = \func::taoduongdan($t. '-2-' . $this->file2->name);
            $user->vat_document = $temp . $filename;
            $path = $folder.$filename;
            $this->file2->saveAs($path);
        }

        if (!is_null($this->file3)) {
            $filename = \func::taoduongdan($t. '-3-' . $this->file3->name);
            $user->supplier_invoice = $temp . $filename;
            $path = $folder.$filename;
            $this->file3->saveAs($path);
        }

        if (!is_null($this->file4)) {
            $filename = \func::taoduongdan($t. '-4-' . $this->file4->name);
            $user->shop_picture = $temp . $filename;
            $path = $folder.$filename;
            $this->file4->saveAs($path);
        }

        return $user->save() ? $user : null;
    }
	
	public function signupByAdmin()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->title = $this->title;
        $user->email = $this->email;
        $user->phone = $this->phone;
        $user->address = $this->address;
        $user->address2 = $this->address2;
        $user->firstname = $this->firstname;
        $user->surname = $this->surname;
        $user->websiteurl = $this->websiteurl;
        $user->city = $this->city;
        $user->street = $this->street;
        $user->postcode = $this->postcode;
        $user->country = $this->country;
        $user->company = $this->company;
        $user->company_registration_number = $this->company_registration_number;
        $user->vat_number = $this->vat_number;
        $user->brief = $this->brief;
        $user->status = 10;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        $t = time();
        $temp = '/images/user/'.$user->username.'/';
        $folder = dirname(dirname(__DIR__)).$temp;

        if (!file_exists($folder)) {
            mkdir($folder, 0777, true);
        }

        if (!is_null($this->file1)) {
            $filename = \func::taoduongdan($t. '-1-' . $this->file1->name);
            $user->company_registration_certificate = $temp . $filename;
            $path = $folder.$filename;
            $this->file1->saveAs($path);
        }

        if (!is_null($this->file2)) {
            $filename = \func::taoduongdan($t. '-2-' . $this->file2->name);
            $user->vat_document = $temp . $filename;
            $path = $folder.$filename;
            $this->file2->saveAs($path);
        }

        if (!is_null($this->file3)) {
            $filename = \func::taoduongdan($t. '-3-' . $this->file3->name);
            $user->supplier_invoice = $temp . $filename;
            $path = $folder.$filename;
            $this->file3->saveAs($path);
        }

        if (!is_null($this->file4)) {
            $filename = \func::taoduongdan($t. '-4-' . $this->file4->name);
            $user->shop_picture = $temp . $filename;
            $path = $folder.$filename;
            $this->file4->saveAs($path);
        }

        return $user->save() ? $user : null;
    }
}
