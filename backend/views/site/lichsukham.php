<?php

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\KhachhangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $nguoibenh \common\models\Khachhang */
use johnitvn\ajaxcrud\CrudAsset;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\BulkButtonWidget;

CrudAsset::register($this);
$this->title = 'Lịch sử khám bệnh';
date_default_timezone_set("Asia/Ho_Chi_Minh");
$now = date_format(date_create(), 'd/m/Y');

?>
<style>
    .fc-time{display: none}
    .fc-content{
        padding: 10px;
        overflow: auto;
    }
    .fc-title{
        white-space: pre-wrap!important;

    }
</style><!--  -->
<a class="btn btn-success" id="inso" ten="<?=mb_strtoupper($nguoibenh->ten,'utf-8')?>">In sổ khám bệnh</a>
<div class="hidden" id="divinsokhambenh">

    <div class="page-break" style="margin: 50px">
        <table class="table" id="tablenguoibenh">
            <tr>
                <th>Họ và tên</th>
                <td>: <?=$nguoibenh->ten?></td>
            </tr>
            <tr>
                <th>SDT</th>
                <td>: <?=$nguoibenh->sdt?></td>
            </tr>
            <tr>
                <th>Ngày sinh</th>
                <td>: <?=$nguoibenh->ngaysinh?></td>
            </tr>
            <tr>
                <th>Địa chỉ</th>
                <td>: <?=$nguoibenh->diachi?></td>
            </tr>
        </table>
    </div>
    <?php foreach ($lichsukham as $valuelichsu):/** @var $valuelichsu \common\models\Lichsukhambenh */?>
    <div class="page-break">
        <table class="table table-bordered table-hover table-striped">
            <tr>
                <th>Ngày khám</th>
                <th>Nội dung</th>
            </tr>
            <tr>
                <td><?=$valuelichsu->ngaykham?></td>
                <td>
                    <?php foreach ($valuelichsu->phieusieuams as $valuephieu):?>
                        - <?= $valuephieu->loaiphieusieuam->tenloaiphieu?>
                    <?php endforeach;?>
                    <p><?=$valuelichsu->ketquachandoan?></p>
                </td>
            </tr>
        </table>
    </div>
    <?php endforeach;?>
</div>
<div id="calendar">

</div>
<script>
    $(document).ready(function () {
        var Calendar = function() {


            return {
                //main function to initiate the module
                init: function() {
                    Calendar.initCalendar();
                },

                initCalendar: function() {

                    if (!jQuery().fullCalendar) {
                        return;
                    }

                    var date = new Date();
                    var d = date.getDate();
                    var m = date.getMonth();
                    var y = date.getFullYear();

                    var h = {};

                    if (Metronic.isRTL()) {
                        if ($('#calendar').parents(".portlet").width() <= 720) {
                            $('#calendar').addClass("mobile");
                            h = {
                                right: 'title, prev, next',
                                center: '',
                                left: 'agendaDay, agendaWeek, month, today'
                            };
                        } else {
                            $('#calendar').removeClass("mobile");
                            h = {
                                right: 'title',
                                center: '',
                                left: 'agendaDay, agendaWeek, month, today, prev,next'
                            };
                        }
                    } else {
                        if ($('#calendar').parents(".portlet").width() <= 720) {
                            $('#calendar').addClass("mobile");
                            h = {
                                left: 'title, prev, next',
                                center: '',
                                right: 'today,month,agendaWeek,agendaDay'
                            };
                        } else {
                            $('#calendar').removeClass("mobile");
                            h = {
                                left: 'title',
                                center: '',
                                right: 'prev,next,today,month,agendaWeek,agendaDay'
                            };
                        }
                    }

                    var initDrag = function(el) {
                        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                        // it doesn't need to have a start or end
                        var eventObject = {
                            title: $.trim(el.text()) // use the element's text as the event title
                        };
                        // store the Event Object in the DOM element so we can get to it later
                        el.data('eventObject', eventObject);
                        // make the event draggable using jQuery UI
                        el.draggable({
                            zIndex: 999,
                            revert: true, // will cause the event to go back to its
                            revertDuration: 0 //  original position after the drag
                        });
                    };



                    //predefined events

                    $('#calendar').fullCalendar({ //re-initialize the calendar
                        header: h,
                        defaultView: 'month', // change default view with available options from http://arshaw.com/fullcalendar/docs/views/Available_Views/
                        slotMinutes: 15,
                        editable: true,
                        eventRender: function(event, element) {
                            // Add a class to the event element

                            element.attr("target","_blank");
                            element.attr("role","modal-remote");
                            element.attr("data-pjax","0");
                            element.attr("data-toggle","tooltip");
                        },

                        droppable: true, // this allows things to be dropped onto the calendar !!!
                        drop: function(date, allDay) { // this function is called when something is dropped

                            // retrieve the dropped element's stored Event Object
                            var originalEventObject = $(this).data('eventObject');
                            // we need to copy it, so that multiple events don't have a reference to the same object
                            var copiedEventObject = $.extend({}, originalEventObject);

                            // assign it the date that was reported
                            copiedEventObject.start = date;
                            copiedEventObject.allDay = allDay;
                            copiedEventObject.className = $(this).attr("data-class");

                            // render the event on the calendar
                            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

                            // is the "remove after drop" checkbox checked?
                            if ($('#drop-remove').is(':checked')) {
                                // if so, remove the element from the "Draggable Events" list
                                $(this).remove();
                            }
                        },
                        events: [
                            <?php foreach ($lichsukham as $value):/** @var $value \common\models\Lichsukhambenh */?>
                            <?php
                            $timekham = explode(" ",$value->ngaykham);
                            $ngaykham = explode("/",$timekham[1]);
                            $kham = "";
                            foreach (\common\models\Phieusieuam::find()->where(['lichsukhambenh_id'=>$value->id])->all() as $phieusieuam){
                                /** @var $phieusieuam \common\models\Phieusieuam */
                                $kham.=$phieusieuam->loaiphieusieuam->tenloaiphieu.", ";
                            }
                            ?>
                            {
                                title: '<?=$timekham[0]?> Khám: <?=$kham?>',
                                start: new Date(<?=$ngaykham[2]?>, <?=((int)$ngaykham[1]-1)?>, <?=$ngaykham[0]?>),

                                backgroundColor: "#<?=strtoupper(func::random_color())?>",
                                url:"<?=Yii::$app->urlManager->createUrl(['lichsukhambenh/view','id'=>$value->id])?>"
                            },
                            <?php endforeach;?>
                        ]
                    });

                }

            };

        }();
        Calendar.init();
    })
</script>
<?php Modal::begin([
    "id" => "ajaxCrudModal",
    "size" => "modal-full",
    "footer" => "",// always need it for jquery plugin
    'options' => ["data-backdrop" => "static", "data-keyboard" => "false", 'tabindex' => false],


]) ?>
<style>
    span.select2-container {
        z-index: 10050;
    }

</style>
<?php Modal::end(); ?>
