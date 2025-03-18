<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:51:"../application/index/view/default/index/market.html";i:1704543130;s:72:"/www/wwwroot/www.1.com/application/index/view/default/public/layout.html";i:1706520753;}*/ ?>
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

	<link rel="stylesheet" href="/template/mb/css/trades.css" />
<script type='text/javascript'>
    // (function(a, b, c, d, e, j, s) {
    //     a[d] = a[d] || function() {
    //         (a[d].a = a[d].a || []).push(arguments)
    //     };
    //     j = b.createElement(c),
    //         s = b.getElementsByTagName(c)[0];
    //     j.async = true;
    //     j.charset = 'UTF-8';
    //     j.src = 'https://static.meiqia.com/widget/loader.js';
    //     s.parentNode.insertBefore(j, s);
    // })(window, document, 'script', '_MEIQIA');
    // _MEIQIA('entId', 'cc4093182a10b787f51bee44b1fdd1de');
    // _MEIQIA('subSource', 'sub_source_1');
</script>
	<style>
        .head{
            font-weight: bold;
            text-align: center;
            margin: 10px 0 20px;
            font-size: 18px;
        }
        .bg2{
            background:#e94438 !important;
        }
        .main-price .name_1{
            margin-top: 8px;
        }
    </style>

</head>

<body>
	<div id="home">
		
		
	<div class="content">
            <div class="head" data-localize="footer.quotation">行情</div>
            
            <div class="pro-title">
                <span data-localize="index.product">产品</span>
                <span data-localize="index.lastPrice">最新价</span>
                <span data-localize="index.change">涨跌幅</span>
            </div>
            
            <div class="content-lever" v-show="tabType == 'lever'">
                <ul>
                
                    <?php foreach($currency as $key=>$vo): ?> 
                    <li>
                        <a href="<?php echo url('index/trades'); ?>?symbol=<?php echo $vo['codename']; ?>" class="main-asset">
                            <div class="flex between">
                                <!-- <div class="logos flex alcenter" >-->
                                <!--    <img width="22" height="22" src="<?php echo $vo['image']; ?>" alt="">-->
                                <!--</div> -->
                                <div class="main-name">
                                    <div class="name_1" style="margin-top:8px;">
                                       <h5><?php echo $vo['title']; ?></h5>
                                    </div>
                                    <div class="name_2">
                                        <span data-localize="index.vol">量</span>:<span id="<?php echo $vo['code']; ?>_vol"><?php echo $vo['vol']; ?></span>
                                    </div>
                                </div>
                                <div class="main-price">
                                    <div class="name_1 usdprice" style="color:#e94438" id="<?php echo $vo['code']; ?>_price"><?php echo $vo['price']; ?></div>
                                </div>
                                <div class="main-rate"> 
                                    <div class="rate_green" id="<?php echo $vo['code']; ?>_zf">
                                        0%
                                    </div>
                                </div>
                            </div>

                        </a>
                    </li>
                    <?php endforeach; ?>
                    
                    
                </ul>
            </div>
            
            
           
            
        </div>
        <div style="height: 51px;"></div>
        

		
	
	
		
			<footer style="z-index:99999">
	            <a href="<?php echo url('index/index'); ?>" <?php if($current == 'index'): ?>class="select"<?php endif; ?>>
	                <div>
	                    <p class="img img0"></p>
	                    <span data-localize="footer.home">首页</span>
	                </div>
	            </a>
	            
	            <a href="<?php echo url('index/market'); ?>" <?php if($current == 'market'): ?>class="select"<?php endif; ?>>
	                <div>
	                    <p class="img img1"></p>
	                    <span data-localize="footer.quotation">行情</span>
	                </div>
	            </a>
	             <a href="<?php echo url('index/trades'); ?>"  <?php if($current == 'trades'): ?>class="select"<?php endif; ?>>
	                <div>
	                    <p class="img img2"></p>
	                    <span data-localize="footer.transaction">交易</span>
	                </div>
	            </a>
	            <a href="<?php echo $kefu; ?>"  <?php if($current == 'kefu'): ?>class="select"<?php endif; ?>>
	                <div>
	                    <p class="img img3"></p>
	                    <span data-localize="footer.kefu">客服</span>
	                </div>
	            </a>
	            <a href="<?php echo url('user/user'); ?>"  <?php if($current == 'user'): ?>class="select"<?php endif; ?>>
	                <div>
	                    <p class="img img4"></p>
	                    <span data-localize="footer.personal">我的</span>
	                </div>
	            </a>
	        </footer>
		
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
	
<script>
    market.init();
</script>

</body>
</html>