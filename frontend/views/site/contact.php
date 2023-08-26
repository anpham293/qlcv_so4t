<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
$config=\common\models\Configure::getConfig();
$this->title = 'Liên hệ';
?>

<div class="col-md-9 cotchinh col-fix-2-3  div_content_tq">
    <div class="section-content padding news-details">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="section border">
                <div>
                    <style type="text/css">
                        .a:visited {
                            color: #333;
                        }

                        .txt_tag {
                            display: inline;
                            background: #f1f1f1;
                            padding: 0 10px;
                            height: 20px;
                            color: #939393;
                            float: left;
                            font: 400 11px/20px arial;
                            margin: 5px 5px 0 0;
                        }

                        .txt_tag:hover {
                            background-position: initial;
                            background-image: initial;
                            background-size: initial;
                            background-attachment: initial;
                            background-origin: initial;
                            background-clip: initial;
                            background-color: rgb(226, 226, 226);
                            background-repeat: repeat;
                        }

                        .btnHidden {
                            display: none;
                        }

                        .infoUser {
                            font-weight: 700 !important;
                            font-size: 12px !important;
                        }
                    </style>

                    <div id="Lien-he">
                        <div class="news-list-title">
                            <div class="text-align-center">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3731.2030695722806!2d106.74909231444063!3d20.74256180286385!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a6dde551fe5a5%3A0xebc7bd92ae823647!2z4bumeSBCYW4gTmjDom4gRMOibiBQaMaw4budbmcgTWluaCDEkOG7qWM!5e0!3m2!1svi!2s!4v1583402723906!5m2!1svi!2s" width="100%" height="500px" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                                &nbsp;
                                <div class="col-lg-12 col-md-12 col-xs-12">
                                    <div class="contact-office" style="text-align: center">

                                        <h1 style="font-size: 30px!important;">Uỷ ban nhân dân <?= $config['contact_cname'] ?> </h1>
                                        &nbsp;
                                        <p style="line-height: 35px; font-size: 15px!important;"><strong>Địa chỉ:</strong> <?php echo $config['contact_address']?></p>
                                        <p style="line-height: 35px; font-size: 15px!important;"><strong>Điện thoại:</strong> <a href="tel:<?=$config['contact_phone']?>"><?=$config['contact_phone']?></a></p>
                                        <p style="line-height: 35px; font-size: 15px!important;"><strong>Email:</strong> <a href="email:<?=$config['contact_email']?>"><?=$config['contact_email']?></a></p>
                                        <p style="line-height: 35px; font-size: 15px!important;"><strong>Website:</strong> <a href="javascript:;"><?=(isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]"?></a></p>
                                        <p style="line-height: 35px; font-size: 15px!important;"><strong>Fax:</strong> <a href="fax:<?=$config['contact_fax']?>"><?=$config['contact_fax']?></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ms-clear"></div>
            </div>
        </div>
    </div>
</div>


