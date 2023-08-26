<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\DulieuhososuckhoeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dulieuhososuckhoe-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'mahogiadinh') ?>

    <?= $form->field($model, 'hovaten') ?>

    <?= $form->field($model, 'quanhevoichuho') ?>

    <?= $form->field($model, 'gioitinh') ?>

    <?php // echo $form->field($model, 'nhommauheabo') ?>

    <?php // echo $form->field($model, 'nhommauherh') ?>

    <?php // echo $form->field($model, 'ngaysinh') ?>

    <?php // echo $form->field($model, 'tinhtpdangkykhaisinh') ?>

    <?php // echo $form->field($model, 'dantoc') ?>

    <?php // echo $form->field($model, 'quoctich') ?>

    <?php // echo $form->field($model, 'tongiao') ?>

    <?php // echo $form->field($model, 'nghenghiep') ?>

    <?php // echo $form->field($model, 'socmnd') ?>

    <?php // echo $form->field($model, 'ngaycap') ?>

    <?php // echo $form->field($model, 'noicap') ?>

    <?php // echo $form->field($model, 'madinhdanhbhytsothe') ?>

    <?php // echo $form->field($model, 'noidangkyhktt') ?>

    <?php // echo $form->field($model, 'xaphuonghktt') ?>

    <?php // echo $form->field($model, 'quanhuyenhktt') ?>

    <?php // echo $form->field($model, 'tinhthanhphohktt') ?>

    <?php // echo $form->field($model, 'noiohientai') ?>

    <?php // echo $form->field($model, 'xaphuongnoht') ?>

    <?php // echo $form->field($model, 'quanhuyennoht') ?>

    <?php // echo $form->field($model, 'tinhthanhphonoht') ?>

    <?php // echo $form->field($model, 'dienthoaicodinh') ?>

    <?php // echo $form->field($model, 'dienthoaididong') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'hotenme') ?>

    <?php // echo $form->field($model, 'hotenbo') ?>

    <?php // echo $form->field($model, 'hotenngcsc') ?>

    <?php // echo $form->field($model, 'moiquanhengcsc') ?>

    <?php // echo $form->field($model, 'dienthoaingcsc') ?>

    <?php // echo $form->field($model, 'didongngcsc') ?>

    <?php // echo $form->field($model, 'tinhtranglucsinh')->checkbox() ?>

    <?php // echo $form->field($model, 'dethieuthang')->checkbox() ?>

    <?php // echo $form->field($model, 'bingatlucde')->checkbox() ?>

    <?php // echo $form->field($model, 'cannanglucde') ?>

    <?php // echo $form->field($model, 'chieudailucde') ?>

    <?php // echo $form->field($model, 'ditatbamsinh') ?>

    <?php // echo $form->field($model, 'vandekhaclucsinh') ?>

    <?php // echo $form->field($model, 'hutthuocla') ?>

    <?php // echo $form->field($model, 'uongruoubia') ?>

    <?php // echo $form->field($model, 'solicocuongtrenngay') ?>

    <?php // echo $form->field($model, 'sudungmatuy') ?>

    <?php // echo $form->field($model, 'hoatdongtheluc') ?>

    <?php // echo $form->field($model, 'yeutotiepxuc') ?>

    <?php // echo $form->field($model, 'thoigiantiepxuc') ?>

    <?php // echo $form->field($model, 'loaihoxi') ?>

    <?php // echo $form->field($model, 'nguycokhac') ?>

    <?php // echo $form->field($model, 'diungthuoc') ?>

    <?php // echo $form->field($model, 'diunghoachatmypham') ?>

    <?php // echo $form->field($model, 'diungthucpham') ?>

    <?php // echo $form->field($model, 'diungkhac') ?>

    <?php // echo $form->field($model, 'benhtimmach')->checkbox() ?>

    <?php // echo $form->field($model, 'tanghuyetap')->checkbox() ?>

    <?php // echo $form->field($model, 'daithaoduong')->checkbox() ?>

    <?php // echo $form->field($model, 'benhdaday')->checkbox() ?>

    <?php // echo $form->field($model, 'benhphoimantinh')->checkbox() ?>

    <?php // echo $form->field($model, 'benhhensuyen')->checkbox() ?>

    <?php // echo $form->field($model, 'benhbuouco')->checkbox() ?>

    <?php // echo $form->field($model, 'benhviemgan')->checkbox() ?>

    <?php // echo $form->field($model, 'benhtimbamsinh')->checkbox() ?>

    <?php // echo $form->field($model, 'benhtamthan')->checkbox() ?>

    <?php // echo $form->field($model, 'benhtuky')->checkbox() ?>

    <?php // echo $form->field($model, 'benhdongkinh')->checkbox() ?>

    <?php // echo $form->field($model, 'benhungthu') ?>

    <?php // echo $form->field($model, 'benhlao') ?>

    <?php // echo $form->field($model, 'benhkhac') ?>

    <?php // echo $form->field($model, 'khuyettatthinhluc') ?>

    <?php // echo $form->field($model, 'khuyettatthiluc') ?>

    <?php // echo $form->field($model, 'khuyettattay') ?>

    <?php // echo $form->field($model, 'khuyettatchan') ?>

    <?php // echo $form->field($model, 'khuyettatcongveocotsong') ?>

    <?php // echo $form->field($model, 'khuyettatkhehomoivommieng') ?>

    <?php // echo $form->field($model, 'khuyettatkhac') ?>

    <?php // echo $form->field($model, 'tiensuphauthuat') ?>

    <?php // echo $form->field($model, 'tiensugiadinhdiungthuoc') ?>

    <?php // echo $form->field($model, 'tiensugiadinhdiunghoachatmypham') ?>

    <?php // echo $form->field($model, 'tiensugiadinhdiungthucpham') ?>

    <?php // echo $form->field($model, 'tiensugiadinhdiungkhac') ?>

    <?php // echo $form->field($model, 'tiensugiadinhdiungthuocnguoi') ?>

    <?php // echo $form->field($model, 'tiensugiadinhdiunghoachatnguoi') ?>

    <?php // echo $form->field($model, 'tiensugiadinhdiungthucphamnguoi') ?>

    <?php // echo $form->field($model, 'tiensugiadinhdiungkhacnguoi') ?>

    <?php // echo $form->field($model, 'tiensugiadinhbenhtattimmach')->checkbox() ?>

    <?php // echo $form->field($model, 'tiensugiadinhbenhtattanghuyetap')->checkbox() ?>

    <?php // echo $form->field($model, 'tiensugiadinhbenhtattamthan')->checkbox() ?>

    <?php // echo $form->field($model, 'tiensugiadinhbenhtathensuyen')->checkbox() ?>

    <?php // echo $form->field($model, 'tiensugiadinhbenhtatdaithaoduong')->checkbox() ?>

    <?php // echo $form->field($model, 'tiensugiadinhbenhtatdongkinh')->checkbox() ?>

    <?php // echo $form->field($model, 'tiensugiadinhbenhtattimmachnguoi') ?>

    <?php // echo $form->field($model, 'tiensugiadinhbenhtattanghuyetapnguoi') ?>

    <?php // echo $form->field($model, 'tiensugiadinhbenhtattamthannguoi') ?>

    <?php // echo $form->field($model, 'tiensugiadinhbenhtathensuyennguoi') ?>

    <?php // echo $form->field($model, 'tiensugiadinhbenhtatdaithaoduongnguoi') ?>

    <?php // echo $form->field($model, 'tiensugiadinhbenhtatdongkinhnguoi') ?>

    <?php // echo $form->field($model, 'tiensugiadinhbenhtatungthu') ?>

    <?php // echo $form->field($model, 'tiensugiadinhbenhtatlao') ?>

    <?php // echo $form->field($model, 'tiensugiadinhbenhtatkhac') ?>

    <?php // echo $form->field($model, 'bienphaptranhthai') ?>

    <?php // echo $form->field($model, 'kythaicuoicung') ?>

    <?php // echo $form->field($model, 'solancothai') ?>

    <?php // echo $form->field($model, 'solansaythai') ?>

    <?php // echo $form->field($model, 'solanphathai') ?>

    <?php // echo $form->field($model, 'solansinde') ?>

    <?php // echo $form->field($model, 'solandethuong') ?>

    <?php // echo $form->field($model, 'solandemo') ?>

    <?php // echo $form->field($model, 'solandekho') ?>

    <?php // echo $form->field($model, 'solandeduthang') ?>

    <?php // echo $form->field($model, 'solandenon') ?>

    <?php // echo $form->field($model, 'soconhiensong') ?>

    <?php // echo $form->field($model, 'benhphukhoa') ?>

    <?php // echo $form->field($model, 'vandekhac') ?>

    <?php // echo $form->field($model, 'tiemchungcobantreem') ?>

    <?php // echo $form->field($model, 'sovacxinuonvanmedatiem') ?>

    <?php // echo $form->field($model, 'tiemchungngoaichuongtrinhtcmr') ?>

    <?php // echo $form->field($model, 'tiemchungvxuonvan') ?>

    <?php // echo $form->field($model, 'ngaykhamlamsang') ?>

    <?php // echo $form->field($model, 'benhsu') ?>

    <?php // echo $form->field($model, 'lamsangmach') ?>

    <?php // echo $form->field($model, 'lamsangnhietdo') ?>

    <?php // echo $form->field($model, 'lamsangha') ?>

    <?php // echo $form->field($model, 'lamsangnhiptho') ?>

    <?php // echo $form->field($model, 'lamsangcannang') ?>

    <?php // echo $form->field($model, 'lamsangcao') ?>

    <?php // echo $form->field($model, 'lamsangbmi') ?>

    <?php // echo $form->field($model, 'lamsangvongbung') ?>

    <?php // echo $form->field($model, 'thiluckhongkinhmatphai') ?>

    <?php // echo $form->field($model, 'thiluckhongkinhmattrai') ?>

    <?php // echo $form->field($model, 'thiluccokinhmatphai') ?>

    <?php // echo $form->field($model, 'thiluccokinhmattrai') ?>

    <?php // echo $form->field($model, 'toanthandaniemmac') ?>

    <?php // echo $form->field($model, 'toanthankhac') ?>

    <?php // echo $form->field($model, 'timmach') ?>

    <?php // echo $form->field($model, 'hohap') ?>

    <?php // echo $form->field($model, 'tieuhoa') ?>

    <?php // echo $form->field($model, 'tietnieu') ?>

    <?php // echo $form->field($model, 'coxuongkhop') ?>

    <?php // echo $form->field($model, 'noitiet') ?>

    <?php // echo $form->field($model, 'thankinh') ?>

    <?php // echo $form->field($model, 'tamthan') ?>

    <?php // echo $form->field($model, 'ngoaikhoa') ?>

    <?php // echo $form->field($model, 'sanphukhoa') ?>

    <?php // echo $form->field($model, 'taimuihong') ?>

    <?php // echo $form->field($model, 'ranghammat') ?>

    <?php // echo $form->field($model, 'mat') ?>

    <?php // echo $form->field($model, 'dalieu') ?>

    <?php // echo $form->field($model, 'dinhduong') ?>

    <?php // echo $form->field($model, 'vandong') ?>

    <?php // echo $form->field($model, 'khamkhac') ?>

    <?php // echo $form->field($model, 'danhgiaphattrien') ?>

    <?php // echo $form->field($model, 'xetnghiemhuyethoc') ?>

    <?php // echo $form->field($model, 'xetnghiemsinhhoamau') ?>

    <?php // echo $form->field($model, 'xetnghiemsinhhoanuoctieu') ?>

    <?php // echo $form->field($model, 'xetnghiemsieuamobung') ?>

    <?php // echo $form->field($model, 'chandoanketluan') ?>

    <?php // echo $form->field($model, 'tuvancuabacsi') ?>

    <?php // echo $form->field($model, 'bacsikham') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
