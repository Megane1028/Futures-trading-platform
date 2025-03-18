<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:56:"../application/index/view/default/index/page_detail.html";i:1599886530;s:72:"/www/wwwroot/www.1.com/application/index/view/default/public/layout.html";i:1706520753;}*/ ?>
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
div#content{
				padding: 10px 10px;
				font-size: 1rem;
			}
			div#content ul{
				list-style: none;
			}
			div#content p{
				line-height: 25px;
				
			}
			div#correlation ol{
				margin-left: 30px;
			}
			div#correlation ol li{
				line-height: 1.6rem;
			}
			div#correlation ol li a{
				text-decoration: none;
			}
			div#content h2,
			div#correlation h2{
				margin-bottom: 10px;
			}
			p{
				background: transparent !important;
			}
			/* span{
				color: #728DAF !important;
			} */
			h4{
				background-color: transparent;
			}
			#correlation{
				padding: 0 15px;
			}
			#content img{
				max-width: 100%;
			}
	</style>

</head>

<body>
	<div id="home">
		
		
	 <div id="journalism">
		<header class="header">
          		<a class="back mt5" href="javascript:history.go(-1)"></a>
          		<h4 class="ft20 blod"><?php echo $news['title']; ?></h4>
		</header>
		<div class="header-space"></div>
		<div id="content">
			<?php echo $news['content']; ?>
	    </div>
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