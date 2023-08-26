<ul class="nav navbar-nav nav-justified">
    <?php foreach (\common\models\Menu::find()->where("type='top' and active=1 and parent IS NULL")->orderBy('ord ASC')->all() as $index => $value): ?>
        <?php /** @var \common\models\Menu $value */ ?>

        <?php $submenu = \common\models\Menu::find()->where('parent=' . $value->id . ' and active=1')->orderBy('ord ASC')->all(); ?>
        <li <?php if (empty($submenu)) echo 'class="mobile-menu-item"' ?>>
            <?php /** @var \common\models\Menu $value */ ?>
            <?php if (!empty($submenu)): echo 'class="mobile-menu-item"' ?>
                <a href="#" class="dropdown-toggle" mobilemenudata-toggle="dropdownsub">
                    <?= $value->name ?>
                </a>
                <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                    <?php foreach ($submenu as $indexsub => $valuesub): ?>
                        <?php $submenu2 = \common\models\Menu::find()->where('parent=' . $valuesub->id . ' and active=1')->orderBy('ord ASC')->all(); ?>
                        <?php if (!empty($submenu2)): ?>
                            <li class="dropdown-submenu">
                                <a target="_self" tabindex="-1"
                                   title="<?= $valuesub->name ?>"
                                    href="<?php if (substr($valuesub->link, 0, 1) == "/") echo Yii::$app->urlManager->baseUrl . $valuesub->link; else echo $valuesub->link ?>">
                                    <?= $valuesub->name ?>
                                </a>
                                <ul class="dropdown-menu">
                                    <?php foreach ($submenu2 as $index2 => $value2): ?>
                                        <li>
                                            <a target="_self" tabindex="0"
                                               title="<?= $value2->name ?>"
                                               href="<?php if (substr($value2->link, 0, 1) == "/") echo Yii::$app->urlManager->baseUrl . $value2->link; else echo $value2->link ?>">
                                                <?= $value2->name ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php else: ?>
                            <li>
                                <a target="_self" tabindex="0"
                                   href="<?php if (substr($valuesub->link, 0, 1) == "/") echo Yii::$app->urlManager->baseUrl . $valuesub->link; else echo $valuesub->link ?>"
                                   title="<?= $valuesub->name ?>">
                                    <?= $valuesub->name ?>
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <a href="<?php if (substr($value->link, 0, 1) == "/") echo Yii::$app->urlManager->baseUrl . $value->link; else echo $value->link ?>">
                    <?= $value->name ?>
                </a>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>


<div class="desktop-menu">
    <div id="navbar" class="navbar-collapse collapse">
        1<ul class="nav navbar-nav nav-justified">
            1<li>
                1<a href="https://www.quangninh.gov.vn">Trang chủ</a>
            </li>
            1<li>
                1<a href="#" class="dropdown-toggle" mobilemenudata-toggle="dropdownsub">Tổng quan</a>
                2<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                    2<li class="">
                        2<a target="_self"
                                    href="https://www.quangninh.gov.vn/Trang/dieu-kien-tu-nhien-xa-hoi.aspx"
                                    tabindex="0" title="Tổng quan tài nguyên thiên nhiên">Tổng quan tài nguyên thiên
                            nhiên</a>
                    </li>
                    <li class=""><a target="_self"
                                    href="https://www.quangninh.gov.vn/Trang/DanhSachBaiVietGioiThieu.aspx?Cat=Điều kiện tự nhiên - xã hội"
                                    tabindex="0" title="Điều kiện TNXH">Điều kiện TNXH</a></li>
                    <li class=""><a target="_self"
                                    href="https://www.quangninh.gov.vn/Trang/DanhSachBaiVietGioiThieu.aspx?Cat=Di%20tích%20lịch%20sử%20-%20Văn%20hóa"
                                    tabindex="0" title=" Di tích lịch sử - Văn hóa"> Di tích lịch sử - Văn hóa</a></li>
                    <li class=""><a target="_self"
                                    href="https://www.quangninh.gov.vn/Trang/DanhSachBaiVietGioiThieu.aspx?Cat=Tài nguyên thiên nhiên"
                                    tabindex="0" title="Tài nguyên thiên nhiên">Tài nguyên thiên nhiên</a></li>
                    <li class=""><a target="_self"
                                    href="https://www.quangninh.gov.vn/Trang/DanhSachBaiVietGioiThieu.aspx?Cat=C%C6%A1%20s%E1%BB%9F%20h%E1%BA%A1%20t%E1%BA%A7ng"
                                    tabindex="0" title="Cơ sở hạ tầng">Cơ sở hạ tầng</a></li>
                    <li class=""><a target="_self"
                                    href="https://www.quangninh.gov.vn/Trang/DanhSachBaiVietGioiThieu.aspx?Cat=Các đơn vị hành chính"
                                    tabindex="0" title="Đơn vị hành chính">Đơn vị hành chính</a></li>
                    <li class=""><a target="_self"
                                    href="https://www.quangninh.gov.vn/Trang/DanhSachBaiVietGioiThieu.aspx?Cat=Quá trình hình thành và phát triển"
                                    tabindex="0" title="Quá trình hình thành và phát triển">Quá trình hình thành và phát
                            triển</a></li>
                </ul>
            </li>
            1<li>
                1<a href="#" class="dropdown-toggle" mobilemenudata-toggle="dropdownsub">Tổ chức bộ máy</a>
                2<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                    2<li class="dropdown-submenu">
                        2<a target="_self" href="http://#" tabindex="-1" title="Tỉnh ủy">Tỉnh ủy</a>
                        3<ul class="dropdown-menu">
                            3<li class="">
                                3<a target="_self"
                                            href="https://www.quangninh.gov.vn/bannganh/VPTUQN/Trang/ChiTietBVGioiThieu.aspx?bvid=8"
                                            tabindex="0" title="Thường trực Tỉnh ủy">Thường trực Tỉnh ủy</a></li>
                            <li class=""><a target="_self"
                                            href="https://www.quangninh.gov.vn/bannganh/VPTUQN/Trang/ChiTietBVGioiThieu.aspx?bvid=9"
                                            tabindex="0" title="Ban thường vụ Tỉnh ủy">Ban thường vụ Tỉnh ủy</a></li>
                            <li class=""><a target="_self"
                                            href="https://www.quangninh.gov.vn/bannganh/VPTUQN/Trang/ChiTietBVGioiThieu.aspx?bvid=10"
                                            tabindex="0" title="Ban chấp hành đảng bộ tỉnh">Ban chấp hành đảng bộ
                                    tỉnh</a></li>
                            <li class="dropdown-submenu"><a target="_self" href="http://#" tabindex="-1"
                                                            title="Các ban Đảng">Các ban Đảng</a>
                                <ul class="dropdown-menu">
                                    <li class=""><a target="_self"
                                                    href="https://www.quangninh.gov.vn/bannganh/bantochuc/Trang/ChiTietBVGioiThieu.aspx?bvid=4"
                                                    tabindex="0" title="Ban Tổ chức">Ban Tổ chức</a></li>
                                    <li class=""><a target="_self"
                                                    href="https://btgtu.quangninh.gov.vn/Trang/ChiTietBVGioiThieu.aspx?bvid=7"
                                                    tabindex="0" title="Ban Tuyên giáo">Ban Tuyên giáo</a></li>
                                    <li class=""><a target="_self"
                                                    href="https://www.quangninh.gov.vn/bannganh/UyBanKiemTra/Trang/ChiTietBVGioiThieu.aspx?bvid=7"
                                                    tabindex="0" title="Ủy ban kiểm tra Tỉnh ủy">Ủy ban kiểm tra Tỉnh
                                            ủy</a></li>
                                    <li class=""><a target="_self"
                                                    href="https://www.quangninh.gov.vn/bannganh/BanDanVan/Trang/ChiTietBVGioiThieu.aspx?bvid=9"
                                                    tabindex="0" title="Ban Dân vận">Ban Dân vận</a></li>
                                    <li class=""><a target="_self"
                                                    href="https://www.quangninh.gov.vn/bannganh/Phongchongthamnhung/Trang/ChiTietBVGioiThieu.aspx?bvid=7"
                                                    tabindex="0" title="Ban Nội chính">Ban Nội chính</a></li>
                                </ul>
                            </li>
                            <li class=""><a target="_self"
                                            href="https://www.quangninh.gov.vn/bannganh/VPTUQN/Trang/ChiTietBVGioiThieu.aspx?bvid=14"
                                            tabindex="0" title="Văn phòng Tỉnh ủy">Văn phòng Tỉnh ủy</a></li>
                            <li class=""><a target="_self" href="https://tttt.quangninh.gov.vn/Trang/Default.aspx"
                                            tabindex="0" title="Trung tâm truyền thông tỉnh">Trung tâm truyền thông
                                    tỉnh</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu"><a target="_self" href="http://#" tabindex="-1"
                                                    title="Đoàn đại biểu Quốc Hội tỉnh Quảng Ninh">Đoàn đại biểu Quốc
                            Hội tỉnh Quảng Ninh</a>
                        <ul class="dropdown-menu">
                            <li class=""><a target="_self"
                                            href="https://www.quangninh.gov.vn/bannganh/vphdubnd/Trang/ChiTietBVGioiThieu.aspx?bvid=2"
                                            tabindex="0" title="Đoàn ĐBQH và ĐBQH ">Đoàn ĐBQH và ĐBQH </a></li>
                            <li class=""><a target="_self"
                                            href="https://www.quangninh.gov.vn/bannganh/vphdubnd/Trang/ChiTietBVGioiThieu.aspx?bvid=1"
                                            tabindex="0" title="Văn phòng Đoàn ĐBQH, HĐND và UBND">Văn phòng Đoàn ĐBQH,
                                    HĐND và UBND</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu"><a target="_self" href="http://#" tabindex="-1"
                                                    title="Hội đồng nhân dân Tỉnh">Hội đồng nhân dân Tỉnh</a>
                        <ul class="dropdown-menu">
                            <li class=""><a target="_self"
                                            href="https://www.quangninh.gov.vn/bannganh/vphdubnd/Trang/ChiTietBVGioiThieu.aspx?bvid=4"
                                            tabindex="0" title="Đại biểu HĐND">Đại biểu HĐND</a></li>
                            <li class=""><a target="_self"
                                            href="https://www.quangninh.gov.vn/bannganh/vphdubnd/Trang/ChiTietBVGioiThieu.aspx?bvid=5"
                                            tabindex="0" title="Thường trực HĐND">Thường trực HĐND</a></li>
                            <li class=""><a target="_self"
                                            href="https://www.quangninh.gov.vn/bannganh/vphdubnd/Trang/ChiTietBVGioiThieu.aspx?bvid=7"
                                            tabindex="0" title="Ban kinh tế - Ngân sách">Ban kinh tế - Ngân sách</a>
                            </li>
                            <li class=""><a target="_self"
                                            href="https://www.quangninh.gov.vn/bannganh/vphdubnd/Trang/ChiTietBVGioiThieu.aspx?bvid=8"
                                            tabindex="0" title="Ban Văn hóa - Xã hội">Ban Văn hóa - Xã hội</a></li>
                            <li class=""><a target="_self"
                                            href="https://www.quangninh.gov.vn/bannganh/vphdubnd/Trang/ChiTietBVGioiThieu.aspx?bvid=9"
                                            tabindex="0" title="Ban pháp chế">Ban pháp chế</a></li>
                            <li class=""><a target="_self"
                                            href="https://www.quangninh.gov.vn/bannganh/vphdubnd/Trang/Default.aspx"
                                            tabindex="0" title="Văn phòng HĐND">Văn phòng HĐND</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu"><a target="_self" href="http://#" tabindex="-1"
                                                    title="Ủy ban nhân dân Tỉnh">Ủy ban nhân dân Tỉnh</a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-submenu"><a target="_self" href="http://#" tabindex="-1"
                                                            title="Ủy ban nhân dân">Ủy ban nhân dân</a>
                                <ul class="dropdown-menu">
                                    <li class=""><a target="_self"
                                                    href="https://www.quangninh.gov.vn/bannganh/vphdubnd/Trang/ChiTietBVGioiThieu.aspx?bvid=10"
                                                    tabindex="0" title="Giới thiệu chung UBND">Giới thiệu chung UBND</a>
                                    </li>
                                    <li class=""><a target="_self"
                                                    href="https://www.quangninh.gov.vn/bannganh/vphdubnd/Trang/ChiTietBVGioiThieu.aspx?bvid=11"
                                                    tabindex="0" title="Tổ chức bộ máy">Tổ chức bộ máy</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu"><a target="_self" href="http://#" tabindex="-1"
                                                            title="Văn phòng Đoàn ĐBQH, HĐND và UBND">Văn phòng Đoàn
                                    ĐBQH, HĐND và UBND</a>
                                <ul class="dropdown-menu">
                                    <li class=""><a target="_self"
                                                    href="https://www.quangninh.gov.vn/bannganh/vphdubnd/Trang/ChiTietBVGioiThieu.aspx?bvid=12"
                                                    tabindex="0" title="Giới thiệu chung">Giới thiệu chung</a></li>
                                    <li class=""><a target="_self"
                                                    href="https://www.quangninh.gov.vn/bannganh/vphdubnd/Trang/ChiTietBVGioiThieu.aspx?bvid=14"
                                                    tabindex="0" title="Chức năng nhiệm vụ">Chức năng nhiệm vụ</a></li>
                                    <li class=""><a target="_self"
                                                    href="https://www.quangninh.gov.vn/bannganh/vphdubnd/Trang/ChiTietBVGioiThieu.aspx?bvid=18"
                                                    tabindex="0" title="Tổ chức bộ máy">Tổ chức bộ máy</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class=""><a target="_self"
                                    href="https://www.quangninh.gov.vn/Trang/ChiTietBVGioiThieu.aspx?bvid=459"
                                    tabindex="0" title="Các Sở">Các Sở</a></li>
                    <li class=""><a target="_self"
                                    href="https://www.quangninh.gov.vn/Trang/ChiTietBVGioiThieu.aspx?bvid=198"
                                    tabindex="0" title="Ban, Đơn vị sự nghiệp">Ban, Đơn vị sự nghiệp</a></li>
                    <li class=""><a target="_self"
                                    href="https://www.quangninh.gov.vn/Trang/ChiTietBVGioiThieu.aspx?bvid=201"
                                    tabindex="0" title="Ngành - Tổ chức">Ngành - Tổ chức</a></li>
                    <li class=""><a target="_self"
                                    href="https://www.quangninh.gov.vn/Trang/ChiTietBVGioiThieu.aspx?bvid=217"
                                    tabindex="0" title="Các Huyện - Thị xã - TP">Các Huyện - Thị xã - TP</a></li>
                </ul>
            </li>
            <li><a href="#" class="dropdown-toggle" mobilemenudata-toggle="dropdownsub">Tin Tức</a>
                <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                    <li class=""><a target="_self" href="https://www.quangninh.gov.vn/Trang/Tin-tuc-su-kien.aspx?Cat=82"
                                    tabindex="0" title="Tin hoạt động trong tỉnh">Tin hoạt động trong tỉnh</a></li>
                </ul>
            </li>
            <li><a href="http://dichvucong.quangninh.gov.vn">Dịch vụ công</a></li>
            <li><a href="#" class="dropdown-toggle" mobilemenudata-toggle="dropdownsub">Hồ sơ sức khỏe</a>
                <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu" style="display: none;">
                    <li class=""><a target="_self" href="http://congbao.quangninh.gov.vn" tabindex="0" title="Công báo">Công
                            báo</a></li>
                    <li class=""><a target="_self" href="https://www.quangninh.gov.vn/Trang/van-ban-chi-dao.aspx"
                                    tabindex="0" title="Hồ sơ sức khỏe Chỉ Đạo Điều Hành">Hồ sơ sức khỏe Chỉ Đạo Điều Hành</a></li>
                    <li class="dropdown-submenu"><a target="_self" href="http://#" tabindex="-1"
                                                    title="Khiếu nại Tố cáo">Khiếu nại Tố cáo</a>
                        <ul class="dropdown-menu">
                            <li class=""><a target="_self"
                                            href="https://www.quangninh.gov.vn/Trang/van-ban-khieu-nai-to-cao.aspx?dvid=Thành phố Hạ Long"
                                            tabindex="0" title="TP Hạ Long">TP Hạ Long</a></li>
                            <li class=""><a target="_self"
                                            href="https://www.quangninh.gov.vn/Trang/van-ban-khieu-nai-to-cao.aspx?dvid=Thành phố Cẩm Phả"
                                            tabindex="0" title="TP Cẩm Phả">TP Cẩm Phả</a></li>
                            <li class=""><a target="_self"
                                            href="https://www.quangninh.gov.vn/Trang/van-ban-khieu-nai-to-cao.aspx?dvid=Thành phố Uông Bí"
                                            tabindex="0" title="TP Uông Bí">TP Uông Bí</a></li>
                            <li class=""><a target="_self"
                                            href="https://www.quangninh.gov.vn/Trang/van-ban-khieu-nai-to-cao.aspx?dvid=Thị xã Đông Triều"
                                            tabindex="0" title="Thị Xã Đông Triều">Thị Xã Đông Triều</a></li>
                            <li class=""><a target="_self"
                                            href="https://www.quangninh.gov.vn/Trang/van-ban-khieu-nai-to-cao.aspx?dvid=Thị xã Quảng Yên"
                                            tabindex="0" title="Thị Xã Quảng Yên">Thị Xã Quảng Yên</a></li>
                            <li class=""><a target="_self"
                                            href="https://www.quangninh.gov.vn/Trang/van-ban-khieu-nai-to-cao.aspx?dvid=Huyện Ba Chẽ"
                                            tabindex="0" title="Huyện Ba Chẽ">Huyện Ba Chẽ</a></li>
                            <li class=""><a target="_self"
                                            href="https://www.quangninh.gov.vn/Trang/van-ban-khieu-nai-to-cao.aspx?dvid=Huyện Bình Liêu"
                                            tabindex="0" title="Huyện Bình Liêu">Huyện Bình Liêu</a></li>
                            <li class=""><a target="_self"
                                            href="https://www.quangninh.gov.vn/Trang/van-ban-khieu-nai-to-cao.aspx?dvid=Huyện Cô Tô"
                                            tabindex="0" title="Huyện Cô Tô">Huyện Cô Tô</a></li>
                            <li class=""><a target="_self"
                                            href="https://www.quangninh.gov.vn/Trang/van-ban-khieu-nai-to-cao.aspx?dvid=Huyện Đầm Hà"
                                            tabindex="0" title="Huyện Đầm Hà">Huyện Đầm Hà</a></li>
                            <li class=""><a target="_self"
                                            href="https://www.quangninh.gov.vn/Trang/van-ban-khieu-nai-to-cao.aspx?dvid=Huyện Hải Hà"
                                            tabindex="0" title="Huyện Hải Hà">Huyện Hải Hà</a></li>
                            <li class=""><a target="_self"
                                            href="https://www.quangninh.gov.vn/Trang/van-ban-khieu-nai-to-cao.aspx?dvid=Huyện Hoành Bồ"
                                            tabindex="0" title="Huyện Hoành Bồ">Huyện Hoành Bồ</a></li>
                            <li class=""><a target="_self"
                                            href="https://www.quangninh.gov.vn/Trang/van-ban-khieu-nai-to-cao.aspx?dvid=Thành phố Móng Cái"
                                            tabindex="0" title="TP Móng Cái">TP Móng Cái</a></li>
                            <li class=""><a target="_self"
                                            href="https://www.quangninh.gov.vn/Trang/van-ban-khieu-nai-to-cao.aspx?dvid=Huyện Vân Đồn"
                                            tabindex="0" title="Huyện Vân Đồn">Huyện Vân Đồn</a></li>
                            <li class=""><a target="_self"
                                            href="https://www.quangninh.gov.vn/Trang/van-ban-khieu-nai-to-cao.aspx?dvid=Huyện Tiên Yên"
                                            tabindex="0" title="Huyện Tiên Yên">Huyện Tiên Yên</a></li>
                            <li class=""><a target="_self"
                                            href="http://quangninh.gov.vn/Trang/van-ban-khieu-nai-to-cao.aspx?dvid=Đơn vị khác"
                                            tabindex="0" title="Đơn vị khác">Đơn vị khác</a></li>
                            <li class=""><a target="_self"
                                            href="https://www.quangninh.gov.vn/Trang/van-ban-khieu-nai-to-cao.aspx?dvid=Đơn vị khác"
                                            tabindex="0" title="Hồ sơ sức khỏe khác">Hồ sơ sức khỏe khác</a></li>
                            <li class=""><a target="_self"
                                            href="https://www.quangninh.gov.vn/trang/vanbancu.aspx?Cat=101" tabindex="0"
                                            title="Hồ sơ sức khỏe từ 01/2017">Hồ sơ sức khỏe từ 01/2017</a></li>
                            <li class="dropdown-submenu"><a target="_self"
                                                            href="https://www.quangninh.gov.vn/trang/vanban2016.aspx"
                                                            tabindex="-1" title="Hồ sơ sức khỏe từ 2011 đến 2016 ">Hồ sơ sức khỏe từ
                                    2011 đến 2016 </a>
                                <ul class="dropdown-menu">
                                    <li class=""><a target="_self"
                                                    href="https://www.quangninh.gov.vn/Trang/Tin-tuc-su-kien.aspx?Cat=115"
                                                    tabindex="0" title="Giải quyết khiếu nại tố cáo">Giải quyết khiếu
                                            nại tố cáo</a></li>
                                    <li class=""><a target="_self"
                                                    href="https://www.quangninh.gov.vn/Trang/Tin-tuc-su-kien.aspx?Cat=114"
                                                    tabindex="0" title="Hồ sơ sức khỏe liên quan">Hồ sơ sức khỏe liên quan</a></li>
                                    <li class=""><a target="_self"
                                                    href="https://www.quangninh.gov.vn/Trang/Tin-tuc-su-kien.aspx?Cat=113"
                                                    tabindex="0" title="Thông báo kết quả tiếp dân">Thông báo kết quả
                                            tiếp dân</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class=""><a target="_self"
                                    href="https://www.quangninh.gov.vn/Trang/danh-sach-van-ban-phap-quy.aspx"
                                    tabindex="0" title="Hồ sơ sức khỏe Pháp Quy">Hồ sơ sức khỏe Pháp Quy</a></li>
                    <li class=""><a target="_self" href="https://www.quangninh.gov.vn/Trang/van-ban-khac.aspx"
                                    tabindex="0" title="Hồ sơ sức khỏe khác">Hồ sơ sức khỏe khác</a></li>
                </ul>
            </li>
            <li><a href="http://dulich.quangninh.gov.vn">Du Lịch</a></li>
            <li><a href="http://doanhnghiep.quangninh.gov.vn">Doanh Nghiệp</a></li>
        </ul>
    </div>
</div>