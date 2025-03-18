<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:76:"/www/wwwroot/www.1.com/public/../application/admin/view/dashboard/index.html";i:1718292245;s:65:"/www/wwwroot/www.1.com/application/admin/view/layout/default.html";i:1718292239;s:62:"/www/wwwroot/www.1.com/application/admin/view/common/meta.html";i:1718292246;s:64:"/www/wwwroot/www.1.com/application/admin/view/common/script.html";i:1718292246;}*/ ?>
<!DOCTYPE html>
<html lang="<?php echo $config['language']; ?>">
    <head>
        <meta charset="utf-8">
<title><?php echo (isset($title) && ($title !== '')?$title:''); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="renderer" content="webkit">

<link rel="shortcut icon" href="/assets/img/favicon.ico" />
<!-- Loading Bootstrap -->
<link href="/assets/css/backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.css?v=<?php echo \think\Config::get('site.version'); ?>" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
<!--[if lt IE 9]>
  <script src="/assets/js/html5shiv.js"></script>
  <script src="/assets/js/respond.min.js"></script>
<![endif]-->
<script type="text/javascript">
    var require = {
        config:  <?php echo json_encode($config); ?>
    };
</script>
    </head>

    <body class="inside-header inside-aside <?php echo defined('IS_DIALOG') && IS_DIALOG ? 'is-dialog' : ''; ?>">
        <div id="main" role="main">
            <div class="tab-content tab-addtabs">
                <div id="content">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <section class="content-header hide">
                                <h1>
                                    <?php echo __('Dashboard'); ?>
                                    <small><?php echo __('Control panel'); ?></small>
                                </h1>
                            </section>
                            <?php if(!IS_DIALOG && !$config['fastadmin']['multiplenav']): ?>
                            <!-- RIBBON -->
                            <div id="ribbon">
                                <ol class="breadcrumb pull-left">
                                    <li><a href="dashboard" class="addtabsit"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
                                </ol>
                                <ol class="breadcrumb pull-right">
                                    <?php foreach($breadcrumb as $vo): ?>
                                    <li><a href="javascript:;" data-url="<?php echo $vo['url']; ?>"><?php echo $vo['title']; ?></a></li>
                                    <?php endforeach; ?>
                                </ol>
                            </div>
                            <!-- END RIBBON -->
                            <?php endif; ?>
                            <div class="content">
                                <style type="text/css">
    .sm-st {
        background: #fff;
        padding: 20px;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        margin-bottom: 20px;
        -webkit-box-shadow: 0 1px 0px rgba(0, 0, 0, 0.05);
        box-shadow: 0 1px 0px rgba(0, 0, 0, 0.05);
    }

    .sm-st-icon {
        width: 60px;
        height: 60px;
        display: inline-block;
        line-height: 60px;
        text-align: center;
        font-size: 30px;
        background: #eee;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        float: left;
        margin-right: 10px;
        color: #fff;
    }

    .sm-st-info {
        font-size: 12px;
        padding-top: 2px;
    }

    .sm-st-info span {
        display: block;
        font-size: 24px;
        font-weight: 600;
    }

    .orange {
        background: #fa8564 !important;
    }

    .tar {
        background: #45cf95 !important;
    }

    .sm-st .green {
        background: #86ba41 !important;
    }

    .pink {
        background: #AC75F0 !important;
    }

    .yellow-b {
        background: #fdd752 !important;
    }

    .stat-elem {

        background-color: #fff;
        padding: 18px;
        border-radius: 40px;

    }

    .stat-info {
        text-align: center;
        background-color: #fff;
        border-radius: 5px;
        margin-top: -5px;
        padding: 8px;
        -webkit-box-shadow: 0 1px 0px rgba(0, 0, 0, 0.05);
        box-shadow: 0 1px 0px rgba(0, 0, 0, 0.05);
        font-style: italic;
    }

    .stat-icon {
        text-align: center;
        margin-bottom: 5px;
    }

    .st-red {
        background-color: #F05050;
    }

    .st-green {
        background-color: #27C24C;
    }

    .st-violet {
        background-color: #7266ba;
    }

    .st-blue {
        background-color: #23b7e5;
    }

    .stats .stat-icon {
        color: #28bb9c;
        display: inline-block;
        font-size: 26px;
        text-align: center;
        vertical-align: middle;
        width: 50px;
        float: left;
    }

    .stat {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        display: inline-block;
        margin-right: 10px;
    }

    .stat .value {
        font-size: 20px;
        line-height: 24px;
        overflow: hidden;
        text-overflow: ellipsis;
        font-weight: 500;
    }

    .stat .name {
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .stat.lg .value {
        font-size: 26px;
        line-height: 28px;
    }

    .stat.lg .name {
        font-size: 16px;
    }

    .stat-col .progress {
        height: 2px;
    }

    .stat-col .progress-bar {
        line-height: 2px;
        height: 2px;
    }

    .item {
        padding: 30px 0;
    }
</style>

<div class="panel panel-default panel-intro">
    <div class="panel-heading">
        
        <ul class="nav nav-tabs">
            <li class="active"><a href="#one" data-toggle="tab"><?php echo __('Dashboard'); ?></a></li>
        </ul>
    </div>
    <div class="panel-body">
        <div id="myTabContent" class="tab-content">
        
            <div class="tab-pane fade active in" id="one">
				
				<div class="callout callout-warning">
                  <p>总用户:<?php echo $total_user; ?>&nbsp;&nbsp;&nbsp;&nbsp;用户总余额:<?php echo $total_money; ?></p>
                </div>
                
                <form role="form" data-toggle="validator" method="POST" action="">
		    	<div class="row">
		           <div class="col-md-12 pull-left">
		             <div class="input-group">
		               <span class="input-group-addon"><i class="fa fa-clock-o"></i> 时间</span>
		               <input id="zhangbiantime" type="text" name="time_text" value="<?php echo $time; ?>" class="form-control datetimerange" placeholder="选择时间 ..">
		               <span class="input-group-btn">
		                 <button type="submit" class="btn btn-info btn-flat">查询</button>
		               </span>
		             </div>
		             <br>
		           </div>
		         </div>
		        </form>
  				<div class="row">
		            <div class="col-lg-2 col-xs-6">
		                <!-- small box -->
		                <div class="small-box bg-aqua">
		                    <div class="inner">
		                        <h3><span id="online"><?php echo $data['online']; ?></span><sup style="font-size: 20px"></sup></h3>
		                        <p>在线人数</p>
		                    </div>
		                    <div class="icon">
		                        <i class="ion ion-ios-paperplane"></i>
		                    </div>
		                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		                </div>
		            </div>
		            <!-- ./col -->
		            <div class="col-lg-2 col-xs-6">
		                <!-- small box -->
		                <div class="small-box bg-green">
		                    <div class="inner">
		                        <h3><span id="t_order"><?php echo $data['t_order']; ?></span><sup style="font-size: 20px"></sup></h3>
		                        <p>今日订单</p>
		                    </div>
		                    <div class="icon">
		                        <i class="ion ion-bag"></i>
		                    </div>
		                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		                </div>
		            </div>
		            
		             <!-- ./col -->
		            <div class="col-lg-2 col-xs-6">
		                <!-- small box --> 
		                <div class="small-box bg-yellow">
		                    <div class="inner">
		                        <h3><span id="t_people"><?php echo $data['t_people']; ?></span></h3>
		
		                        <p>今日注册</p>
		                    </div>
		                    <div class="icon">
		                        <i class="ion ion-person-add"></i>
		                    </div>
		                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		                </div>
		            </div>
		            
		            <!-- ./col -->
		            <div class="col-lg-2 col-xs-6">
		                <!-- small box -->
		                <div class="small-box bg-yellow">
		                    <div class="inner">
		                        <h3><span id="t_profit"><?php echo $data['t_profit']; ?></span></h3>
		                        <p>今日盈亏</p>
		                    </div>
		                    <div class="icon">
		                        <i class="ion ion-stats-bars"></i>
		                    </div>
		                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		                </div>
		            </div>
		            <!-- ./col -->
		            <div class="col-lg-2 col-xs-6">
		                <!-- small box -->
		                <div class="small-box bg-red">
		                    <div class="inner">
		                        <h4><span style="">CNY:&nbsp;&nbsp;</span><span id="t_recharge"><?php echo $data['t_recharge']; ?></span></h4>
		                        <h4><span style="">USDT:&nbsp;&nbsp;</span><span id="t_recharge_usdt"><?php echo $data['t_recharge_usdt']; ?></span></h4>
		                        <p>今日充值</p>
		                    </div>
		                    <div class="icon">
		                        <i class="ion ion-android-arrow-dropup-circle"></i>
		                    </div>
		                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		                </div>
		            </div>
		            <!-- ./col -->
		            
		            <div class="col-lg-2 col-xs-6">
		                <!-- small box -->
		                <div class="small-box bg-red">
		                    <div class="inner">
		                        <h4><span style="">CNY:&nbsp;&nbsp;</span><span id="t_withdraw"><?php echo $data['t_withdraw']; ?></span></h4>
		                        <h4><span style="">USDT:&nbsp;&nbsp;</span><span id="t_withdraw_usdt"><?php echo $data['t_recharge_usdt']; ?></span></h4>
		                        <p>今日提现</p>
		                    </div>
		                    <div class="icon">
		                        <i class="ion ion-android-arrow-dropdown-circle"></i>
		                    </div>
		                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		                </div>
		            </div>
		            
		            
		            <!-- ./col -->
		        </div>

    
                
            </div>
            <div class="tab-pane fade" id="two">
                <div class="row">
                    <div class="col-xs-12">
                        <?php echo __('Custom zone'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="box">

     <div class="box-body">
         <div class="row">
		    <div class="col-lg-6 col-xs-6">
		         <h4>财务7天图形报表</h4>
		         <div id="echart1" class="btn-refresh" style="height:200px;width:100%;"></div>
     		</div>
     		
     		<div class="col-lg-6 col-xs-6">
     		    <h4>订单7天图形报表</h4>
		         <div id="echart2" class="btn-refresh" style="height:200px;width:100%;"></div>
     		</div>
     		
 		 </div>
     </div>
</div>

</div>
<script type="text/javascript" src="/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="/assets/js/clipboard.min.js"></script>

<script>
    var chatdata = <?php echo $chatdata; ?>;
</script>
<script type="text/javascript">


var clipboard = new Clipboard('.copy-span', {
	
});

clipboard.on('success', function(e){	
	alert('复制成功');
});

clipboard.on('error', function(e) {
	alert('复制失败');
});
</script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="/assets/js/require<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js" data-main="/assets/js/require-backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo \think\Config::get('site.version'); ?>"></script>
    </body>
</html>