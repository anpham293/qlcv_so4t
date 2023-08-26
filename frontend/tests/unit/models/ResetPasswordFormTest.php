<?php

namespace frontend\tests\unit\models;

use common\fixtures\UserFixture;
use frontend\models\ResetPasswordForm;

class ResetPasswordFormTest extends \Codeception\Test\Unit
{
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
     * @var \frontend\tests\UnitTester
     */
    protected $tester;


    public function _before()
    {
        $this->tester->haveFixtures([
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'user.php'
            ],
        ]);
    }

    public function testResetWrongToken()
    {
        $this->tester->expectException('yii\base\InvalidParamException', function() {
            new ResetPasswordForm('');
        });

        $this->tester->expectException('yii\base\InvalidParamException', function() {
            new ResetPasswordForm('notexistingtoken_1391882543');
        });
    }

    public function testResetCorrectToken()
    {
        $user = $this->tester->grabFixture('user', 0);
        $form = new ResetPasswordForm($user['password_reset_token']);
        expect_that($form->resetPassword());
    }

}
