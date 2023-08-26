<?php use yii\widgets\DetailView;?>
<?php /** @var \common\models\Khachhang $model */ ?>
<style>
    #khachhangcontent {
        background: white;
    }
    #khachhangcontent .col-md-6.col-xs-12{
        padding: 15px;
    }
    #khachhangcontent th{
        background: #41679a;
        color: white;
    }
</style>
<div class="kv-detail-content table-responsive" id="khachhangcontent">
    <div class="col-md-6 col-xs-12">
        <p class="caption-subject font-blue-steel bold uppercase">Thông tin người bệnh</p>
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [

                'cmnd',
                'para',
                'namlaychong',
                'chukikinhnguyet:ntext',

            ],
            'options'=>['class'=>'table table-bordered table-hover table-striped']
        ]) ?>
    </div>
    <div class="col-md-6 col-xs-12">
        <p class="caption-subject font-blue-steel bold uppercase">Tiền sử sản khoa</p>
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'sinhthuong:ntext',
                'demo:ntext',
                'conhienco',
                'denon:ntext',
                'thailuu:ntext',
            ],
            'options'=>['class'=>'table table-bordered table-hover table-striped']
        ]) ?>
    </div>
</div>


