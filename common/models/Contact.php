<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property int $id
 * @property string $company_name
 * @property string $slogan
 * @property string $address
 * @property string $address1
 * @property string $phone
 * @property string $hotline
 * @property string $fax
 * @property string $email
 * @property string $email_bcc
 * @property string $about_title
 * @property string $about_content
 * @property string $about_image
 * @property string $about_url
 * @property string $footer
 * @property string $copyright
 * @property string $logo
 * @property string $logo_footer
 * @property string $site_title
 * @property string $site_desc
 * @property string $site_keyword
 * @property string $payment
 * @property string $gift
 * @property int $lang_id
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['address', 'address1', 'about_content', 'about_image', 'about_url', 'footer', 'copyright', 'logo', 'logo_footer', 'site_desc', 'site_keyword', 'payment', 'gift'], 'string'],
            [['lang_id'], 'integer'],
            [['company_name', 'slogan', 'about_title'], 'string', 'max' => 200],
            [['phone', 'hotline', 'fax'], 'string', 'max' => 20],
            [['email', 'email_bcc', 'site_title'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_name' => 'Company Name',
            'slogan' => 'Slogan',
            'address' => 'Address',
            'address1' => 'Address1',
            'phone' => 'Phone',
            'hotline' => 'Hotline',
            'fax' => 'Fax',
            'email' => 'Email',
            'email_bcc' => 'Email Bcc',
            'about_title' => 'About Title',
            'about_content' => 'About Content',
            'about_image' => 'About Image',
            'about_url' => 'About Url',
            'footer' => 'Footer',
            'copyright' => 'Copyright',
            'logo' => 'Logo',
            'logo_footer' => 'Logo Footer',
            'site_title' => 'Site Title',
            'site_desc' => 'Site Desc',
            'site_keyword' => 'Site Keyword',
            'payment' => 'Payment',
            'gift' => 'Gift',
            'lang_id' => 'Lang ID',
        ];
    }
}
