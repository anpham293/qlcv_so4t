<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
Hello <?= $user->username ?>,

Hãy bấm vào đường dẫn bên dưới để thay đổi mật khẩu:

<?= $resetLink ?>
