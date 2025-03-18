<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:69:"../application/index/view/default/user/withdraw/withdraw_account.html";i:1707134494;s:72:"/www/wwwroot/www.1.com/application/index/view/default/public/layout.html";i:1706520753;}*/ ?>
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

<link rel="stylesheet" type="text/css" href="/template/mb/css/style.css" />
<style>
	    .save button{
	        border-radius: 30px;
	        background: #588bf7;
	    }
	    .receivables input{
	        border-radius: 5px;
	        padding: 10px 5%;
	        background: #f7f7fa;
	        line-height: inherit;
	    }
	    .receivables .title{
	        margin: 0;
	        width: 25%;
	    }
	    .receivables{
	        margin-top: 5px;
	        background: #fff;
	    }
	    .receivables li{
	        display: flex;
	        flex-direction: row;
	        align-items: center;
	        padding: 10px 5%;
	        
            border-bottom: 1px solid #eee;
	    }
	    .receivables div{
	        width: 75%;
	        line-height: inherit;
	        margin-top: 0;
            margin-bottom: 0;
	    }

	</style>

</head>

<body>
	<div id="home">
		
		
	 <header class="header">
			<a class="back mt5" href="javascript:history.go(-1)">
			</a>
			<h4 class="ft16" data-localize="index.pay">收付款方式</h4>
		</header>
		<div class="header-space"></div>
		<ul class="nav receivables">
			<li>
				<p class="title ft16" data-localize="zdy.khm">开户名</p>
				<div class="clearfix">
					<!-- <img src="images/user-icon.png" alt=""> -->
					<input id="name" type="text" placeholder="开户名" data-localize="zdy.khm">
				</div>
			</li>
			<li>
				<p class="title ft16" data-localize="met.open">开户银行</p>
				<div class="clearfix">
					<!-- <img src="images/bank-name.png" alt=""> -->
					<input id="yinhang" type="text" placeholder="请输入开户行名称" data-localize="met.popen">
					<!-- <select id="bank_id_select" name="bank_id" class="flex2 ptb10 plr10">

					</select> -->
				</div>
			</li>
			<!--<li>-->
			<!--	<p class="title ft16" data-localize="met.bank">银行账号</p>-->
			<!--	<div class="clearfix">-->
					<!-- <img src="images/bank.png" alt=""> -->
			<!--		<p id="yinHu_old" style="text-align:left;width:100%"></p>-->
			<!--	</div>-->
			<!--</li>-->
			<li>
				<p class="title ft16">银行账号</p>
				<div class="clearfix">
					<!-- <img src="images/bank.png" alt=""> -->
					<input id="yinHu" type="text" placeholder="请输入开户行账号" data-localize="met.pbank">
				</div>
			</li>
			<li>
				<p class="title ft16" data-localize="met.bank_branch">开户支行</p>
				<div class="clearfix">
					<!-- <img src="images/bank.png" alt=""> -->
					<input id="bank_branch" type="text" placeholder="请输入开户支行名称" data-localize="met.bank_branch">
				</div>
			</li>
			</ul>
			
		
		<!-- 保存按钮 -->
		<div class="save ft15 ftw" style="margin: 35px 20px;">
			<button class="ftw" type="button" @click="add()">保存</button>
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
	
<script type="text/javascript" src="/template/mb/lib/vue.min.js"></script>
<script type="text/javascript" src="/template/mb/lib/keyboard.js"></script>
<script>
    $(function(){

        const name = document.getElementById("name")
       const yinhang = document.getElementById("yinhang")
       const yinHu = document.getElementById("yinHu")
       const bank_branch = document.getElementById("bank_branch")
        yinHu.onclick = function(){
                if(yinHu.value.indexOf('*')!==-1){
                    yinHu.value=''
                }
				new KeyBoard(yinHu);
			};
		yinHu.addEventListener('focus', (e) => {
		    yinHu.blur(); // 阻止手机键盘弹出
		});
		
		
        name.addEventListener("paste", (e) => {
                e.preventDefault(); // 阻止默认粘贴行为
                // 可以选择在这里添加自定义提示，告诉用户粘贴功能被禁用
            });
        
        yinhang.addEventListener("paste", (e) => {
                    e.preventDefault(); // 阻止默认粘贴行为
                    // 可以选择在这里添加自定义提示，告诉用户粘贴功能被禁用
                });
        
        yinHu.addEventListener("paste", (e) => {
                    e.preventDefault(); // 阻止默认粘贴行为
                    // 可以选择在这里添加自定义提示，告诉用户粘贴功能被禁用
                });
        
        bank_branch.addEventListener("paste", (e) => {
                    e.preventDefault(); // 阻止默认粘贴行为
                    // 可以选择在这里添加自定义提示，告诉用户粘贴功能被禁用
                });

    })
   

			var vue = new Vue({
				el: '#home',
				data: {
					List: []
				},
				mounted: function () {
					var self = this;
					
					initDataToken({
		                type:"post",
		                url:"user/ajax",
		                data:{
		                	request:'cash_info'
		                }
		            },function(res){
		            	
		            	if (res.status) {
							var data = res.data.bank;
							if (Object.keys(data).length > 0) {
								// $("#name").val(data.user_name);
								// $("#yinhang").attr("value", data.bank_name);
						
								// $("#yinHu").attr("value", data.account.substr(0,4)+' **** **** ***'+data.account.substr(data.account.length-4));
								//$("#yinHu_old").html(data.account.substr(0,4)+' **** **** ***'+data.account.substr(data.account.length-4));
							
								// $("#bank_branch").attr("value", data.bank_branch);
								// $("input").attr('disabled', true);
								// $("button").attr('disabled', true);
								$("button").html('修改');
							}
							
						} else {
							layer_msg(data.message);
						};
		            });

					
				},
				methods: {
					//跳详情
					particulars: function (id) {
						window.location = 'Transferred.html?Id=' + id;
					},
					add: function () {
						var self = this;
						var name = $("#name").val();
						var yinhang = $("#yinhang").val();
						var yinHu = $("#yinHu").val();
						var bank_branch = $("#bank_branch").val();
						
						if (!name) {
						 	layer_msg('请输入开户名');
						 	return false;
						 }
						 if (!yinhang) {
						 	layer_msg('请输入开户银行名称');
						 	return false;
						 }
						 if (!yinHu) {
						 	layer_msg('请输入银行账户');
						 	return false;
						 }
						 
						 if (!bank_branch) {
						 	layer_msg('请输入开户支行');
						 	return false;
						 }
						 
						 initDatas({
				                type:"post",
				                url:"user/ajax",
				                data:{
				                	request:'cash_save',
				                	account:yinHu,
				                	user_name:name,
				                	bank_name:yinhang,
				                	bank_branch:bank_branch
				                }
				            },function(res){
				            	
				            	if (res.status) {
				            		layer_confirm(res.msg, function () {
										window.history.go(-1);
									});
								} else {
									layer_msg(data.message);
								};
				         });
						
						 
					},
					// 上传图片
					uploads(type) {

					}
		
				}
			});
		</script>

</body>
</html>