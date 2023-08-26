<!DOCTYPE html>
<html>
<head>
    <title>WEB SERVICE</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
    <script type="text/javascript" src="script/jquery-1.4.4.min.js"></script>
    <script type="text/javascript" src="script/m.js"></script>
    <script type="text/javascript" src="script/more.js"></script>
    <script type="text/javascript" src="script/common.js"></script>
    <script type="text/javascript" src="script/functions.js"></script>
    <script type="text/javascript" src="script/language.js"></script>
    <script type="text/javascript" src="script/ajax.js"></script>
    <script type="text/javascript" src="script/flush_string.js"></script>
    <script type="text/javascript" src="jsmain/base64.js"></script>
    <script type="text/javascript" src="jsmain/md5.js"></script>
    <script type="text/javascript" src="jsmain/getcookie.js"></script>
    <script type="text/javascript" src="jsmain/index.js"></script>
    <script type="text/javascript" src="jsmain/liveview.js"></script>
    <script type="text/javascript" src="jsmain/send.js"></script>
    <script type="text/javascript" src="jsmain/replay.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="style/index.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="style/menus.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="style/replay.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="style/config.css" />
</head>
<script language="javascript" for="WebCMS" event="CBK_LoginResult(nRESULT)">
    onLoginNVS(nRESULT);
</script>
<script language="javascript" for="WebCMS" event="CBK_ChangeWindow(nWINDOW)">
    $("nwindows").value = nWINDOW;
    //btnStatus();
</script>
<script language="javascript" for="WebCMS" event="CBK_SaveCaptureFile(szFILENAME)">
    window.status	= "Save:" + szFILENAME;
    setTimeout("window.status='';",5000);
</script>
<script language="javascript" for="WebCMS" event="CBK_ViewChannelNum(nCHTOTAL);)">
    if(nCHTOTAL==1){
        if(parseInt($("zoomin").value)==2){
            $("WebCMS").ImageZoomIn(0);
            $("zoomin").value	= 0;
            $("b_zoom").className	= "leftbtn zoom1";
        }
    }else{
        $("WebCMS").ImageZoomIn(0);
        $("zoomin").value	= 2;
        $("b_zoom").className	= "leftbtn zoom2";
    }
</script>
<script language="javascript" for="WebCMS" event="CBK_Alarms(nALARMS)">
    if(nALARMS == "4112")
    {
        $("d_alarmtip").style.display="none";
    }
    onAlarms(nALARMS);
</script>

<script language="javascript" for="ReVideoX" event="CBK_SearchFileResult(szChannel, szFileName)">
    CBK_SearchResultProgress(szChannel, szFileName);
    //result_Rt(szChannel, szFileName);	//搜索回调
</script>
<script language="javascript" for="ReVideoX" event="CBK_SearchFileResultEx(nRecType, szChannel, nmark, szFileName, nRecSize)">
    CBK_SearchResultProgressEx(nRecType, szChannel, nmark, szFileName, nRecSize);
</script>
<script language="javascript" for="ReVideoX" event="CBK_SearchFileFinish()">
    $("btnSearchRecord").innerHTML = ATTRTITLESEARCH;	//搜索完成时回调
    $("bSearch").value	= 0;
</script>
<script language="javascript" for="ReVideoX" event="CBK_ChangeWindow(nWindow)">
    $("nwindows").value = nWindow;	//选定的窗口回调
</script>
<script language="javascript" for="ReVideoX" event="CBK_ChangePlayStatus(nWindow,nFlag))">
    $("nwindows").value = nWindow;	//选定的窗口回放事件标志回调
    $("winstor").value 	= nFlag;	// 0＝无回放任务  1＝回放远程图片 2＝回放远程录像 3＝回放本地图片 4＝回放本地录像
</script>
<script language="javascript" for="ReVideoX" event="CBK_NetOpenFile(nResult)">
    CBK_OpenFileErr(nResult);	//当打开网络文件失败时返回错误码
</script>
<script language="javascript" for="ReVideoX" event="CBK_PlayProgressEx(nWindow,nTotalTime,nUseTime)">
    CBK_PlayProgressEx(nWindow,nTotalTime,nUseTime);	//回放进度回调
</script>
<script language="javascript" for="ReVideoX" event="CBK_RefreshPlayStatus(nPLAY,nPAUSE,nSTOP,nBACK,nFORWARD,nSTEPBACK,nSTEPIN,nAUDIO,nLOOP,nCAPTURE)">
    CBK_RefreshPlayStatus(nPLAY,nPAUSE,nSTOP,nBACK,nFORWARD,nSTEPBACK,nSTEPIN,nAUDIO,nLOOP,nCAPTURE);
</script>
<script>

    function SearchWifiList(floag)
    {
        try{
            window.status = "";
            var strurl = "/webs/btnHitEx";
            var xmlText 	= "<Message><flag>"+floag+"</flag>";
            xmlText			= xmlText + "</Message>";
            CreateAjax();
            if(!oSend){window.status = CREATEXMLHTTPERROR; return false;}
            strurl	= strurl + "?flag="+floag+"";
            //alert(strurl);
//	window.status = strurl;
            oSend.onreadystatechange = function (){}
            oSend.open("POST",strurl,true);
            oSend.setRequestHeader("CONTENT-TYPE", "text/xml")
            oSend.send(xmlText);
        }catch(e){window.status = SENDXMLHTTPERROR; return false;}
    }
    function languagechange(value)
    {
        $("vlanguage").value = value;
        if(value=="0")
        {
            SearchWifiList(2051);
        }
        else if(value=="1")
        {
            SearchWifiList(2052);
        }
        else if(value=="2")
        {
            SearchWifiList(2053);


        }
        else if(value="3")
        {
            SearchWifiList(2054);
        }
        initLanguage();
        location.reload();
    }
    function keyLogin(){
        if (event.keyCode==13)   //回车键的键值为13
            document.getElementById("b_login").click(); //调用登录按钮的登录事件
    }
</script>
<body  onkeydown="keyLogin();">
<div id="lg_out">
    <div id="login">
        <h1 class="l_header" style="display:none;"><img src="images/login/logo.jpg" alt="" /></h1>
        <div id="lg">
            <div class="l_lanuage">
                <select class="txt grid-8" name="languagechoose" id="languagechoose" onChange="languagechange(this.value)" style="width:90px; min-width:80px; float:right;">
                    <option id="" value="0" selected="selected">English</option>
                    <option id="" value="1">中文</option>
                    <option id="" value="2">русский</option>
                    <option id="" value="3">Türkçe</option>
                </select>
                <div id="lilanguage" style="float:right; line-height:25px; height:25px;">语言:</div>
            </div>
            <div class="l_form">
                <h2 class="l_title" id="l_title">用户登录</h2>
                <dl>
                    <dt class="icon_user" id="liUserName">账号</dt>
                    <dd><input type="text" class="txt" id="username" onFocus="this.select();" onMouseOver="this.focus();"/></dd>
                </dl>
                <dl>
                    <dt class="icon_pwd" id="liPassword">密码</dt>
                    <dd><input type="password" class="txt" id="password" onFocus="this.select();" onMouseOver="this.focus();"/><input type="hidden"	id="ftppassword"  	name="ftppassword" value ="YWRtaW4"/></dd>
                </dl>
                <p class="l_btn"><input type="button" value="登录" id="b_login"/><input type="button" value="取消" id="b_cancel_l"/></p>

            </div>
            <div id="liOCX"></div>
        </div>
    </div>
</div>
<!-----Login end-------->
<!-----辅助信息-------->
<div style="display:none; width:0px; height:0px;">
    <form name="outcfg_frm" id="outcfg_frm" method="post" action="" style="height:0px;">
        <input type="hidden" value="1" 	id="nwindows"  	name="nwindows" >
        <input type="hidden" value="0" 	id="zoomin"  	name="zoomin" >
        <input type="hidden" value="0" 	id="bCenterWeb" name="bCenterWeb" >
        <input type="hidden" value="0" 	id="vlanguage" 	name="vlanguage" ><!--0EngLish	1Chinese//-->

        <input type="hidden" value="0" 	id="digest"  	name="digest" >
        <input type="hidden" value="1" 	id="ipc"  		name="ipc" >

        <input type="hidden" name="url" 	id="url" 	value="192.168.1.231" />
        <input type="hidden" name="port" 	id="port" 	value="5000"/>
        <input type="hidden" name="uname" 	id="uname" 	value="admin"/>
        <input type="hidden" name="passwd" 	id="passwd" value="admin"/>
        <input type="hidden" name="log_videomask" 	id="log_videomask" value="1"/>
        <input type="hidden" name="log_camera" 	id="log_camera" value="1"/>

        <input type="hidden" value="4" name="nlevel" 	id="nlevel" />

        <input type="hidden" value="80" 	id="devicetype" 	name="devicetype" />
        <input type="hidden" value="1" name="nchannel" 	id="nchannel" />
        <input type="hidden" value="1" name="nstorage" 		id="nstorage" />

        <input type="hidden" value="1920" 	id="mainwidth"  	name="mainwidth" >
        <input type="hidden" value="1280" 	id="mainheight"  	name="mainheight" >
        <input type="hidden" value="640"  	id="subwidth"  		name="subwidth" >
        <input type="hidden" value="480" 	id="subheight"  	name="subheight" >

        <input type="hidden" value="64" 	id="vbri" 		name="vbri">
        <input type="hidden" value="127" 	id="vhue" 		name="vhue">
        <input type="hidden" value="78" 	id="vcon" 		name="vcon">
        <input type="hidden" value="210" 	id="vsat" 		name="vsat">

        <input type="hidden" value="1" name="OutputCtrl1" id="OutputCtrl1">
        <input type="hidden" value="0" name="OutputCtrl2" id="OutputCtrl2">
        <input type="hidden" value="0" name="OutputCtrl3" id="OutputCtrl3">
        <input type="hidden" value="0" name="OutputCtrl4" id="OutputCtrl4">
        <input type="hidden" value="0" name="OutputCtrl5" id="OutputCtrl5">
        <input type="hidden" value="0" name="OutputCtrl6" id="OutputCtrl6">
        <input type="hidden" value="0" name="OutputCtrl7" id="OutputCtrl7">
        <input type="hidden" value="0" name="OutputCtrl8" id="OutputCtrl8">
        <input type="hidden" value="1" name="noutput" 	  id="noutput" />

        <input type="hidden" value="0" 	id="iswifi"  	name="iswifi" >
        <input type="hidden" value="1" 	id="iswifialarm"  	name="iswifialarm" >
        <input type="hidden" value="0" 	id="wifi"  		name="wifi" >
        <input type="hidden" value="0" 	id="IsCDMA"  	name="IsCDMA" >
        <input type="hidden" value="0" 	id="mobilecfg" 	name="mobilecfg" >
        <input type="hidden" value="0" 	id="IsGPS"  	name="IsGPS" >
        <input type="hidden" value="0" 	id="netsnmp"  	name="netsnmp" >
        <input type="hidden" value="0" 	id="httpscfg"  	name="httpscfg" >
        <input type="hidden" value="1" 	id="isnetpppoe"  	name="isnetpppoe" >
        <input type="hidden" value="0" 	id="isPIR"  	name="isPIR" >

        <input type="hidden" value="0" 	id="zxlwcfg"  	name="zxlwcfg" >
        <input type="hidden" value="0" 	id="hxhtcfg"  	name="hxhtcfg" >
        <input type="hidden" value="0" 	id="xdtxcfg"  	name="xdtxcfg" >
        <input type="hidden" value="0" 	id="accesscfg"  name="accesscfg" >
        <input type="hidden" value="0" 	id="smcfg"  	name="smcfg" >
        <input type="hidden" value="0" 	id="gb28181"  	name="gb28181" >
        <input type="hidden" value="1" 	id="passwordinit"  	name="passwordinit" >
        <input type="hidden" value="0" 	id="pageversion"  	name="pageversion" >
    </form>
</div>
<div class="ie6-out">
    <div class="ie6-in">
        <div class="min-width">
            <div id="main">
                <div class="header" id="nav_head">
                    <div id="logo" style="position:absolute;display:none;" ><a title=""><img  src="images/login/logo.png" style="background-position:center;"  alt="" width="155"   height="70" /></a></div><div id="divType" style="display:none;">200万高清COMS网络摄像机</div>
                    <div  class="nav" id="nav">
                        <ul>
                            <li class="mainpagelanguage">

                            </li>
                            <li id="b_a"> <a id="b_preview" class="nav_btn1" hidefocus="true" href="javascript:;">   预览   </a></li>
                            <li id="b_ab"> <a id="b_playback" class="nav_btn" hidefocus="true" href="javascript:;">   录像回放   </a></li>
                            <li id="b_b" style="display:none;"> <a id="b_ptzctrl" class="nav_btn" hidefocus="true" href="javascript:;"> PTZ </a></li>
                            <li id="b_c"> <a id="b_config" class="nav_btn" hidefocus="true" href="javascript:;">   设置   </a></li>
                            <li id="b_d"> <a id="b_alarm" class="nav_btn" hidefocus="true" href="javascript:;">   报警   </a>
                                <div class="alarmtip" id="d_alarmtip" style="display:none;"></div></li>
                            <li id="b_e"> <a id="b_quit" class="nav_btn" hidefocus="true" href="javascript:;">   退出   </a></li>
                        </ul>
                    </div>
                </div>
                <!-----header end-------->
                <!-----mb 预览 & PTZ-------->
                <div id="mb" class="content">
                    <div class="preview_ct">
                        <div id="mb_btn_bar" class="videotop"></div>
                        <div id="videoH" class="videoCon">
                            <div id="videoCon"  class="vedioNew">
                                <div id="video1" class="video1"><!---实时视频区域--->
                                    <span id="span_video_mb">
							<object name="WebCMS" ID="WebCMS" style="width:100%;" CLASSID="CLSID:8DA9A0A7-AC21-4EA9-BB7E-43AEF89688A6" codebase="/WebCMS.exe#Version=2,0,0,0"></object>

						</span>
                                    <div style="height:34px; background-color: #e5e5e5; clear:left; border: 1px solid #c8ccd4; display:none;">
                                        <ul style="float:right; padding-top:1px;">

                                        </ul>
                                    </div>
                                </div>

                                <!--此处开始是 图像调节 内容-->
                                <div id="image_adjust" class="preview_rt"></div>
                                <!--此处开始是聚焦缩放内容-->
                                <div id="focus_adjust" class="preview_rt clearfix"></div>
                                <!--到此处结束-->
                                <div id="livectrl" class="writeTabsId">
                                    <a id="b_image" 	onclick="btnLiveCtrl(this, 52)"	href="javascript:;" hidefocus="true" class="inactiveMTab">图像调节</a>
                                    <a id="b_ptz" 		onclick="btnLiveCtrl(this, 51)"	href="javascript:;" hidefocus="true" class="activeMTab">云台控制</a>
                                </div>
                                <div id="ptz_control" class="preview_rt"></div>
                            </div><!--videoCon-->
                        </div>

                    </div><!---preview_ct--->
                </div>

                <!-----mb0 设置-------->
                <div id="mb0" class="content" style="display:none;">
                    <div class="settingDiv" id="divSetting" style="overflow:visible;">
                        <div id="mb0_setting_bar" class="settingleft"></div>
                        <div id="mb0_setting" class="settingright">
                            <fieldset>
                                <iframe id="set_fm" src="" width="100%" height="100%" frameborder="0" style="min-width:1000px;min-height:510px;_height:510px;y-overflow:auto;x-overflow:scroll;"></iframe>
                            </fieldset>
                        </div>
                    </div>
                </div>

                <!-----mb1 回放-------->
                <div id="mb1" class="content" style="display:none;">
                    <div id="revideoH" class="videoCon">
                        <div id="review_ctrl">
                        </div>
                        <div id="review_video">
                            <div  class="rebar" id="div_replay_menus"></div>
                            <div id="video2" class="video2">
                            </div>
                        </div>
                    </div>
                </div>
                <!-----mb1 end-------->

                <!-----mb2 报警-------->
                <div id="mb2" class="content" style="display:none;">
                    <div id="alarmH" class="videoCon">
                        <div id="alarm_body" class="alarm_con"><iframe id="alarm_fm" src="" width="100%" height="100%" frameborder="0" style="min-width:760px;min-height:510px;_height:510px;y-overflow:auto;x-overflow:hidden;"></iframe></div>
                    </div>
                </div>

                <div class="footer"></div>
            </div>
            <!----<div id="main"> --->
        </div>
    </div>
</div>
<div id="estopAll" style="display:none;" class="estopAll" ></div>
<iframe name="btnHit" id="btnHit" src="" align="btnHit" frameborder="0" scrolling="no" style="background-color:#000000;" height="0" width="0"></iframe>
<script>document.outcfg_frm.url.value='192.168.0.120';document.outcfg_frm.port.value='5000';document.outcfg_frm.uname.value='admin';document.outcfg_frm.passwd.value='';document.outcfg_frm.digest.value='0';document.outcfg_frm.devicetype.value='117';document.outcfg_frm.ipc.value='1';document.outcfg_frm.mainwidth.value='720';document.outcfg_frm.mainheight.value='1280';document.outcfg_frm.subwidth.value='480';document.outcfg_frm.subheight.value='640';document.outcfg_frm.vbri.value='128';document.outcfg_frm.vhue.value='128';document.outcfg_frm.vcon.value='128';document.outcfg_frm.vsat.value='128';document.outcfg_frm.wifi.value='0';document.outcfg_frm.IsCDMA.value='0';document.outcfg_frm.iswifialarm.value='0';document.outcfg_frm.gb28181.value='0';document.outcfg_frm.vlanguage.value='0';document.outcfg_frm.nstorage.value='1';document.outcfg_frm.mobilecfg.value='1';$s('divType').innerHTML = ' ';document.outcfg_frm.isnetpppoe.value='1';document.outcfg_frm.isPIR.value='0';document.outcfg_frm.passwordinit.value='1';document.outcfg_frm.pageversion.value='1';</script>
<script>
    function IsFoxFire()
    {

        $("span_video_mb").innerHTML = "<embed type=\"application/x-vlc-plugin\" controls=\"pausebutton\" style=\"width:100%; height:100%;\" id=\"FoxFire_video_mb\" name=\"FoxFire_video_mb\" autoplay=\"yes\" loop=\"yes\" hidden=\"no\" target=\"rtsp://"+$("url").value+"/av0_0&user="+$("username").value+"&password="+$("password").value+"\" />";

        if(!$("FoxFire_video_mb").VersionInfo)
        {
            var str ="您未安装VLC插件，请点击下载。";
            if("en" == m_szLanguage)
            {
                str ="You VLC plug-in is not installed, please click Download.";
            }
            $("span_video_mb").innerHTML ="<a href=\"http://mirrors.ustc.edu.cn/videolan-ftp/vlc/2.1.3/win32/vlc-2.1.3-win32.exe\">"+str+"</a>";
        }
        $("mb_btn_bar").style.display="none";//隐藏主次码流抓拍等功能
        $("b_ab").style.display="none";//隐藏回放功能
        $("livectrl").style.top="10px";
        //$("livectrl").style.display="none";
        //$("ptz_control").style.display="none";

    }

    if("webkit"==getwebtype()||"hh"==getwebtype())
    {
        IsFoxFire();
    }
    $("languagechoose").options[parseInt($("vlanguage").value)].selected = true;

</script>
</body>
</html>