<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:51:"../application/index/view/default/user/setting.html";i:1702197439;s:72:"/www/wwwroot/www.1.com/application/index/view/default/public/layout.html";i:1706520753;}*/ ?>
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
    .content-box-list:last-child{
        border-bottom: 0;
    }
    .content-box{
        background: #fff;
        margin-bottom: 20px;
    }
    .content-box-list{
        display: flex;
        flex-direction: row;
        justify-content:space-between;
        border-bottom: 1px solid #ddd;
        padding: 10px 3% 10px 0;
        margin-left: 5%;
    }
    .content-box-list h1{
        font-size: 16px;
        font-weight: normal;
    }
    .content-box-list article span{
        font-size: 14px;
        color: #90a2b0;
    }
    .content-box-list article img{
        width: 20px;
        height: 20px;
    }
    .content-box-list article{
        display: flex;
        flex-direction: row;
    }
    .lang-fix{
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 4;
    }
    .lang-mask{
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 5;
        background: rgba(0,0,0,0.5);
    }
    .lang-box{
        position: fixed;
        bottom: 0;
        width: 100%;
        z-index: 99;
        background: #fff;
        text-align: center;
    }
    .lang-txt{
        padding: 10px;
        font-size: 16px;
        border-bottom: 1px solid #eee;
    }
    .lang-line{
        width: 100%;
        height: 20px;
        background: #ced1d4;
    }
    .lang-close{
        padding: 10px;
        font-size: 16px;
        color: #588bf7;
    }
    .btns{
        color:#fff;
        background: #588bf7;
        width: 70%;
        margin: 0 auto;
        padding: 15px 0;
        font-size: 18px;
        border-radius: 30px;
        text-align: center;
    }
</style>

</head>

<body>
	<div id="home">
		
		
	    <div class="lang-fix" v-show="langBool" style="display:none">
	        <div class="lang-mask" @click="langmask()"></div>
	        <div class="lang-box">
	            <div class="lang-txt" @click="tabLang(item.lang)" v-for="(item,index) in langtxt" :class="index==langIndex?'active':''">{{item.txt}}</div>
	            
	        <div class="lang-line"></div>
	        <div class="lang-close" @click="langmask()">关闭</div>
	        </div>
	    </div>
	    
	    <header class="header">
			<a class="back mt5" href="javascript:history.go(-1)">

			</a>
			<h4 class="ft16" data-localize="zdy.setting">设置</h4>
			
		</header>
		<div class="header-space"></div>
		<div class="content-box">
		    <div class="content-box-list">
		        <h1>ID</h1>
		        <article>
		            <span><?php echo $user['id']; ?></span>
		            <img src="/template/mb/images/user/jitou.png">
		        </article>
		    </div>
		    
		    
		    <div class="content-box-list jump" data-href="<?php echo url('user/pwd'); ?>">
		        <h1 data-localize="zdy.xgdlmm">修改登录密码</h1>
		        <article>
		            <img src="/template/mb/images/user/jitou.png">
		        </article>
		    </div>
		    <?php if(config('site.mpsswd_show') == 1): ?>
		    <div class="content-box-list jump" data-href="<?php echo url('user/mpwd'); ?>">
		        <h1 data-localize="zdy.xgzjmm">修改资金密码</h1>
		        <article>
		            <img src="/template/mb/images/user/jitou.png">
		        </article>
		    </div>
		    <?php endif; ?>
		</div>
		<div class="content-box">
		    <div class="content-box-list" @click="langmask()">
		        <h1 data-localize="index.language">语言切换</h1>
		        <article>
		            <span>{{lang}}</span>
		            <img src="/template/mb/images/user/jitou.png">
		        </article>
		    </div>
		    
		</div>
		<div class="btns jump" data-href="<?php echo url('index/logout'); ?>" data-localize="index.logout">退出登录</div>

		
	
	
		
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
	
 <script type="text/javascript" src="/template/mb/lib/vue.min.js"></script>
	<script>
	    new Vue({
	        el:"#home",
	        data:{
	            userid:"",
	            phone:"",
	            email:'',
	            username:'',
	            code:'',
	            lang:"",
	            langtxt:[{"txt":'中文简体','lang':"zh"},{"txt":'English',"lang":"en"}],
	            langIndex:0,
	            langBool:false,
	        },
	        mounted(){
	            if(localStorage.getItem('language')=="zh"){
	                this.lang="中文简体";
	                this.langIndex=0;
	            }
	            
	            if(localStorage.getItem('language')=="en"){
	                this.lang="English";
	                this.langIndex=2;
	            }
	            this.init();
	        },
	        methods:{
	            
	            tabLang(lang){
	                setLocal('language', lang);
    	            setLang(lang)
    	            location.reload();
	            },
	            langmask(){
	              this.langBool=!this.langBool  
	            },
	            init(){
    	            let that = this;
        			initDataTokens({
        				url: 'user/info'
        			}, function (res) {
        			    that.userid=res.message.id;
        			    that.phone=res.message.phone;
        			    that.email=res.message.email;
        			    that.username=res.message.userreal_name
        			})  
	            },
	        }
	    })
	</script>

</body>
</html>