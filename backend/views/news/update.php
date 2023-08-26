<?php
/**
 * Created by PhpStorm.
 * User: anlai
 * Date: 22-Apr-17
 * Time: 3:06 PM
 */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use johnitvn\ajaxcrud\CrudAsset;
CrudAsset::register($this);
$this->title = 'Sửa bài viết';
$this->params['breadcrumbs'][] = ['name' => 'Tin tức', 'link' => Yii::$app->urlManager->createUrl('news')];
$this->params['breadcrumbs'][] = ['name' => 'Sửa bài viết '.$model->title, 'link' => 'javascript:void(0)'];
?>
<?php echo Html::beginForm(['news/updatenews'], 'post',['enctype' => 'multipart/form-data']); ?>
<div class="news-index newpost">
    <div class="col-md-9 col-xs-12">
        <?php echo Html::textInput('id',$model->id,['class'=>'hidden'])?>
        <div class="form-group">
            <?php echo Html::label('<span class="caption-subject font-blue-steel bold uppercase">Tiêu đề tin tức:</span>', '', ['class' => 'form-label']); ?>
            <?php echo Html::textInput('News[title]', $model->title, ['class' => 'form-control','placeholder'=>'Tiêu đề tin tức','required'=>true]) ?>
        </div>

        <div class="form-group">
            <?php echo Html::label('<span class="caption-subject font-blue-steel bold uppercase">Tóm tắt</span>','',['class'=>'form-label'])?>
            <textarea name="News[brief]" id="brief" rows="10" maxlength="250" cols="80" class="form-control"><?php echo $model->brief?></textarea>
        </div>
        <div class="form-group">
            <?php echo Html::label('<span class="caption-subject font-blue-steel bold uppercase">Nội dung bài viết</span>','',['class'=>'form-label'])?>
            <textarea name="News[content]" id="noidung" rows="10" cols="80" ><?php echo $model->content?></textarea>
        </div>
        <div class="form-group">
            <?php echo Html::label('<span class="caption-subject font-blue-steel bold uppercase">Tiêu đề SEO</span>','',['class'=>'form-label'])?>
            <textarea name="News[seo_title]" class="form-control"><?php echo $model->seo_title?></textarea>
        </div>
        <div class="form-group">
            <?php echo Html::label('<span class="caption-subject font-blue-steel bold uppercase">Mô tả SEO</span>','',['class'=>'form-label'])?>
            <textarea name="News[seo_desc]" class="form-control"><?php echo $model->seo_desc?></textarea>
        </div>
        <div class="form-group">
            <?php echo Html::label('<span class="caption-subject font-blue-steel bold uppercase">Từ khóa SEO</span>','',['class'=>'form-label'])?>
            <textarea name="News[seo_keyword]" class="form-control"><?php echo $model->seo_keyword?></textarea>
        </div>
    </div>
    <div class=" col-md-3 col-sm-12 col-xs-12">
        <div class=" form-group">
            <?php echo Html::label('<span class="caption-subject font-blue-steel bold uppercase">Chuyên mục:</span>','',['class'=>'form-label']);?>
            <?php echo Html::dropDownList('News[cat_new_id]',$model->cat_new_id,ArrayHelper::map(\common\models\Catnew::getAllCat(''),'id','name'),['class'=>'form-control','required'=>true])?>
        </div>
        <div class=" form-group">
            <?php echo Html::label('<span class="caption-subject font-blue-steel bold uppercase">Hình ảnh đại diện của tin tức:</span>','',['class'=>'form-label'])?>
            <?php echo Html::fileInput('fileupload','',['class'=>'form-control','onChange'=>"uploadImage(this)",
                'data-target'=>"#aImgShow",
            ]);?>
            <div id="img-view">
                <img id="aImgShow" src="<?php echo Yii::$app->urlManagerFrontend->baseUrl.$model->image?>" style="width: 150px; margin-top:20px"/>
            </div>
        </div>

        <div class="form-group">
            <?php echo Html::label('<span class="caption-subject font-blue-steel bold uppercase">Nổi bật:</span>','',['class'=>'form-label']);?>
            <?php echo Html::dropDownList('News[hot]',$model->hot,ArrayHelper::map([
                ['id'=>0,'ten'=>'Không'],
                ['id'=>1,'ten'=>'Có'],
            ],'id','ten'),['class'=>'form-control'])?>
        </div>
        <div class="form-group">
            <?php echo Html::label('<span class="caption-subject font-blue-steel bold uppercase">Hiển thị:</span>','',['class'=>'form-label']);?>
            <?php echo Html::dropDownList('News[active]',$model->active,ArrayHelper::map([
                ['id'=>0,'ten'=>'Không'],
                ['id'=>1,'ten'=>'Có'],
            ],'id','ten'),['class'=>'form-control'])?>
        </div>
        <div class="form-group">
            <?php echo Html::label('<span class="caption-subject font-blue-steel bold uppercase">Hiển thị trang chủ:</span>','',['class'=>'form-label']);?>
            <?php echo Html::dropDownList('News[home]',$model->home,ArrayHelper::map([
                ['id'=>0,'ten'=>'Không'],
                ['id'=>1,'ten'=>'Có'],
            ],'id','ten'),['class'=>'form-control'])?>
        </div>
        <div class="form-group">
            <?php echo Html::label('<span class="caption-subject font-blue-steel bold uppercase">Lượt xem:</span>','',['class'=>'form-label']);?>
            <?php echo Html::numberInput('News[luotxem]',$model->luotxem,['min'=>0,'class'=>'form-control'])?>
        </div>
        <div class="form-group">
            <?php echo Html::label('<span class="caption-subject font-blue-steel bold uppercase">Thẻ: </span>','',['class'=>'form-label'])?>
            <?php echo Html::textInput('News[tags]',$model->tags,['class'=>"form-control tags medium",'id'=>'tag']);?>
        </div>
        <div class="form-group">
            <?php echo Html::submitButton('Lưu lại',['class'=>'btn blue btn-submit-tintuc','style'=>'float:right;'])?>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="clearfix"></div>


<div class="clearfix"></div>
<?php echo Html::endForm(); ?>
<script>
    $(document).ready(function () {
        $('#tag').tagsInput({
            width: '100%',
            'onAddTag': function () {
                //alert(1);
            }
        });

        CKEDITOR.replace('noidung',{
            language: 'vi'
        });

    })

</script>