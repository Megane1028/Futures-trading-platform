<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:71:"/www/wwwroot/www.1.com/public/../application/admin/view/order/edit.html";i:1718292238;s:65:"/www/wwwroot/www.1.com/application/admin/view/layout/default.html";i:1718292239;s:62:"/www/wwwroot/www.1.com/application/admin/view/common/meta.html";i:1718292246;s:64:"/www/wwwroot/www.1.com/application/admin/view/common/script.html";i:1718292246;}*/ ?>
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
                                <form id="edit-form" class="form-horizontal" role="form" data-toggle="validator" method="POST" action="">

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('User_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-user_id" data-rule="required"  class="form-control" name="row[user_id]" type="text" value="<?php echo htmlentities($row['user_id']); ?>" disabled>
        </div>
    </div>
    
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('User.phone'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-phone" data-rule="required"  class="form-control" name="row[phone]" type="text" value="<?php echo htmlentities($user['phone']); ?>" disabled>
        </div>
    </div>
    
    
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">商品名称:</label>
        <div class="col-xs-12 col-sm-8">

            <select id="c-p_id" data-rule="required" class="form-control selectpicker" name="row[p_id]"> 
                <?php if(is_array($productList) || $productList instanceof \think\Collection || $productList instanceof \think\Paginator): if( count($productList)==0 ) : echo "" ;else: foreach($productList as $key=>$vo): ?>
                <option value="<?php echo $vo['id']; ?>" <?php if(in_array(($vo['id']), is_array($row['p_id'])?$row['p_id']:explode(',',$row['p_id']))): ?>selected<?php endif; ?>><?php echo $vo['code']; ?>/<?php echo $vo['title']; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>            
           
        </div>
    </div>
    
    
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('O_style'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
        	<select id="c-o_style" data-rule="required" class="form-control selectpicker" name="row[c-o_style]">
                <option value="0" <?php if(in_array((0), is_array($row['o_style'])?$row['o_style']:explode(',',$row['o_style']))): ?>selected<?php endif; ?>>买跌</option>
                <option value="1" <?php if(in_array((1), is_array($row['o_style'])?$row['o_style']:explode(',',$row['o_style']))): ?>selected<?php endif; ?>>买涨</option>
            </select>
            
        </div>
    </div>
   
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Buy_money'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-buy_money" class="form-control" step="0.01" name="row[buy_money]" type="number" value="<?php echo htmlentities($row['buy_money']); ?>">
        </div>
    </div>
    
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Buy_price'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-buy_price" class="form-control" step="0.000001" name="row[buy_price]" type="number" value="<?php echo htmlentities($row['buy_price']); ?>">
        </div>
    </div>
    
    
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Sell_price'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-sell_price" class="form-control" step="0.000001" name="row[sell_price]" type="number" value="<?php echo htmlentities($row['sell_price']); ?>">
        </div>
    </div>
    
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Buy_time'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-buy_time" class="form-control datetimepicker" data-date-format="YYYY-MM-DD HH:mm:ss" data-use-current="true" name="row[buy_time]" type="text" value="<?php echo $row['buy_time']; ?>" disabled>
        </div>
    </div>
    
    
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Sell_time'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-sell_time" class="form-control datetimepicker" data-date-format="YYYY-MM-DD HH:mm:ss" data-use-current="true" name="row[sell_time]" type="text" value="<?php echo $row['sell_time']; ?>" disabled>
        </div>
    </div>
    

    
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Ploss'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-ploss" class="form-control" name="row[ploss]" type="number" value="<?php echo htmlentities($row['ploss']); ?>" disabled>
        </div>
    </div>
	<!-- 
	<div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('O_status'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <select id="c-o_status" data-rule="required" class="form-control selectpicker" name="row[o_status]">
                <option value="0" <?php if(in_array((0), is_array($row['o_status'])?$row['o_status']:explode(',',$row['o_status']))): ?>selected<?php endif; ?>>默认</option>
                <option value="1" <?php if(in_array((1), is_array($row['o_status'])?$row['o_status']:explode(',',$row['o_status']))): ?>selected<?php endif; ?>>赢</option>
                <option value="2" <?php if(in_array((2), is_array($row['o_status'])?$row['o_status']:explode(',',$row['o_status']))): ?>selected<?php endif; ?>>亏</option>
            </select>
        </div>
    </div> -->

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Status'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <select id="c-status" data-rule="required" class="form-control selectpicker" name="row[status]" disabled>
                <option value="0" <?php if(in_array((1), is_array($row['status'])?$row['status']:explode(',',$row['status']))): ?>selected<?php endif; ?>>建仓</option>
                <option value="1" <?php if(in_array((3), is_array($row['status'])?$row['status']:explode(',',$row['status']))): ?>selected<?php endif; ?>>已平仓</option>
            </select>
        </div>
    </div>
   
    <div class="form-group layer-footer">
        <label class="control-label col-xs-12 col-sm-2"></label>
        <div class="col-xs-12 col-sm-8">
            <button type="submit" class="btn btn-success btn-embossed disabled"><?php echo __('OK'); ?></button>
            <button type="reset" class="btn btn-default btn-embossed"><?php echo __('Reset'); ?></button>
        </div>
    </div>
</form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="/assets/js/require<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js" data-main="/assets/js/require-backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo \think\Config::get('site.version'); ?>"></script>
    </body>
</html>