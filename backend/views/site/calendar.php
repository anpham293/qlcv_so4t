<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;
CrudAsset::register($this);?>
<?php
$dataorder=[];
$order = \common\models\Order::find()->all();
foreach ($order as $value){
    if($value->status!=-2){
    /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236@var \common\models\Order $value */
    if(explode(" ",$value->timebatdau)[1]=="AM"){
        $dataorder[(string)$value->ngayduonglich][(string)$value->diadiem_id]["SA"]=$value;
        $dataorder[(string)$value->ngayduonglich][(string)$value->diadiem_id]["SAC"]=func::random_color();
    }
    if(explode(" ",$value->timebatdau)[1]=="PM"){
        $dataorder[(string)$value->ngayduonglich][(string)$value->diadiem_id]["CH"]=$value;
        $dataorder[(string)$value->ngayduonglich][(string)$value->diadiem_id]["CHC"]=func::random_color();
    }
    }
}
?>
<div class="row table-responsive" style="padding-top: 15px">
    <table class="table table-hover table-bordered">
        <tr>
            <td colspan="2"></td>
            <?php
            $data=[];
            $dattiec = \common\models\Order::find()->all();
            $listphong = \common\models\Diadiem::find()->where('active=1')->all();
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            for ($i=0;$i<7;$i++){
                $now = date_create_from_format("d/m/Y",$cur);
                $data[$i]=date_add($now,date_interval_create_from_date_string($i." day"));
                echo "<td class='dt'>" .date_format($data[$i],"D")."<br>".date_format($data[$i],"d/m/Y")."</td>";
            }
            ?>

        </tr>

        <?php foreach ($listphong as $phong):?>
            <tr>
                <td rowspan="2" class="dd"><?=$phong->ten?></td>
                <td class="sg">Sáng</td>
                <?php for ($i=0;$i<7;$i++):?>
                    <td class="sg"><?php
                        if(isset($dataorder[date_format($data[$i],"d/m/Y")][$phong->id]['SA'])){
                            $vals = $dataorder[date_format($data[$i],"d/m/Y")][$phong->id]['SA'];
                            /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236@var \common\models\Order $vals */
                            echo '<a class="btn" style="width:100%;color:white; background-color:#'.$dataorder[date_format($data[$i],"d/m/Y")][$phong->id]['SAC'].'" href="'.Yii::$app->urlManager->createUrl(['order/view','id'=>$vals->id]).'" title="'.$vals->ten.'" data-pjax="0" role="modal-remote" data-toggle="tooltip"><span class="">#'.$vals->id.": ".$vals->ten.'<br>'.$vals->timebatdau.' - '.$vals->timeketthuc.'</span>'.(($vals->status==0)?"<br><span class='label label-danger'style='margin-top: 5px'>Chưa đặt cọc</span>":"").'</a>';

                        }
                        ?></td>
                <?php endfor;?>
            </tr>
            <tr>
                <td class="ch">Chiều</td>
                <?php for ($i=0;$i<7;$i++):?>
                    <td class="ch"><?php
                        if(isset($dataorder[date_format($data[$i],"d/m/Y")][$phong->id]["SA"])){
                            $vals = $dataorder[date_format($data[$i],"d/m/Y")][$phong->id]["SA"];
                            /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236@var \common\models\Order $vals */
                            if(explode(" ",$vals->timeketthuc)[1]=="PM"&&explode(" ",$vals->timeketthuc)[0]!="12:00")
                                echo '<a class="btn" style="width:100%;color:white; background-color:#'.$dataorder[date_format($data[$i],"d/m/Y")][$phong->id]['SAC'].'" href="'.Yii::$app->urlManager->createUrl(['order/view','id'=>$vals->id]).'" title="'.$vals->ten.'" data-pjax="0" role="modal-remote" data-toggle="tooltip"><span class="">#'.$vals->id.": ".$vals->ten.'<br>'.$vals->timebatdau.' - '.$vals->timeketthuc.'</span>'.(($vals->status==0)?"<br><span class='label label-danger'style='margin-top: 5px'>Chưa đặt cọc</span>":"").'</a>';

                        }
                        if(isset($dataorder[date_format($data[$i],"d/m/Y")][$phong->id]["CH"])){
                            $vals = $dataorder[date_format($data[$i],"d/m/Y")][$phong->id]["CH"];
                            /** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236@var \common\models\Order $vals */

                            echo '<a class="btn red" style="width:100%;color:white; background-color:#'.$dataorder[date_format($data[$i],"d/m/Y")][$phong->id]['CHC'].'" href="'.Yii::$app->urlManager->createUrl(['order/view','id'=>$vals->id]).'" title="'.$vals->ten.'" data-pjax="0" role="modal-remote" data-toggle="tooltip"><span class="">#'.$vals->id.": ".$vals->ten.'<br>'.$vals->timebatdau.' - '.$vals->timeketthuc.'</span>'.(($vals->status==0)?"<br><span class='label label-danger'style='margin-top: 5px'>Chưa đặt cọc</span>":"").'</a>';

                        }
                        ?></td>
                <?php endfor;?>
            </tr>
        <?php endforeach;?>
    </table>
</div>
