<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Dulieuhososuckhoe;

/**
 * DulieuhososuckhoeSearch represents the model behind the search form about `\common\models\Dulieuhososuckhoe`.
 */
class DulieuhososuckhoeSearch extends Dulieuhososuckhoe
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cannanglucde', 'chieudailucde', 'solicocuongtrenngay', 'solancothai', 'solansaythai', 'solanphathai', 'solansinde', 'solandethuong', 'solandemo', 'solandekho', 'solandeduthang', 'solandenon', 'soconhiensong', 'sovacxinuonvanmedatiem'], 'integer'],
            [['mahogiadinh', 'hovaten', 'quanhevoichuho', 'gioitinh', 'nhommauheabo', 'nhommauherh', 'ngaysinh', 'tinhtpdangkykhaisinh', 'dantoc', 'quoctich', 'tongiao', 'nghenghiep', 'socmnd', 'ngaycap', 'noicap', 'madinhdanhbhytsothe', 'noidangkyhktt', 'xaphuonghktt', 'quanhuyenhktt', 'tinhthanhphohktt', 'noiohientai', 'xaphuongnoht', 'quanhuyennoht', 'tinhthanhphonoht', 'dienthoaicodinh', 'dienthoaididong', 'email', 'hotenme', 'hotenbo', 'hotenngcsc', 'moiquanhengcsc', 'dienthoaingcsc', 'didongngcsc', 'ditatbamsinh', 'vandekhaclucsinh', 'hutthuocla', 'uongruoubia', 'sudungmatuy', 'hoatdongtheluc', 'yeutotiepxuc', 'thoigiantiepxuc', 'loaihoxi', 'nguycokhac', 'diungthuoc', 'diunghoachatmypham', 'diungthucpham', 'diungkhac', 'benhungthu', 'benhlao', 'benhkhac', 'khuyettatthinhluc', 'khuyettatthiluc', 'khuyettattay', 'khuyettatchan', 'khuyettatcongveocotsong', 'khuyettatkhehomoivommieng', 'khuyettatkhac', 'tiensuphauthuat', 'tiensugiadinhdiungthuoc', 'tiensugiadinhdiunghoachatmypham', 'tiensugiadinhdiungthucpham', 'tiensugiadinhdiungkhac', 'tiensugiadinhdiungthuocnguoi', 'tiensugiadinhdiunghoachatnguoi', 'tiensugiadinhdiungthucphamnguoi', 'tiensugiadinhdiungkhacnguoi', 'tiensugiadinhbenhtattimmachnguoi', 'tiensugiadinhbenhtattanghuyetapnguoi', 'tiensugiadinhbenhtattamthannguoi', 'tiensugiadinhbenhtathensuyennguoi', 'tiensugiadinhbenhtatdaithaoduongnguoi', 'tiensugiadinhbenhtatdongkinhnguoi', 'tiensugiadinhbenhtatungthu', 'tiensugiadinhbenhtatlao', 'tiensugiadinhbenhtatkhac', 'bienphaptranhthai', 'kythaicuoicung', 'benhphukhoa', 'vandekhac', 'tiemchungcobantreem', 'tiemchungngoaichuongtrinhtcmr', 'tiemchungvxuonvan', 'ngaykhamlamsang', 'benhsu', 'toanthandaniemmac', 'toanthankhac', 'timmach', 'hohap', 'tieuhoa', 'tietnieu', 'coxuongkhop', 'noitiet', 'thankinh', 'tamthan', 'ngoaikhoa', 'sanphukhoa', 'taimuihong', 'ranghammat', 'mat', 'dalieu', 'dinhduong', 'vandong', 'khamkhac', 'danhgiaphattrien', 'xetnghiemhuyethoc', 'xetnghiemsinhhoamau', 'xetnghiemsinhhoanuoctieu', 'xetnghiemsieuamobung', 'chandoanketluan', 'tuvancuabacsi', 'bacsikham'], 'safe'],
            [['tinhtranglucsinh', 'dethieuthang', 'bingatlucde', 'benhtimmach', 'tanghuyetap', 'daithaoduong', 'benhdaday', 'benhphoimantinh', 'benhhensuyen', 'benhbuouco', 'benhviemgan', 'benhtimbamsinh', 'benhtamthan', 'benhtuky', 'benhdongkinh', 'tiensugiadinhbenhtattimmach', 'tiensugiadinhbenhtattanghuyetap', 'tiensugiadinhbenhtattamthan', 'tiensugiadinhbenhtathensuyen', 'tiensugiadinhbenhtatdaithaoduong', 'tiensugiadinhbenhtatdongkinh'], 'boolean'],
            [['lamsangmach', 'lamsangnhietdo', 'lamsangha', 'lamsangnhiptho', 'lamsangcannang', 'lamsangcao', 'lamsangbmi', 'lamsangvongbung', 'thiluckhongkinhmatphai', 'thiluckhongkinhmattrai', 'thiluccokinhmatphai', 'thiluccokinhmattrai'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Dulieuhososuckhoe::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->andWhere('id<>1');
        $query->andFilterWhere([
            'id' => $this->id,
            'tinhtranglucsinh' => $this->tinhtranglucsinh,
            'dethieuthang' => $this->dethieuthang,
            'bingatlucde' => $this->bingatlucde,
            'cannanglucde' => $this->cannanglucde,
            'chieudailucde' => $this->chieudailucde,
            'solicocuongtrenngay' => $this->solicocuongtrenngay,
            'benhtimmach' => $this->benhtimmach,
            'tanghuyetap' => $this->tanghuyetap,
            'daithaoduong' => $this->daithaoduong,
            'benhdaday' => $this->benhdaday,
            'benhphoimantinh' => $this->benhphoimantinh,
            'benhhensuyen' => $this->benhhensuyen,
            'benhbuouco' => $this->benhbuouco,
            'benhviemgan' => $this->benhviemgan,
            'benhtimbamsinh' => $this->benhtimbamsinh,
            'benhtamthan' => $this->benhtamthan,
            'benhtuky' => $this->benhtuky,
            'benhdongkinh' => $this->benhdongkinh,
            'tiensugiadinhbenhtattimmach' => $this->tiensugiadinhbenhtattimmach,
            'tiensugiadinhbenhtattanghuyetap' => $this->tiensugiadinhbenhtattanghuyetap,
            'tiensugiadinhbenhtattamthan' => $this->tiensugiadinhbenhtattamthan,
            'tiensugiadinhbenhtathensuyen' => $this->tiensugiadinhbenhtathensuyen,
            'tiensugiadinhbenhtatdaithaoduong' => $this->tiensugiadinhbenhtatdaithaoduong,
            'tiensugiadinhbenhtatdongkinh' => $this->tiensugiadinhbenhtatdongkinh,
            'solancothai' => $this->solancothai,
            'solansaythai' => $this->solansaythai,
            'solanphathai' => $this->solanphathai,
            'solansinde' => $this->solansinde,
            'solandethuong' => $this->solandethuong,
            'solandemo' => $this->solandemo,
            'solandekho' => $this->solandekho,
            'solandeduthang' => $this->solandeduthang,
            'solandenon' => $this->solandenon,
            'soconhiensong' => $this->soconhiensong,
            'sovacxinuonvanmedatiem' => $this->sovacxinuonvanmedatiem,
            'lamsangmach' => $this->lamsangmach,
            'lamsangnhietdo' => $this->lamsangnhietdo,
            'lamsangha' => $this->lamsangha,
            'lamsangnhiptho' => $this->lamsangnhiptho,
            'lamsangcannang' => $this->lamsangcannang,
            'lamsangcao' => $this->lamsangcao,
            'lamsangbmi' => $this->lamsangbmi,
            'lamsangvongbung' => $this->lamsangvongbung,
            'thiluckhongkinhmatphai' => $this->thiluckhongkinhmatphai,
            'thiluckhongkinhmattrai' => $this->thiluckhongkinhmattrai,
            'thiluccokinhmatphai' => $this->thiluccokinhmatphai,
            'thiluccokinhmattrai' => $this->thiluccokinhmattrai,
        ]);

        $query->andFilterWhere(['like', 'mahogiadinh', $this->mahogiadinh])
            ->andFilterWhere(['like', 'hovaten', $this->hovaten])
            ->andFilterWhere(['like', 'quanhevoichuho', $this->quanhevoichuho])
            ->andFilterWhere(['like', 'gioitinh', $this->gioitinh])
            ->andFilterWhere(['like', 'nhommauheabo', $this->nhommauheabo])
            ->andFilterWhere(['like', 'nhommauherh', $this->nhommauherh])
            ->andFilterWhere(['like', 'ngaysinh', $this->ngaysinh])
            ->andFilterWhere(['like', 'tinhtpdangkykhaisinh', $this->tinhtpdangkykhaisinh])
            ->andFilterWhere(['like', 'dantoc', $this->dantoc])
            ->andFilterWhere(['like', 'quoctich', $this->quoctich])
            ->andFilterWhere(['like', 'tongiao', $this->tongiao])
            ->andFilterWhere(['like', 'nghenghiep', $this->nghenghiep])
            ->andFilterWhere(['like', 'socmnd', $this->socmnd])
            ->andFilterWhere(['like', 'ngaycap', $this->ngaycap])
            ->andFilterWhere(['like', 'noicap', $this->noicap])
            ->andFilterWhere(['like', 'madinhdanhbhytsothe', $this->madinhdanhbhytsothe])
            ->andFilterWhere(['like', 'noidangkyhktt', $this->noidangkyhktt])
            ->andFilterWhere(['like', 'xaphuonghktt', $this->xaphuonghktt])
            ->andFilterWhere(['like', 'quanhuyenhktt', $this->quanhuyenhktt])
            ->andFilterWhere(['like', 'tinhthanhphohktt', $this->tinhthanhphohktt])
            ->andFilterWhere(['like', 'noiohientai', $this->noiohientai])
            ->andFilterWhere(['like', 'xaphuongnoht', $this->xaphuongnoht])
            ->andFilterWhere(['like', 'quanhuyennoht', $this->quanhuyennoht])
            ->andFilterWhere(['like', 'tinhthanhphonoht', $this->tinhthanhphonoht])
            ->andFilterWhere(['like', 'dienthoaicodinh', $this->dienthoaicodinh])
            ->andFilterWhere(['like', 'dienthoaididong', $this->dienthoaididong])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'hotenme', $this->hotenme])
            ->andFilterWhere(['like', 'hotenbo', $this->hotenbo])
            ->andFilterWhere(['like', 'hotenngcsc', $this->hotenngcsc])
            ->andFilterWhere(['like', 'moiquanhengcsc', $this->moiquanhengcsc])
            ->andFilterWhere(['like', 'dienthoaingcsc', $this->dienthoaingcsc])
            ->andFilterWhere(['like', 'didongngcsc', $this->didongngcsc])
            ->andFilterWhere(['like', 'ditatbamsinh', $this->ditatbamsinh])
            ->andFilterWhere(['like', 'vandekhaclucsinh', $this->vandekhaclucsinh])
            ->andFilterWhere(['like', 'hutthuocla', $this->hutthuocla])
            ->andFilterWhere(['like', 'uongruoubia', $this->uongruoubia])
            ->andFilterWhere(['like', 'sudungmatuy', $this->sudungmatuy])
            ->andFilterWhere(['like', 'hoatdongtheluc', $this->hoatdongtheluc])
            ->andFilterWhere(['like', 'yeutotiepxuc', $this->yeutotiepxuc])
            ->andFilterWhere(['like', 'thoigiantiepxuc', $this->thoigiantiepxuc])
            ->andFilterWhere(['like', 'loaihoxi', $this->loaihoxi])
            ->andFilterWhere(['like', 'nguycokhac', $this->nguycokhac])
            ->andFilterWhere(['like', 'diungthuoc', $this->diungthuoc])
            ->andFilterWhere(['like', 'diunghoachatmypham', $this->diunghoachatmypham])
            ->andFilterWhere(['like', 'diungthucpham', $this->diungthucpham])
            ->andFilterWhere(['like', 'diungkhac', $this->diungkhac])
            ->andFilterWhere(['like', 'benhungthu', $this->benhungthu])
            ->andFilterWhere(['like', 'benhlao', $this->benhlao])
            ->andFilterWhere(['like', 'benhkhac', $this->benhkhac])
            ->andFilterWhere(['like', 'khuyettatthinhluc', $this->khuyettatthinhluc])
            ->andFilterWhere(['like', 'khuyettatthiluc', $this->khuyettatthiluc])
            ->andFilterWhere(['like', 'khuyettattay', $this->khuyettattay])
            ->andFilterWhere(['like', 'khuyettatchan', $this->khuyettatchan])
            ->andFilterWhere(['like', 'khuyettatcongveocotsong', $this->khuyettatcongveocotsong])
            ->andFilterWhere(['like', 'khuyettatkhehomoivommieng', $this->khuyettatkhehomoivommieng])
            ->andFilterWhere(['like', 'khuyettatkhac', $this->khuyettatkhac])
            ->andFilterWhere(['like', 'tiensuphauthuat', $this->tiensuphauthuat])
            ->andFilterWhere(['like', 'tiensugiadinhdiungthuoc', $this->tiensugiadinhdiungthuoc])
            ->andFilterWhere(['like', 'tiensugiadinhdiunghoachatmypham', $this->tiensugiadinhdiunghoachatmypham])
            ->andFilterWhere(['like', 'tiensugiadinhdiungthucpham', $this->tiensugiadinhdiungthucpham])
            ->andFilterWhere(['like', 'tiensugiadinhdiungkhac', $this->tiensugiadinhdiungkhac])
            ->andFilterWhere(['like', 'tiensugiadinhdiungthuocnguoi', $this->tiensugiadinhdiungthuocnguoi])
            ->andFilterWhere(['like', 'tiensugiadinhdiunghoachatnguoi', $this->tiensugiadinhdiunghoachatnguoi])
            ->andFilterWhere(['like', 'tiensugiadinhdiungthucphamnguoi', $this->tiensugiadinhdiungthucphamnguoi])
            ->andFilterWhere(['like', 'tiensugiadinhdiungkhacnguoi', $this->tiensugiadinhdiungkhacnguoi])
            ->andFilterWhere(['like', 'tiensugiadinhbenhtattimmachnguoi', $this->tiensugiadinhbenhtattimmachnguoi])
            ->andFilterWhere(['like', 'tiensugiadinhbenhtattanghuyetapnguoi', $this->tiensugiadinhbenhtattanghuyetapnguoi])
            ->andFilterWhere(['like', 'tiensugiadinhbenhtattamthannguoi', $this->tiensugiadinhbenhtattamthannguoi])
            ->andFilterWhere(['like', 'tiensugiadinhbenhtathensuyennguoi', $this->tiensugiadinhbenhtathensuyennguoi])
            ->andFilterWhere(['like', 'tiensugiadinhbenhtatdaithaoduongnguoi', $this->tiensugiadinhbenhtatdaithaoduongnguoi])
            ->andFilterWhere(['like', 'tiensugiadinhbenhtatdongkinhnguoi', $this->tiensugiadinhbenhtatdongkinhnguoi])
            ->andFilterWhere(['like', 'tiensugiadinhbenhtatungthu', $this->tiensugiadinhbenhtatungthu])
            ->andFilterWhere(['like', 'tiensugiadinhbenhtatlao', $this->tiensugiadinhbenhtatlao])
            ->andFilterWhere(['like', 'tiensugiadinhbenhtatkhac', $this->tiensugiadinhbenhtatkhac])
            ->andFilterWhere(['like', 'bienphaptranhthai', $this->bienphaptranhthai])
            ->andFilterWhere(['like', 'kythaicuoicung', $this->kythaicuoicung])
            ->andFilterWhere(['like', 'benhphukhoa', $this->benhphukhoa])
            ->andFilterWhere(['like', 'vandekhac', $this->vandekhac])
            ->andFilterWhere(['like', 'tiemchungcobantreem', $this->tiemchungcobantreem])
            ->andFilterWhere(['like', 'tiemchungngoaichuongtrinhtcmr', $this->tiemchungngoaichuongtrinhtcmr])
            ->andFilterWhere(['like', 'tiemchungvxuonvan', $this->tiemchungvxuonvan])
            ->andFilterWhere(['like', 'ngaykhamlamsang', $this->ngaykhamlamsang])
            ->andFilterWhere(['like', 'benhsu', $this->benhsu])
            ->andFilterWhere(['like', 'toanthandaniemmac', $this->toanthandaniemmac])
            ->andFilterWhere(['like', 'toanthankhac', $this->toanthankhac])
            ->andFilterWhere(['like', 'timmach', $this->timmach])
            ->andFilterWhere(['like', 'hohap', $this->hohap])
            ->andFilterWhere(['like', 'tieuhoa', $this->tieuhoa])
            ->andFilterWhere(['like', 'tietnieu', $this->tietnieu])
            ->andFilterWhere(['like', 'coxuongkhop', $this->coxuongkhop])
            ->andFilterWhere(['like', 'noitiet', $this->noitiet])
            ->andFilterWhere(['like', 'thankinh', $this->thankinh])
            ->andFilterWhere(['like', 'tamthan', $this->tamthan])
            ->andFilterWhere(['like', 'ngoaikhoa', $this->ngoaikhoa])
            ->andFilterWhere(['like', 'sanphukhoa', $this->sanphukhoa])
            ->andFilterWhere(['like', 'taimuihong', $this->taimuihong])
            ->andFilterWhere(['like', 'ranghammat', $this->ranghammat])
            ->andFilterWhere(['like', 'mat', $this->mat])
            ->andFilterWhere(['like', 'dalieu', $this->dalieu])
            ->andFilterWhere(['like', 'dinhduong', $this->dinhduong])
            ->andFilterWhere(['like', 'vandong', $this->vandong])
            ->andFilterWhere(['like', 'khamkhac', $this->khamkhac])
            ->andFilterWhere(['like', 'danhgiaphattrien', $this->danhgiaphattrien])
            ->andFilterWhere(['like', 'xetnghiemhuyethoc', $this->xetnghiemhuyethoc])
            ->andFilterWhere(['like', 'xetnghiemsinhhoamau', $this->xetnghiemsinhhoamau])
            ->andFilterWhere(['like', 'xetnghiemsinhhoanuoctieu', $this->xetnghiemsinhhoanuoctieu])
            ->andFilterWhere(['like', 'xetnghiemsieuamobung', $this->xetnghiemsieuamobung])
            ->andFilterWhere(['like', 'chandoanketluan', $this->chandoanketluan])
            ->andFilterWhere(['like', 'tuvancuabacsi', $this->tuvancuabacsi])
            ->andFilterWhere(['like', 'bacsikham', $this->bacsikham]);

        return $dataProvider;
    }
}
