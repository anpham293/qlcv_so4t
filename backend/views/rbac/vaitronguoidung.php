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


$this->title = 'Phân vai trò';
$this->params['breadcrumbs'][] = ['name'=>$this->title,'link'=>'javascript:void(0)'];

CrudAsset::register($this);

?>
<?php echo Html::beginForm('','',['id'=>'user-role-form']);?>

<div class="auth-item-index table-responsive">
    <table class="table table-bordered table-hover">
        <tr>
            <th style="width: 250px; ">USERS \ ROLES</th>
            <?php foreach ($roles as $role): ?>
                <?php if($role->name!='superadmin' || Yii::$app->user->identity->username=='Superadmin'): ?>
                <th style="text-align: center; text-transform: uppercase;"><?php echo $role->name; ?></th>
                <?php endif; ?>
            <?php endforeach; ?>
        </tr>
        <?php foreach ($users as $user): if(strtolower($user->username)!='superadmin'):?>
            <tr>
                <td style="text-transform: uppercase; background-color: #6b6b6b; color: white;"><?php echo $user->username ?></td>
                <?php foreach ($roles as $role): ?>
                    <?php if($role->name!='superadmin'|| Yii::$app->user->identity->username=='Superadmin'): ?>
                        <td style="text-align: center; padding: 0; line-height: 32px;"><?php echo Html::checkbox($role->name, $xxx[$user->username][$role->name]==1, ['value' => $user->username, 'class' => 'phanvaitro']) ?></td>
                        <?php endif; ?>
                <?php endforeach; ?>
            </tr>
        <?php endif; endforeach; ?>
    </table>
</div>

<?php echo Html::endForm(); ?>


