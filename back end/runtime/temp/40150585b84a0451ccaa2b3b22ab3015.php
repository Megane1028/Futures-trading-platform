<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:53:"../application/index/view/default/user/orderlist.html";i:1706528634;s:72:"/www/wwwroot/www.1.com/application/index/view/default/public/layout.html";i:1706520753;}*/ ?>
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

<link rel="stylesheet" href="/template/mb/element-ui/lib/theme-chalk/index.css" />
<link rel="stylesheet" type="text/css" href="/template/mb/css/mescroll.min.css" />
<style>
		.order-list-tab {
			width: 100%;
			position: fixed;
			top: 40px;
			line-height: 40px;
			border-bottom: 1px solid #f1f1f1;
			background-color: #fff;
			z-index: 1;
		}

		.order-list-tab p {
			width: 50.0%;
		}

		.order-list-tab .active {
			color: #588bf7;
			border-bottom: 2px solid #588bf7;
		}

		.header-space {
			height: 88px;
		}

		.list {
			padding: 0 3%;
		}

		.list li {
		    background: #fff;
		    border-radius: 10px;
		    margin-bottom: 10px;
			border-bottom: 1px solid #f1f1f1;
			position: relative;
		}

		.progres {
			position: absolute;
			right: 0;
			bottom: -5px;
			width: auto;
			height: 10px;
		}

		.progres img {
			width: 10px;
			height: 10px;
			position: relative;
			left: 0;
			z-index: 1;

		}

		.progres p {
			width: calc(100%);
			height: 4px;
			background-color: #588bf7;
			position: relative;
			top: 3px;
			right: 0;
		}

		.list img {
			position: relative;
			top: -1px;
		}

		.order-header {
		    display: flex;
		    flex-direction: row;
		    justify-content: space-between;
		    align-items: center;
			padding: 10px 5%;
		}
		.qianlan{
		    color: #62759a;
		}
		.cts{
		    display: flex;
		    flex-direction: row;
		    justify-content: space-between;
		    padding: 7px 5%;
		}
		.header h4{
		    font-size: 16px;
		}
	</style>

</head>

<body>
	<div id="home">
		
		
        <header class="header">
			<a class="back" href="javascript:history.back(-1)">

			</a>
			<h4 class="bold ft18" data-localize="contract.chicang">持仓</h4>
		</header>
		<div class="flex between order-list-tab">
			<p class="tc" :class="[{'active':status == 1}]" @click="tabOrder(1)" data-localize="deals.tding">交易中</p>
			<p class="tc" :class="[{'active':status == 3}]" @click="tabOrder(3)" data-localize="deals.pied">已平仓</p>
		</div>
		<div class="header-space"></div>
		<div id="mescroll" class="mescroll"  style="display:none">
			<ul class="list" v-if="orderList.length > 0">
				<li v-for="(item,index) in orderList" v-if="status==1 || status ==3"
					:key="item.id">
					<div  class="bdb order-header">
						<div class="flex">{{item.title|| ''}}</div>
						<div class="flex qianlan ">{{item.buy_time}}</div>
					</div>
				
					<div class="flex cts mt5">
						<!--<p class="mr10" data-localize="contract.delegateDirection">{{getlg('delegateDirection')}}</p>-->
						<!--<p :class="item.type == 1?'green':'red'">{{item.type_name}} <img v-if="item.type == 1"-->
						<!--		width="10" src="images/buy.png" alt=""> <img v-else width="10" src="images/sell.png"-->
						<!--		alt=""></p>-->
						<p  class="qianlan">{{getlg('mrfx')}}</p>
						<p :style="item.type == 1?'color:#ea4d3d':'color:#59bb5f'">{{item.type==1?getlg('md'):getlg('mk')}}</p>
					</div>
				    
					<div class="flex cts ">
						<p class="qianlan">{{getlg('mrje')}}</p>
						<p class="qianlan">{{parseInt(item.number/1) || '0' | toFixedNum}}</p>
					</div>
					<div class="flex cts ">
						<p class="qianlan">{{getlg('mrjg')}}</p>
						<p class="qianlan">{{item.open_price || '0' | toFixed4}}</p>
					</div>
					<!-- <div class="flex pl12 mt5">
						<p class="mr10" data-localize="td.ptime">下单时间</p>
						<p>{{item.created_at}}</p>
					</div> -->
					<div class="flex cts " v-if="status == 1" style="display:none;">
						<p class="mr10" data-localize="contract.countDown">{{getlg('countDown')}}</p>
						<p class="times">{{countDown(item.endTime,index,item.seconds)}}</p>
					</div>
					<div class="flex cts " v-if="status == 1"  style="border-top:1px solid #eee">
						<p class="qianlan" style="text-align:center;width: 100%;">{{getlg('dueTime')}}：{{item.sell_time}}</p>
					</div>
					<div class="flex cts " v-else>
						<p class="qianlan">{{getlg('mcjg')}}</p>
						<p class="qianlan">{{item.end_price || '0.0000' |toFixed4}}</p>
					</div>
					<!-- <div class="flex pl12 mt5" v-if="status == 3">
							<p class="mr10" data-localize="deals.fee">手续费</p>
							<p>{{item.fee || '0.00' | toFixeds}}</p>
						</div> -->
					<div class="flex cts " v-if="status == 3">
						<p class="qianlan">{{getlg('loss')}}</p>
						<p :style="item.ploss >=0?'color:#e43e42':'color:#59bb5f'">{{item.end_profit|| '0' | toFixedNum}}</p>
					</div>

					<div class="progres flex" v-if="status == 1">
						<!-- <img src="../images/order-progress.png" alt=""> -->
						<p></p>
						<!-- <el-progress :percentage="item.progress"></el-progress> -->
					</div>
					<div class="flex cts " style="border-top:1px solid #eee" v-if="status == 3">
						<p class="qianlan" style="text-align:center;width: 100%;">{{getlg('mcsj')}}：{{item.sell_time}}</p>
					</div>

				</li>
			</ul>
			<div class="tc mt10" v-if="bool == false" data-localize="transaction.nodata">没有更多记录</div>
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
	
<script type="text/javascript" src="/template/mb/javascripts/mescroll.min.js"></script>
<script type="text/javascript" src="/template/mb/lib/vue.min.js"></script>
<script>
		var vue = new Vue({
			el: '#home',
			data: {
				orderList: [],
				mescroll: null,
				times: '2020-04-10 17:00:00',
				CountDown: '',
				progressWidths: 1,
				status: 1,
				page: 1,
				size:6,
				bool:true,
				set: null,
				out: null,
			},
			filters: {
				toFixedNum: function (value) {
					var vals = iTofixed(value, 0);
					return vals;
				},
				toFixed4: function (value) {
					var vals = iTofixed(value, 4);
					return vals;
				},
				toFixeds: function (value) {
					var vals = iTofixed(value, 2);
					return vals;
				}
			},
			mounted: function () {
				var that = this;
				//that.init();
				
				this.init();
                this.scrollBottom();
           
				
			},
			methods: {
				scrollBottom(){
	        	   $(window).scroll(function () {
	        			
	                   if ($(document).height() - $(this).scrollTop() - $(this).height() == 0 && vue.bool) {
	                	   //页面已滚动到最底部
		       		        if(vue.bool){
		       		        	vue.init();
		       		        }
	                      
	                   }
	               }); 
	       
	    		},
				init() {
					var that = this;
					
					initDatas({
						url: "user/ajax",
						data: {
							request:'orderlist',
							status:that.status,
							page: that.page,
							size: that.size,
						}
					}, function (res) {
						if (res.status) {
							$("#mescroll").show();
							var datas = res.data;
							var nowTime = new Date().getTime();
							var arr = [];
							
							if (datas.length > 0) {
								
								that.orderList = that.orderList.concat(datas);
								that.page++;
								
							} 
							
							if (datas.length < that.size) 
								vue.bool = false;
							
						}
					})
					
					
					


				},
				countDown(val, indexs, seconds) {
					var that = this;
					var timeValue = '';
					var process = 100 / Number(seconds);
					var endItem = val; //获取列表传的截止时间
					var nowItem = new Date().getTime(); //获取当前时间
					var timeSpace = endItem - nowItem; //截止时间减去当前时间
					var seconds = '';
					if (timeSpace > 0) {
						var widths = iTofixed((process * (timeSpace / 1000) - 0), 2);
						$('.list li').eq(indexs).find('.progres').css('width', widths + '%');
						seconds = iTofixed(timeSpace / 1000, 1);
						//  $('.list li').eq(indexs).find('.times').text(seconds + 's');
					} else if (timeSpace <= 0) {
						// 倒计时结束打开
						// clearTimeout(that.set)
						// that.orderList = [];
						// that.init();
						// 或者刷新页面
						//location.reload();
						// $('.list li').eq(indexs).find('.times').text('00');
					}

				},
				Djs_time: function () {
					setInterval(() => {
						var presentTime = new Date().getTime();
						this.CountDown = presentTime
					}, 200);
				},
				tabOrder(types) {
					var that = this;
					that.status = types;
					that.page = 1;
					that.orderList = [];
					vue.bool = true;
					that.init();
					
				}

			}
		});
	</script>

</body>
</html>