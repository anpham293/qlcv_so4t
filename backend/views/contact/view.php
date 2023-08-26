<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Contact */
?>
<div class="contact-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'company_name',
            'slogan',
            'address:ntext',
            'address1:ntext',
            'phone',
            'hotline',
            'fax',
            'email:email',
            'email_bcc:email',
            'about_title',
            'about_content:ntext',
            'about_image:ntext',
            'about_url:ntext',
            'footer:ntext',
            'copyright:ntext',
            'logo:ntext',
            'logo_footer:ntext',
            'site_title',
            'site_desc:ntext',
            'site_keyword:ntext',
            'payment:ntext',
            'gift:ntext',
            'lang_id',
        ],
    ]) ?>

</div>
