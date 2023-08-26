<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\auth\models\Search\RbacSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Phân quyền';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>


<?php echo Html::beginForm('','',['id'=>'auth-form']);?>
<div class="auth-item-index table-responsive">
    <table class="table table-bordered table-hover">
        <tr>
            <th data-target=".allTarget" class="clickable" style="width: 250px; background-color: #795a4f; color: white; cursor: pointer;">ROLE LIST (click to expand)</th>
            <?php foreach ($roles as $role): ?>
                <?php if($role->name!='superadmin'): ?>
                    <th style="text-align: center; text-transform: uppercase;"><?php echo $role->name; ?></th>
                <?php endif; ?>
            <?php endforeach; ?>
        </tr>

        <?php $controller =''; ?>
        <?php foreach ($permissions as $permission):
            if(strpos($permission->name,'site')===false):
                $temp = preg_replace('/\/(.+)/','',$permission->name);
                if($temp!='rbac'||Yii::$app->user->identity->username=='Superadmin'):
                    if($temp!=$controller):
                        $controller = $temp;
                        echo '<tr>';
                        echo '<td data-toggle="collapse" data-target=.'.$controller.' class="clickable" style="background-color: #6b6b6b; color: white; text-transform: uppercase; padding: 0 0 0 12px; cursor: pointer; line-height: 39px;">'.$controller.'</td>';
                        foreach ($roles as $role):
                            echo '<td style="text-align: center; background-color: #6b6b6b; color: white;">'.Html::checkbox($role->name,false,["value" => $controller, "class"=>"phanquyenall"]).'</td>';
                        endforeach;
                        echo '</tr>';
                    endif;
                    ?>
                    <tr>
                        <td style="padding: 0 0 0 12px; line-height: 32px;"><div class="collapse <?php echo $controller ?> allTarget"><?php echo $permission->name ?></div></td>
                        <?php foreach ($roles as $role): ?>
                            <td style="text-align: center; padding: 0; line-height: 32px;"><div class="collapse <?php echo $controller ?> allTarget"><?php echo Html::checkbox($role->name,($yyy[$permission->name][$role->name]==1),['value' => $permission->name, 'class'=>'phanquyen']) ?></div></td>
                        <?php endforeach; ?>
                    </tr>
                    <?php
                endif;
            endif;
        endforeach;
        ?>
    </table>
</div>
<?php echo Html::endForm(); ?>
