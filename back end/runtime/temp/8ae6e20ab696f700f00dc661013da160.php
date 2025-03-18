<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:48:"../application/index/view/default/user/user.html";i:1705055405;s:72:"/www/wwwroot/www.1.com/application/index/view/default/public/layout.html";i:1706520753;}*/ ?>
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
    .header-bg{
        width: 100%;
    }
    .header-bg-img{
        width: 100%;
       height: 110px;
      border-radius: 10px;
    }
    .header-info{
        position: absolute;
        top: 60px;
        width: 100%;
        text-align: center;
    }
    .header-info img{
        width: 70px;
        height: 70px;
        margin: 0 auto 10px;
        display: block;
    }
    .header-info span{
        display: block;
        font-size: 16px;
        color:#333;
        margin-bottom: 5px;
    }
    .header-info em{
        background: #d5e7ff;
        color: #588bf7;
        padding: 2px 10px;
        border-radius: 20px;
        margin: 2px;
        display: inline-block;
    }
    .header-setting{
        position: absolute;
        width: 25px;
        height: 25px;
        right: 4%;
        top: 15px;
        z-index: 9;
    }
    .header-setting img{
        width: 100%;
        height: 100%;
    }
    .content{
        position: relative;
        margin-top:112px;
    }
    .content-box{
        border-radius: 10px;
        background: #fff;
        margin: 20px 3%;
    }
    .content-box-list:last-child .content-box-list-right{
        border-bottom: 0;
    }
    .content-box-list{
        display: flex;
        flex-direction: row;
        padding: 5px 2%;
        align-items: center;
    }
    .content-box-list-left img{
        width: 25px;
        height: 25px;
    }
    .content-box-list-right{
        width: 88%;
        margin-left: 3%;
        border-bottom:1px solid #eee;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        padding-bottom: 10px;
        margin-top: 10px;
    }
    .content-box-list-right h1{
        font-size: 16px;
    }
    .content-box-list-right article img{
        width: 20px;
        height: 20px;
    }
    .content-box-list-right article span{
        color: #90a2b0;
    }
    .content-box-list-right article{
        display: flex;
        flex-direction: row;
        align-items: center;
    }
    .with-s{
        width: 55%;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
            margin: 15px auto 0;
    }
    .with-s a{
        /*background: rgb(227,74,64);*/
        /*padding: 7px 20px;*/
        /*color: #fff;*/
        /*border-radius: 5px;*/
    }
    .with-s a img{
      width: 30px;
      height: 30px;
    }
    .with-s a span{
        
    }
</style>

</head>

<body>
	<div id="home">
		
		
	<div class="header-setting jump" data-href="<?php echo url('user/setting'); ?>">
	        <img src="data:image/png;base64,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">
	    </div>
        <div class="header-bg">
            <!--<img src="images/new/mine_qz_top_bg.c4b8221.png" class="header-bg-img">-->
            <img src="/template/mb/images/personal_top.png" class="header-bg-img">
            <div class="header-info">
                <img src="/template/mb/images/user_avatar.png">
                <span><?php echo $user['real_name']; ?></span>
                <div style="padding:0 30px">
                    <!--<em>ID:<?php echo $user['id']; ?></em>-->
                    <!--<em>等级:<?php echo getUserLevel($user['level']); ?></em>-->
                    <em>余额:<?php echo $user['money']; ?></em>
                    <em>不可用金额:<?php echo $user['freeze_funds']; ?></em>
                </div>
                <!--<div style="margin-top:10px">-->
                <!--    <em>余额:<?php echo $user['money']; ?>&nbsp;&nbsp;冻结:<?php echo $user['freeze_funds']; ?></em>-->
                <!--</div>-->
                 
          
                
            </div>
        </div>
        <div class="content">
            <div class="content-box">

                <!--div class="content-box-list jump" data-href="<?php echo url('user/chat'); ?>">
                    <div class="content-box-list-left">
                    <img src="data:image/png;base64,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">
                    </div>
                    <div class="content-box-list-right">
                        <h1 data-localize="zdy.czkefu">充值客服</h1>
                        <article>
                            <img src="/template/mb/images/user/jitou.png">
                        </article>
                    </div>
                </div-->
                    <div class="content-box-list jump"  data-href="<?php echo $kefu; ?>" >
                    <div class="content-box-list-left">
                    <img src="data:image/png;base64,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">
                    </div>
                    <div class="content-box-list-right">
                        <h1 data-localize="zdy.fulikefu">专属客服</h1>
                        <article>
                            <img src="/template/mb/images/user/jitou.png">
                        </article>
                    </div>
                </div>
                <!--data-href="<?php echo url('user/recharge', array('type'=>'bank')); ?>"-->
                <div class="content-box-list jump" data-href="<?php echo url('user/shiming'); ?>">
                   <div class="content-box-list-left">
                   <svg t="1695468734695" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="4513" width="25" height="25"><path d="M832 160h-640A128.1 128.1 0 0 0 64 288v448a128.1 128.1 0 0 0 128 128h640A128.1 128.1 0 0 0 960 736V288A128.1 128.1 0 0 0 832 160z m64 576a64.1 64.1 0 0 1-64 64h-640a64.1 64.1 0 0 1-64-64V288a64.1 64.1 0 0 1 64-64h640a64.1 64.1 0 0 1 64 64z" fill="#1296db" p-id="4514"></path><path d="M697.7 482.8a112 112 0 1 0-179.4 0A224.3 224.3 0 0 0 384 688a32 32 0 0 0 64 0 160 160 0 0 1 320 0 32 32 0 1 0 64 0 224.3 224.3 0 0 0-134.3-205.2zM560 416a48 48 0 1 1 48 48 48 48 0 0 1-48-48zM224 416h192a32 32 0 0 0 0-64H224a32 32 0 0 0 0 64zM352 480H224a32 32 0 0 0 0 64h128a32 32 0 0 0 0-64zM288 608h-64a32 32 0 1 0 0 64h64a32 32 0 0 0 0-64z" fill="#1296db" p-id="4515"></path></svg>
                   </div>
                   <div class="content-box-list-right">
                       <h1 >实名认证</h1>
                       <article>
                           <img src="/template/mb/images/user/jitou.png">
                       </article>
                   </div>
                </div>
                <div class="content-box-list jump" data-href="<?php echo $kefu; ?>" >
                   <div class="content-box-list-left">
                   		  <img src="data:image/png;base64,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">
                   </div>
                   <div class="content-box-list-right">
                       <h1 data-localize="assets.cmoney">充值</h1>
                       <article>
                           <img src="/template/mb/images/user/jitou.png">
                       </article>
                   </div>
                </div>
                
                <div class="content-box-list jump" data-href="<?php echo url('user/withdraw'); ?>">
                   <div class="content-box-list-left">
                   <img src="data:image/png;base64,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">
                   </div>
                   <div class="content-box-list-right">
                       <h1 data-localize="assets.tmoney">提现</h1>
                       <article>
                           <img src="/template/mb/images/user/jitou.png">
                       </article>
                   </div>
                </div>
                <!-- <div class="content-box-list jump" data-href="<?php echo url('user/wallet'); ?>">
                   <div class="content-box-list-left">
                   <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC4AAAAuCAYAAABXuSs3AAADYklEQVRoQ+3ZS2gTURQG4P/c0XbGWAVf+BZF0I1uRK0UxI2gIi4Umyjqxk3Ft2amFTdZqDSJoCiK4mPhJjOICIoILrS6ERS6UhQUKq58FN+ZiZrMkURbm/joHU1uG8jsEs4995szJ/cON4QqvahK3ajB5Z4cU/hwZj0YbQTMYuaHgGh1LP2G3PifUcoqvjbpLtJARwAsLEbSV6ZckxMN3Q+Crzh8bbs7VRPUzoQI4fetycydjmvMR4x8WXzF4BuTHPqKTCuD9hJ4WL8goi12VD/Vb9yPgArAmZrj6U0ktIMETJKFMPiNoOysVHREt8yYssKbE26ToEIfz5eZvDSGgdOOabTIjC0LPBJPT4QQh8AI/88Cy4xLjmVs+Gf46oPpCXV11AimkTJJKhXjs/9Oy/Ld1P7hL0vnKKr4qvjrhmE0/BgIGwFolQIFyctAFozzrqvvvhojt2dsL3z59if1I6ZM7iBCY5DE6mKp40W6fmlHjLL5OXvh6xKfLSY/rg4SfCZm2uFY+vEieCTpPQIwO3g6lSOo0zb1eaXwHAChkhF0Lma4jmWESuEcNNEAxGds0zBqcIWVr9KKM+7ZllF4Le5dDiNJT1WPvwHzbUA8I8GfZZ8W+/hIdfq51C4q7KJK4Qxc8LXulot7pniy4D/FqYMzvrj8acyV1rEfezBLYl36OH38Am2IeJWK1j8OcjPK4Aw8d0xjWg9u9WFv2lDGLQKmF74jOmFH9W2yeGVwEJ7ZUeM7EkAk6Z0FsLkvlNmf51ihThn8gMHDCe8aEVYUIXP+SrstdG1QwyPJ9GZA5KteuJj59QfXm3k9NvrD4IIzvbUtfVRfVCSebiGhrfHB3dlc9sCltoaHMmj1yyHRCieqX5fF/S1OXY8X2gEuQGcI/l2C/z7HpMvehEbibcrS7wBU2CiVwmWRf46jY7ap76w6OANdjmnMqDp4372gulqlzyZWg///D08iQ63iEkUqa8jvKh5OeGki9H+OXVZJsGQMPHBMY07pcpjfipcFS6U2mkEnHVPfWgRvbvcWCw23BvGhkJfL0tyL+/SnRfD8h3Ais52Ijw46PCMDEutts/5yzzP+5WA/HP/SSMI3wdwEwsCdj+dfpQjdDNyEn213WhvyZ5u9V1n+kVDb6d9nq8FVV/0bxVZfPotAXCYAAAAASUVORK5CYII=">
                   </div>
                   <div class="content-box-list-right">
                       <h1 data-localize="footer.assets">资产</h1>
                       <article>
                           <img src="/template/mb/images/user/jitou.png">
                       </article>
                   </div>
                </div>-->
                <div class="content-box-list jump" data-href="<?php echo url('user/mark'); ?>">
                   <div class="content-box-list-left">
                   <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACoAAAAqCAYAAADFw8lbAAAEoklEQVRYR+2ZW2gcZRiG32+TzRax0ZYc2swiSkQoohdCqxAQ1Ar5Z5GIYow2tIHeRKnxBKaZSXQx3VlbitYWRBBs8SJahWJCM7MxQm8KVfFGBYuiEHBmG21qMFHT7SbzyWx2k82espvdWSl07mbmPzzzvt9/+oZwnVyUyemPhO9k5o8A7CKgphrfwcASEb61uWZfVPT/lKvPLFBJ184Toa0agNl98DemUO8vDtTQ4gTU/h+gzLAtWcnpYrb1hsarkDwas+O9lwPBaTfAG8eD23we7/sAdaTaN4WSxeS8Kwgas69tdwsyBdb0Zai5Lk4rQmwINF+lSqvrT3PxBmgl1K2oon4jdASgFwHUlQkXY+Yjlqy+nmqnwqDaVQC+MiGT1XnOFOot7oDqobeY6AABnnJgE6sQ421TVt5wBbQcuPXqVtT69Tor5/0N0HLUy1W3oor6x7Uwe+AMppK2fsyYY9DeqDzwRb4PrCyoocU2Oocy8JkllM6qgEp66CgR9QHwlmQ9Yxa01G2KIb0qoCXBlVi4otaX2HdJxa8bUCkS7oVtPwHQIxva4VdrP5qSf/vk4R2XHu2/WNSZKZ8NkqENE7gPoHyDada2uScaUCdL8r3IwgWPIumK+o2idk9nTKE8ma/vrXqw/iaq7WF4Ogh8L0D1ADvz7A9EPPqvHT/5pxycK09RPXQMy7unnBM+M+aZ0B0VyliujlqMUBeBjhPQmF9EmrGBvqgY+DizTNGKFulQzmKSHlYB+00ichYN59qUcbB0Tr7Ofhe8vDEPWkI5lN6Y66AtE+GnPTY7CsUWQTumxcCUZGinCNiXBjJhCqX9trPhLXaN/QtAW0DcbbarI6kyroI2jB7e7Ktb+jVlNzNOW7LSlUwbXUwmOpiBNksoF6RI+Cgxv5qEu/LPvKd1tvPgX869q6B+PfQCiI6nKbcKZYRPErgH4AlTqO3NY8N3eL01ztS0ctxhtl+25MFjroNKhjZJwO70WGPggiWUNn8k3Arwj2zbD1ry4Fd+Q3Nsfiaj7DlLKA+7DxrRponRnDnCbLa7ovLgaf946FkzoI5sM8I7a8Ff53D4iimUBtdB/Ya2kBzhCVYG/03ACANTllDDqQ/wG9p+gHeBEQCRlHrOwKIllMQC42qMShmKMvMMiJ9PgFDtz1b7we+a9OFWL9F9iUfsGQLhnjQHqqNorhhdVYvescTAK5KuPUeE93JNwAxUJ0Zb9EMHPOQ5sQrHv3k3xe9y7qeARTwUXMSnT9Xc3nh3wt7FmPcMmMQKtM0vmQH13XWtLzft2DD62mZf3a3p86iTAv99GYQ/MIUalCKhvcSUitetqZh2wmQB8dbU2l84kcv4/Fod9/6xW002nsugws+k8VAneeiTzPHAKGg927a9JxoYXFnzs3P4ZabGmXHWkpXH0vElXVOI4KzdK/0x+DwxzgJ4AESPr1kUmIYseSCU3oYrPxts5v1RWf1wDWwk1AmmEwQ05fOAgcsM7osK1XFgzVXo983OMn46xJbAHZeEOpHeW+O54M2+BV8PE3c40xAx6hmYB/A9MY9djdeemunod+6zrpyJ/dIj0f0a/wGgBIhJ79z2YwAAAABJRU5ErkJggg==">
                   </div>
                   <div class="content-box-list-right">
                       <h1 data-localize="assets.caidata">资金明细</h1>
                       <article>
                           <img src="/template/mb/images/user/jitou.png">
                       </article>
                   </div>
                </div>
	            <div class="content-box-list jump" data-href="<?php echo url('user/credit_score'); ?>">
					<div class="content-box-list-left">
					    <svg t="1691662507306" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="6156" width="23" height="23"><path d="M950.857143 0a73.142857 73.142857 0 0 1 73.142857 73.142857v727.552a73.142857 73.142857 0 0 1-50.029714 69.339429l-438.857143 146.285714a73.142857 73.142857 0 0 1-46.299429 0l-438.857143-146.285714a73.142857 73.142857 0 0 1-50.029714-69.339429V73.142857a73.142857 73.142857 0 0 1 73.142857-73.142857z m-12.214857 85.357714H85.284571v706.779429L512 934.326857l426.642286-142.189714V85.357714z" fill="#1cb787" p-id="6157"></path><path d="M506.148571 315.026286a45.933714 45.933714 0 0 0-33.792 25.307428l-50.907428 102.765715-113.664 16.384a45.933714 45.933714 0 0 0-37.083429 31.232l-1.755428 7.241142a45.933714 45.933714 0 0 0 13.312 39.862858L364.251429 618.057143l-19.456 113.371428a45.933714 45.933714 0 0 0 18.285714 44.909715l6.290286 3.876571c13.092571 6.582857 28.745143 6.582857 41.984-0.365714l101.814857-53.394286 101.668571 53.613714c15.36 8.192 34.157714 6.875429 48.420572-3.437714l5.632-4.827428a45.933714 45.933714 0 0 0 12.580571-40.228572l-19.382857-113.152 82.505143-80.091428a45.933714 45.933714 0 0 0 11.702857-47.104l-2.925714-6.802286a45.933714 45.933714 0 0 0-34.157715-24.429714l-113.737143-16.749715-50.614857-102.985143a45.860571 45.860571 0 0 0-41.252571-25.746285l-7.387429 0.585143z m-36.132571 194.925714l43.52-88.064 43.227429 88.137143 97.206857 14.262857-70.363429 68.461714 16.530286 96.841143-86.893714-45.787428-87.04 45.568 16.749714-96.694858-70.217143-68.681142 97.28-14.043429z" fill="#1cb787" p-id="6158"></path><path d="M213.138286 255.853714h597.357714a42.642286 42.642286 0 1 0 0-85.357714H213.138286a42.642286 42.642286 0 0 0 0 85.357714z" fill="#1cb787" p-id="6159"></path></svg>
					    <!--<img src="data:image/png;base64,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">-->
					</div>
					<div class="content-box-list-right">
						<h1 >信誉分</h1>
						<article>
							<img src="/template/mb/images/user/jitou.png">
						</article>
					</div>
				</div>

			<!--	<div class="content-box-list jump" data-href="<?php echo url('user/exchange'); ?>">
					<div class="content-box-list-left">
						<img src="data:image/png;base64,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">
					</div>
					<div class="content-box-list-right">
						<h1 data-localize="zdy.duihuan">兑换</h1>
						<article>
							<img src="/template/mb/images/user/jitou.png">
						</article>
					</div>
				</div>-->
				
		
				<div class="content-box-list jump" data-href="<?php echo url('user/orderlist'); ?>">
                   <div class="content-box-list-left">
                   <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACoAAAAqCAYAAADFw8lbAAAEoklEQVRYR+2ZW2gcZRiG32+TzRax0ZYc2swiSkQoohdCqxAQ1Ar5Z5GIYow2tIHeRKnxBKaZSXQx3VlbitYWRBBs8SJahWJCM7MxQm8KVfFGBYuiEHBmG21qMFHT7SbzyWx2k82espvdWSl07mbmPzzzvt9/+oZwnVyUyemPhO9k5o8A7CKgphrfwcASEb61uWZfVPT/lKvPLFBJ184Toa0agNl98DemUO8vDtTQ4gTU/h+gzLAtWcnpYrb1hsarkDwas+O9lwPBaTfAG8eD23we7/sAdaTaN4WSxeS8Kwgas69tdwsyBdb0Zai5Lk4rQmwINF+lSqvrT3PxBmgl1K2oon4jdASgFwHUlQkXY+Yjlqy+nmqnwqDaVQC+MiGT1XnOFOot7oDqobeY6AABnnJgE6sQ421TVt5wBbQcuPXqVtT69Tor5/0N0HLUy1W3oor6x7Uwe+AMppK2fsyYY9DeqDzwRb4PrCyoocU2Oocy8JkllM6qgEp66CgR9QHwlmQ9Yxa01G2KIb0qoCXBlVi4otaX2HdJxa8bUCkS7oVtPwHQIxva4VdrP5qSf/vk4R2XHu2/WNSZKZ8NkqENE7gPoHyDada2uScaUCdL8r3IwgWPIumK+o2idk9nTKE8ma/vrXqw/iaq7WF4Ogh8L0D1ADvz7A9EPPqvHT/5pxycK09RPXQMy7unnBM+M+aZ0B0VyliujlqMUBeBjhPQmF9EmrGBvqgY+DizTNGKFulQzmKSHlYB+00ichYN59qUcbB0Tr7Ofhe8vDEPWkI5lN6Y66AtE+GnPTY7CsUWQTumxcCUZGinCNiXBjJhCqX9trPhLXaN/QtAW0DcbbarI6kyroI2jB7e7Ktb+jVlNzNOW7LSlUwbXUwmOpiBNksoF6RI+Cgxv5qEu/LPvKd1tvPgX869q6B+PfQCiI6nKbcKZYRPErgH4AlTqO3NY8N3eL01ztS0ctxhtl+25MFjroNKhjZJwO70WGPggiWUNn8k3Arwj2zbD1ry4Fd+Q3Nsfiaj7DlLKA+7DxrRponRnDnCbLa7ovLgaf946FkzoI5sM8I7a8Ff53D4iimUBtdB/Ya2kBzhCVYG/03ACANTllDDqQ/wG9p+gHeBEQCRlHrOwKIllMQC42qMShmKMvMMiJ9PgFDtz1b7we+a9OFWL9F9iUfsGQLhnjQHqqNorhhdVYvescTAK5KuPUeE93JNwAxUJ0Zb9EMHPOQ5sQrHv3k3xe9y7qeARTwUXMSnT9Xc3nh3wt7FmPcMmMQKtM0vmQH13XWtLzft2DD62mZf3a3p86iTAv99GYQ/MIUalCKhvcSUitetqZh2wmQB8dbU2l84kcv4/Fod9/6xW002nsugws+k8VAneeiTzPHAKGg927a9JxoYXFnzs3P4ZabGmXHWkpXH0vElXVOI4KzdK/0x+DwxzgJ4AESPr1kUmIYseSCU3oYrPxts5v1RWf1wDWwk1AmmEwQ05fOAgcsM7osK1XFgzVXo983OMn46xJbAHZeEOpHeW+O54M2+BV8PE3c40xAx6hmYB/A9MY9djdeemunod+6zrpyJ/dIj0f0a/wGgBIhJ79z2YwAAAABJRU5ErkJggg==">
                   </div>
                   <div class="content-box-list-right">
                       <h1 data-localize="td.drecord">订单记录</h1>
                       <article>
                           <img src="/template/mb/images/user/jitou.png">
                       </article>
                   </div>
                </div>
               
                
                <div class="content-box-list jump" data-href="<?php echo url('user/share'); ?>">
                    <div class="content-box-list-left">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACoAAAAqCAYAAADFw8lbAAAEPElEQVRYR+2YXWgcVRTH/+emoZqYsrA7SSCIQYQqrVozE6H4oqAoER+azG7tRkSkCvWjtL4l4otY0Ae/XqrUFxEssjtJq/UD+6CiNVR3J2pSKhHxxTRmO1saAvnYr3tkQ3Y7u9nNft0tBpy3mXvuub/7n3vOvfcQtshDW4QTWxuUv7xte3xpxyGQGAawC8CN5ZQn8Os+0x5p9p/ZoGg8dHePpNbPibCnmsEZWOk0o23V2DZiUwC6puSy52cAd1XrtB5FF0/qvsR2Og9GL5htkRam90Dk783GLAB1wsYREN52dZiRLEd5R/rr7oenlqqFr2TnhPQgBH2ct2PEGNLf6Z/8ofwSc7U4lhEBYKx9YswsJxN7bxmevlpp4Frb4+H+QSYec/cjIJmRfKQrYL9Xyl+hopaxnAscIjnoG5o8VSvEZvbZ9Q9qNZgwAODZ0rb8gU+uvECBi8miiVx7dSyDc2+Z5eRN3U82/rv/Cd2jtZA4KIiCDOyuZuLMmADTUGcgMp+zL1Y0D6qZ0YZyLJ/R264kxQhLeRRE7dUAFtrwJZI06AtEs8FdmPDdijYCGhsz7hOMjwDcWjvgtR7MWBVCBrNLULmi8bD+HIPeAaG1Ech8X8KcNhTtUQoaC+uvCqJXlADmnDDPaX5bHejlcN8okTimFBJYkeBgl2mfVqJoLNw3KIgsgBoKwKJJzgKZfZr5S1RJMF053X+zTMspgDzK1GQ+J1MJsyt4IaYsPTmW8RmAxzaDZHCCgAkQJsGYI9AuBp4u0+d9Xy8fJsNOVZXwq0lPsXHjISFxdhPIPwD5plht/cT7xE+LObtSWyjACYAOa2b0RDVbaE0J37GMbwHcv9ExLxAw+o20TwQCyBS3z4f0YEvhoWReSphd+6M/lpt03cEUt/TbGXSxeNMA45wQyQPeoanZcoMujt/rTUg5AaCXGDY45fcFfru02fKpG/SyZbxMwGtu5wz+UPN2PEMPfJdWFljrjuoGdcaMr8B4JB+VzMd9fvt51YANR70T1mdB1LOW44jC3sHIfiLk17hq4LoVjVtGioFtAP+eWU71qzgSNmWNOpaRzXNE6fRe3+O/Zm8GSp542HhDEl4U4Hfdt9u6FXUsPcbAmU7TPqiEcN1JuaNmI6DfZ5B8qtuc/uu/DRrSH9UC9hcqIbO+lCuqGjDn739Q1crWrKiq63ItE3E+3dmBVEf+lOU+wV3XAkQl6Fiob58QYnzdbkVzFd+KQa9LSacU8NVTezzp9LbzIOxcb49qZrS/3F5/FMBbLkczUsoRXk2fbdYWmf3dMtH+YIugYwy6wzX2S5oZzRfsNpQdnSVPhAh3VvpNzWxnxrTWvtBPA38mSiqa/VhrIVc1MAHTRMmB4oN3yevtWkF3xXMIjGFm7CbCDaqB3P6ypRsiXABw0te2cNytZFlFmwnUiG+VBYNGOCr23TKg/wIKOQpJz9dyEQAAAABJRU5ErkJggg==">
                    </div>
                    <div class="content-box-list-right">
                        <h1 data-localize="zdy.fenxiang">我要分享</h1>
                        <article>
                            <img src="/template/mb/images/user/jitou.png">
                        </article>
                    </div>
                </div>
                    <div class="content-box-list jump" data-href="<?php echo url('index/help'); ?>">
                    <div class="content-box-list-left">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACoAAAAqCAYAAADFw8lbAAAD4klEQVRYR+2ZX2gUVxTGv3N3UhMT2io+2NIH9aF/og8RKaK+NDazFmm0YpZkEndXWrDYl1qhlNKHbihY6EtT0oIRCs5u15k1aCmhpWZCo4WqpCEgxj74UOsfsFCQpopGsnNPmdldu9nMmgmdTUjY+zh77nd/+91z7845S1gkgxYJJ5YAaCIhtG3X9gDQwLyZCasJpAS8AzYDfxHhV2Zp/qncPHm2+WzWaw1PRyNDXY0KK2kATQGDzSZ3WUrZmdmRGi8NnAHa8UNsI9XQTwCedoKZ8QsTm6GQ+F1Kfq7cSsTcA1AdA2Mg9JWPw5cAagg4KgnjYLxIwF4Az+TnTEhhb8+8+s1YscY00NaB1uX1tSvGCbQWwKS08XbmNT05mw3O55oV/xvAUwBOGareVm6OZsUfAKglyL0n1NRpJy5yMlKnrKz7FEzvuvMYf9x7uGz9QOux+wWdaaCaFT0EiM9zTsqYGU6l/ED+X9DCGtpQrKcAS8yHToSTX5QBjZ8HsMXZPlPVN/mFDAo0eiZanyW6CaIVAF8w1OTWMqCxuwA1MPMRM5z8aL5B3S88GPsORLsA3DVU/clyjnIuRXDYVHU3BfwOrxztOLNvK1FoixQ8kGlJXs07PyNHi9fQrNjXAL3pPDNU/VFqluRo3AUF6D1DPd7jF7J06yelfGeZEJ8Q4y0QQgzOgqjvCfDHU0y3Sg/TgoAycIMAZ8vc6w3AlHMd5Q4o7hC5N0Oo+NQvCOijRZlvS0HvkwwNk7B7wIgUAy0YaIcVHyHgZddB5l6RtbvTO9P/FOA6B6M7JcRXRFgDwJZSNnn9AlU+R4e1VTyltNlC/tzfkv7NK79bRw8sb7gz2SlJjGfU4xe9YioOOpeD97jYKmhQThZ0qo5WHa3UT2hQzlZzNCgnq6c+aCeXuqP4kcGeLw2VcrKgS8BugDb6fMOvNI4//VlLEQZfJeCGP7mgo6gRwLM+HZ17zRQUrs8LP18ug7tNNZkIavG56HQMxvqJqI2B+6aq1xfl7n8ympVrQAB8zlCTr8xlgSBiN/UdqHl+3cPruT4Ujxpq0ilt3FG+pQO8bqr690EA+NXQhuIfgnHEjWd8YIT1zzxBnSZZQ+3KywDWAZhgoGu+YNut+EEB9DqlNMDXs8qDDf3N/fc8QZ2HkcH9TQrxcL4uZwYsSJwi2NfskMg3KPx69Pg4kiQE8wssKJqvYJ0JE8yyxQynRotnezZy263oSwKULly8wWDNrsLMl0ihLmO7fqU0unwPPwHRvm3/G8RSA2gzCawG5zoeAY4pBm6DMSIJZmPL2m8TlJBe+kvgz4YAbQtCatE4+i/dRi5JCLba5AAAAABJRU5ErkJggg==">
                    </div>
                    <div class="content-box-list-right">
                        <h1 data-localize="index.helpcenter">帮助中心</h1>
                        <article>
                            <img src="/template/mb/images/user/jitou.png">
                        </article>
                    </div>
                </div>

                
            </div>
        
                </div>
               
                
            </div>
        </div>
        <div style="height:50px"></div>
        

		
	
	
		
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
	
    <script type="text/javascript" src="/template/mb/lib/vue.min.js"></script>
    <script>
        //var token = get_user_login();
        var vue = new Vue({
            el: '#app',
            data: {
                tabList: [],
                detailList: [],
                selectId: 0,
                dataList: [],
                tabType: 'microtrade',
            },
            filters: {
                toFixeds1: function (value) {
                    var vals = iTofixed(value,8);
						return vals;
                },
                toFixed2: function (value) {
                    var vals = iTofixed(value,2);
						return vals;
                },
                toFixed4: function (value) {
                    var vals = iTofixed(value,4);
						return vals;
                },
                toFixed4s: function (value) {
                    var vals = iTofixed(value,0);
						return vals;
                }
            },
            mounted: function () {
                let that = this;
               
            },
            methods: {
                currencyQuotationSuccess(res) {
                    let that = this;
                    if (res.type == 'ok') {
                        that.socket(token);
                        that.tabList = res.message;
                        if (res.message.length > 0) {
                            that.selectId = res.message[0].id;
                            that.detailList = res.message[0];
                            that.dataList = res.message;
                        }
                    }
                },
                // 资产切换
                tab(ids) {
                    let that = this;
                    that.selectId = ids;
                    let lists = that.tabList;
                    for (i in lists) {
                        if (ids == lists[i].id) {
                            that.detailList = lists[i];
                        }
                    }
                },
                selectTab(types) {
                    var that = this;
                    that.tabType = types;
                },
                //socket连接封装
                socket(token) {
                    let that = this;
                }
            }
        });
    </script>

</body>
</html>