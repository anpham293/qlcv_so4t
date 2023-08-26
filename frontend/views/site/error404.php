<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
    <link type="text/css" href="<?php echo Yii::$app->urlManager->baseUrl?>/theme/css/error.css" rel="stylesheet">
    <link type="text/css" href="<?php echo Yii::$app->urlManager->baseUrl?>/theme/css/bootstrap.css" rel="stylesheet">
    <link type="text/css" href="<?php echo Yii::$app->urlManager->baseUrl?>/theme/css/component.css" rel="stylesheet">
    <link type="text/css" href="<?php echo Yii::$app->urlManager->baseUrl?>/theme/fonts/font-awesome.min.css" rel="stylesheet">
    <title>404</title>
</head>
<body class="page-404-full-page">
<div class="row">
    <div class="col-md-12 page-404">
        <div class="number">
            404
        </div>
        <div class="details">
            <h3>Oops! You're lost.</h3>
            <p>
                Không tìm thấy trang bạn yêu cầu hoặc trang không tồn tại.<br/>
                <a href="<?php echo Yii::$app->urlManager->baseUrl?>">
                    Về trang chủ </a>
                hoặc tìm kiếm ở ô dưới dây.
            </p>
            <form action="#">
                <div class="input-group input-medium">
                    <input type="text" class="form-control" placeholder="keyword...">
                    <span class="input-group-btn">
					<button type="submit" class="btn blue"><i class="fa fa-search"></i></button>
					</span>
                </div>
                <!-- /input-group -->
            </form>
        </div>
    </div>
</div>
</body>
<!-- END BODY -->
</html>