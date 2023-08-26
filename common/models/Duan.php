<?php

namespace common\models;

use Composer\Downloader\PearPackageExtractor;
use Yii;

/**
 * This is the model class for table "duan".
 *
 * @property int $id
 * @property string $ten
 * @property string $mota
 * @property string $deadline
 * @property int $tongdientich
 * @property string $ngaybatdau
 * @property int $nguoitao
 * @property string $nguoiphutrach
 * @property string $truongphongphutrach
 * @property string $nguoinhanviec
 * @property string $nguoinhanviecchitiet
 * @property int $loaiduan_id
 * @property int $status
 * @property int $taichinh
 * @property string $congvan
 *
 * @property Loaiduan $loaiduan
 * @property Congviec[] $congviecs
 */
class Duan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public static $statuslist =[
        0=>'Đang thực hiện',
        1=>'Đã hoàn thành',
        2=>'Đang tạm dừng',
        3=>'Đã hủy',
        4=>'Chưa triển khai'
    ];
    public static function tableName()
    {
        return 'duan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ten','ngaybatdau'], 'required'],
            [['ten','nguoiphutrach', 'mota','deadline','ngaybatdau','nguoinhanviec','nguoinhanviecchitiet','congvan','truongphongphutrach'], 'string'],
            [['nguoitao', 'loaiduan_id','status','tongdientich','taichinh'], 'integer'],
            [['loaiduan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Loaiduan::className(), 'targetAttribute' => ['loaiduan_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten' => 'Tên Công việc',
            'mota' => 'Thông tin',
            'nguoitao' => 'Người quản lý',
            'nguoiphutrach' => 'Người phụ trách Công việc',
            'truongphongphutrach' => 'Phòng ban phụ trách',
            'loaiduan_id' => 'Loại Công việc',
            'deadline' => 'Thời gian kết thúc',
            'ngaybatdau' => 'Thời gian bắt đầu',
            'tongdientich' => 'Việc quan trọng',
            'status' => 'Trạng thái',
            'congvan' => 'Công văn',
            'taichinh'=>'Quản lý tài chính'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCongviecs()
    {
        return $this->hasMany(Congviec::className(), ['duan_id' => 'id']);
    }
    public function getLoaiduan()
    {
        return $this->hasOne(Loaiduan::className(), ['id' => 'loaiduan_id']);
    }

    public static function getAllDuAnGranted(){
        $adminGranted = Admin::getAllUserManagedByCurrentUser();

        $return = [];

        $duan = Duan::find()->where(["IN",'nguoitao',$adminGranted])
            ->orWhere(['like','nguoiphutrach','"'.Yii::$app->user->identity->id.'"'])
            ->orWhere(['like','nguoinhanviec','"'.Yii::$app->user->identity->id.'"'])
            ->orWhere(['like','nguoinhanviecchitiet','"'.Yii::$app->user->identity->id.'"'])
            ->all();

        foreach ($duan as $value){
            $return[]=$value->id;
        }

        return $return;
    }
    public static function getAllJoinedDuAn(){

        $listr = [];
        $listcongviecphoihop = Nguoiphoihop::find()->where(['nguoiduocgan'=>Yii::$app->user->id])->all();
        foreach ($listcongviecphoihop as $value){
            $listr[]=$value->congviecid;
        }

        $joinedGranted = Congviec::find()->where(['IN','id',$listr])->distinct("duan_id")->all();

        $return = [];
        foreach ($joinedGranted as $value){
            $return[]=$value->duan_id;
        }

        return $return;
    }
    public function checkIsDuAnGranted(){
        return in_array($this->id,self::getAllDuAnGranted())||in_array($this->id,self::getAllJoinedDuAn());
    }
    public function getDateRemaining(){
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $date = date_create_from_format("Y-m-d",$this->deadline);
        if($date){
            $s=($date)->diff(date_create_from_format("Y-m-d",date("Y-m-d")))->format("%r%a");
            return (int)$s;
        }
        return 0;
    }
    public function checkExpire(){
        return $this->getDateRemaining()<=0;
    }
    public function getStatusTextNoFormat(){
        $statuslist =[
            0=>'Đang thực hiện',
            1=>'Đã hoàn thành',
            2=>'Đang tạm dừng',
            3=>'Đã hủy',
            4=>'Chưa triển khai'
        ];
        $statuslistTextClass =[
            0=>'label label-primary',
            1=>'label label-success',
            2=>'label label-warning',
            3=>'label label-danger',
            4=>'Chưa triển khai'
        ];
        return $statuslist[$this->status];
    }
    public function getStatusText(){
        $statuslist =[
            0=>'Đang thực hiện',
            1=>'Đã hoàn thành',
            2=>'Đang tạm dừng',
            3=>'Đã hủy',
            4=>'Chưa triển khai'
        ];
        $statuslistTextClass =[
            0=>'label label-primary',
            1=>'label label-success',
            2=>'label label-warning',
            3=>'label label-danger',
            4=>'Chưa triển khai'
        ];
        return "<span data-type='select' data-pk='".$this->id."' data-value='".$this->status."' data-original-title='Update' data-source='/admin/site/groups' class='editable editable-click ".$statuslistTextClass[$this->status]."'>".$statuslist[$this->status]."</span>";
    }
    public function getTienDo(){
        return Congviec::find()->where(['duan_id'=>$this->id])->andWhere(['status'=>1])->count();
    }
    public function getTienDoText(){
        $tiendo = $this->getTienDo();
        $tong=\common\models\Congviec::find()->where(['duan_id'=>$this->id])->andWhere(['<>','status',3])->count();
        return "<span style='color: ".($tiendo==$tong?"green":"red")."'>".$tiendo."</span>/<span style='color: green'>".$tong."</span>";
    }
}
