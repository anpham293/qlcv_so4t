<table class="table table-bordered table-hover table-striped">
<?php
foreach ($data as $value):?>
    <tr><th style="background: #e76070" ><?=$value['phongban']->ten?></th><td>
            <?=\yii\helpers\Html::checkboxList('listnguoinhanphoihop',[],\yii\helpers\ArrayHelper::map($value['nhanvien'],'id','ten'), [
                'itemOptions' => [
                    'labelOptions' => [
                        'class' => 'col-md-6',
                    ],
                ],
            ])?>
        </td></tr>
<?php endforeach;?>
</table>