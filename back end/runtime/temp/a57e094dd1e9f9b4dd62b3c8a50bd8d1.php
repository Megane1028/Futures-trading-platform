<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:49:"../application/index/view/default/index/help.html";i:1599886398;s:72:"/www/wwwroot/www.1.com/application/index/view/default/public/layout.html";i:1706520753;}*/ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, viewport-fit=cover" />
<title><?php echo $site['web_name']; ?></title>
<link rel="stylesheet" href="/template/mb/css/swiper.min.css" />
<link rel="stylesheet" href="/template/mb/lib/bootstrap.min.css" />
<link rel="stylesheet" href="/template/mb/lib/bootstrap-theme.min.css" />
<link rel="stylesheet" href="/template/mb/fonts/iconfont.css">
<link rel="stylesheet" href="/template/mb/css/common.css">
<link rel="stylesheet" href="/template/mb/css/index.css" />
<link rel="stylesheet" href="/template/mb/css/footer.css" />
<link rel="stylesheet" href="/template/mb/css/index_banner.css" />
<link rel="stylesheet" href="/template/mb/css/swiper.min.css">
<script src="/template/mb/js/swiper.min.js"></script>
<style>
    #home .trade{
        padding: 0 13px;
        background: transparent;
    }
    #home .trade ul li{
        background: #fff;
        padding: 10px 0;
        border-radius: 5px;
    }
    .new-two-box{
        padding: 5px 5%;
    }
    .news-two{
        padding-bottom: 10px;
    }
    #home .trade{
        margin-top: 10px;
        margin-bottom: 0;
    }
    .nav-tabs>li>a:hover{
        border: 0;
    }
    .nav>li>a{
        font-size: 16px;
    }
    .nav>li>a:focus, .nav>li>a:hover{
        border: 0;
        background-color: transparent;
    }
    .nav-active a{
        color:#588bf7 !important ;
    }
    .nav-active::after{
        background:#588bf7 !important;
    }
    .performer-classify{
        padding: 0 15px 3px;
    }
    [v-cloak]{
            display: none;
        }
    #meiqia_custorm{
        left: 70vw;
        top: 80vh;
    }
</style>

	<style>
        body{background-color:#fff !important}
		.demos li{
			padding: 15px;
			border-bottom: 1px solid #f1f1f1;
		}
		a:link,a:hover{color: #333;}
		.news-item a{
			display: block;
			width: 100%;
		}
		.header-box{
		    background: #2351bd;
		}
		.header-back{
		    margin: 0 2%;
		        padding: 10px 0;
		}
		.header-back a img{
		    width: 30px;
		    height: 30px;
		}
		.header-content{
		    display: flex;
		    flex-direction: row;
		    align-items: center;
		    justify-content: space-between;
		    margin: 0 3%;
		}
		.header-txt{
	        text-align:left
		}
		.header-txt h1{
		    font-size: 30px;
		    color:#fff;
		    font-weight: bold;
		    margin-bottom: 10px;
		}
		.header-txt span{
		    color:#84a8e1;
		}
		.header-img img{
		    height: 120px;
		}
	</style>

</head>

<body>
	<div id="home">
		
		
	 <div class="header-box">
	    <div class="header-back">
	        <a href="javascript:history.go(-1)">
	            <img src="/template/mb/images/return.png">
	        </a>
	    </div>
	    <div class="header-content">
	        <div class="header-txt">
	            <h1 data-localize="index.helpcenter">帮助中心</h1>
	            <span data-localize="zdy.suishisuidi">随时随地为您提供服务</span>
	        </div>
	        <div class="header-img">
	            <img src="/template/mb/images/mine_help_top_pic.1f4ca66.png">
	        </div>
	    </div>
	</div>
	<div class="nav about-list">
		<ul class="ft16 demos">
            <?php foreach($news as $key=>$vo): ?>
			<li class='news-item'><a href="<?php echo url('index/page_detail', array('sid'=>$vo['id'])); ?>"><?php echo $vo['title']; ?></a></li>
			<?php endforeach; ?>

		</ul>
	</div>
 

		
	
	
		
	</div>
	<script type="text/javascript" src="/template/mb/lib/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="/template/mb/javascripts/iSliders.js"></script>
	<script type="text/javascript" src="/template/mb/javascripts/islider_desktop.js"></script>
	<script type="text/javascript" src="/template/mb/lib/bootstrap.min.js"></script>
	<script type="text/javascript" src="/template/mb/lib/jquery.bootstrap.newsbox.min.js"></script>
	<script type="text/javascript" src="/template/mb/javascripts/swiper.min.js"></script>
	<script type="text/javascript" src="/template/mb/javascripts/jquery.cookie.js"></script>
	<script type="text/javascript" src="/template/mb/lib/layer_mobile/layer.js?2020"></script>
	<script type="text/javascript" src="/template/mb/lib/jquery.localize.min.js"></script>
	<script type="text/javascript" src="/template/mb/lib/language_cookie.js?2023121001"></script>
	<script type="text/javascript" src="/template/mb/javascripts/main.js?t=<?php echo time(); ?>"></script>
	<script type="text/javascript" src="/template/mb/page.js?t=<?php echo time(); ?>"></script>
	
	<script>
        if (getLocal('language') && getLocal('language') == 'en') {
            $('.langs .logos').attr('src', 'images/en.png');
        } else if(getLocal('language') && getLocal('language') == 'hk'){
            
            $('.langs .logos').attr('src', 'images/hk.png');
        }else{
        	$('.langs .logos').attr('src', 'images/cn.png');
        }

    </script>
	
 

</body>
</html>