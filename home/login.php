<?php
        session_start();
        require_once("../public/config.php");
        @$isfirst = $_POST['isfirst'];
        $m = mysql_connect(HOST,USER,PASS) or die("系统错误，请联系管理员，错误编号001");
        mysql_select_db(DBNAME);
        mysql_set_charset('utf8');
    if ($isfirst==1) {
        $user = @$_POST['username'];
        $pass = @$_POST['password'];
        $pass=md5($pass);
        $m = mysql_connect(HOST,USER,PASS);
        mysql_select_db(DBNAME);
        mysql_set_charset('utf8');
        $sql = "SELECT password FROM users WHERE username = '{$user}'";
        $result = mysql_query($sql);
        $pa = @mysql_result($result,0,0);
            if($pa != NULL){
                if($pa == $pass){
                    $time = time();
                    $sql1="SELECT id FROM users WHERE username = '{$user}'";
                    $result1=mysql_query($sql1);
                    $_SESSION['id']=mysql_result($result1,0,0);
                    $_SESSION['home']=1;
                    $_SESSION['home_username']=$user;
                    $sql1 = "UPDATE users set lasttime = {$time} WHERE  username = '{$user}'";
                    mysql_query($sql1);
                    header("Location:index.php");
                }else{
                    echo "<script> alert('账号或密码错误')</script>";
                }                
            }else{
                    echo "<script> alert('账号或密码错误')</script>";
             }
         }
    mysql_close($m); 
?>    
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/shopping-mall-index.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/zhonglin.js"></script>
</head>

<body>
	<form method="post" action="login.php">
	<div class="sign-logo w1200">
	<h1><a href="index.php" title="宅客微购"><img src="images/logo.jpg" /></a></h1>
</div>

	<div class="sign-con w1200">
	<img src="images/logn-tu.gif" class="sign-contu f-l" />
    <div class="sign-ipt f-l">
    	<p>用户名</p>
        <input type="text" placeholder="手机号/邮箱" name="username">
        <p>密码</p>
        <input type="password" placeholder="密码可见" name="password"><br />
        <button class="slig-btn">登录</button>
        <p>已有账号？请<a href="#">登录</a><a href="#" class="wj">忘记密码？</a></p>
        <div class="sign-qx">
        	<a href="#" class="f-r"><img src="images/sign-xinlan.gif" /></a>
        	<a href="#" class="qq f-r"><img src="images/sign-qq.gif" /></a>
            <div style="clear:both;"></div>
        </div>
    </div>
    <div style="clear:both;"></div>
</div>

    <!--底部服务-->
    <div class="ft-service">
    	<div class="w1200">
        	<div class="sv-con-l2 f-l">
            	<dl>
                	<dt><a href="#">新手上路</a></dt>
                    <dd>
                    	<a href="#">购物流程</a>
                    	<a href="#">在线支付</a>
                    </dd>
                </dl>
                <dl>
                	<dt><a href="#">配送方式</a></dt>
                    <dd>
                    	<a href="#">货到付款区域</a>
                    	<a href="#">配送费标准</a>
                    </dd>
                </dl>
                <dl>
                	<dt><a href="#">购物指南</a></dt>
                    <dd>
                    	<a href="#">常见问题</a>
                    	<a href="#">订购流程</a>
                    </dd>
                </dl>
                <dl>
                	<dt><a href="#">售后服务</a></dt>
                    <dd>
                    	<a href="#">售后服务保障</a>
                    	<a href="#">退款说明</a>
                    	<a href="#">新手选购商品总则</a>
                    </dd>
                </dl>
                <dl>
                	<dt><a href="#">关于我们</a></dt>
                    <dd>
                    	<a href="#">投诉与建议</a>
                    </dd>
                </dl>
                <div style="clear:both;"></div>
            </div>
        	<div class="sv-con-r2 f-r">
            	<p class="sv-r-tle">187-8660-5539</p>
            	<p>周一至周五9:00-17:30</p>
            	<p>（仅收市话费）</p>
            	<a href="#" class="zxkf">24小时在线客服</a>
            </div>
            <div style="clear:both;"></div>
        </div>
    </div>
    <input type="hidden" name="isfirst" value="1">
    <!--底部 版权-->
    <div class="footer w1200">
    	<p>
        	<a href="#">关于我们</a><span>|</span>
        	<a href="#">友情链接</a><span>|</span>
        	<a href="#">宅客微购社区</a><span>|</span>
        	<a href="#">诚征英才</a><span>|</span>
        	<a href="#">商家登录</a><span>|</span>
        	<a href="#">供应商登录</a><span>|</span>
        	<a href="#">热门搜索</a><span>|</span>
        	<a href="#">宅客微购新品</a><span>|</span>
        	<a href="#">开放平台</a>
        </p>
        <p>
        	沪ICP备13044278号<span>|</span>合字B1.B2-20130004<span>|</span>营业执照<span>|</span>互联网药品信息服务资格证<span>|</span>互联网药品交易服务资格证
        </p>
    </div>
    </form>
</body>
</html>
