<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:70:"/www/wwwroot/www.1.com/public/../application/admin/view/user/edit.html";i:1723345027;s:65:"/www/wwwroot/www.1.com/application/admin/view/layout/default.html";i:1718292239;s:62:"/www/wwwroot/www.1.com/application/admin/view/common/meta.html";i:1718292246;s:64:"/www/wwwroot/www.1.com/application/admin/view/common/script.html";i:1718292246;}*/ ?>
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
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Account'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-account" class="form-control" name="row[account]" type="text" value="<?php echo htmlentities($row['account']); ?>" <?php if($row['account'] != ''): ?>disabled<?php endif; ?>>
        </div>
    </div>
    
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Username'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-username" data-rule="required" class="form-control" name="row[username]" type="text" value="<?php echo htmlentities($row['username']); ?>">
        </div>
    </div>
    

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('User_avatar'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="input-group">
                <input id="c-user_avatar" data-rule="required" class="form-control" size="50" name="row[user_avatar]" type="text" value="<?php echo htmlentities($row['user_avatar']); ?>">
                <div class="input-group-addon no-border no-padding">
                    <span><button type="button" id="plupload-user_avatar" class="btn btn-danger plupload" data-input-id="c-user_avatar" data-mimetype="image/gif,image/jpeg,image/png,image/jpg,image/bmp" data-multiple="false" data-preview-id="p-user_avatar"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                    <span><button type="button" id="fachoose-user_avatar" class="btn btn-primary fachoose" data-input-id="c-user_avatar" data-mimetype="image/*" data-multiple="false"><i class="fa fa-list"></i> <?php echo __('Choose'); ?></button></span>
                </div>
                <span class="msg-box n-right" for="c-user_avatar"></span>
            </div>
            <ul class="row list-inline plupload-preview" id="p-user_avatar"></ul>
        </div>
    </div>
    
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">账户密码:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-passwd" class="form-control" name="row[passwd]" type="text" value="">
            <span style="color:red;font-size:14px;"><?php echo $row['pass1']; ?></span>
        </div>
    </div>
    
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Mpasswd'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-mpasswd" class="form-control" name="row[mpasswd]" type="text" value="">
            <span style="color:red;font-size:14px;"><?php echo $row['mpass']; ?></span>
        </div>
    </div>
    
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Real_name'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-real_name" class="form-control" name="row[real_name]" type="text" value="<?php echo htmlentities($row['real_name']); ?>">
        </div>
    </div>
     <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">账户余额:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-money" class="form-control" name="row[money]" type="text" value="<?php echo htmlentities($row['money']); ?>">
        </div>
    </div>
    
    
    
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Agent'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-agent" class="form-control" name="row[agent]" type="text" value="<?php echo htmlentities($row['agent']); ?>">
        </div>
    </div>
    
  <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">提现账号:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-account" class="form-control" name="row[attach_text][bank_card][account]" type="text" value="<?php echo is_empty($row['attach_text']['bank_card']['account'],''); ?>">
        </div>
    </div>
    
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">提现姓名:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-user_name" class="form-control" name="row[attach_text][bank_card][user_name]" type="text" value="<?php echo is_empty($row['attach_text']['bank_card']['user_name'],''); ?>">
        </div>
    </div>
    
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">提现银行:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-bank_name" class="form-control" name="row[attach_text][bank_card][bank_name]" type="text" value="<?php echo is_empty($row['attach_text']['bank_card']['bank_name'],''); ?>">
        </div>
    </div>

     <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">支行名称:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-bank_branch" class="form-control" name="row[attach_text][bank_card][bank_branch]" type="text" value="<?php echo is_empty($row['attach_text']['bank_card']['bank_branch'],''); ?>">
        </div>
    </div>
    
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">USDT地址:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-coin" class="form-control" name="row[attach_text][coin][account]" type="text" value="<?php echo is_empty($row['attach_text']['coin']['account'],''); ?>">
        </div>
    </div>

    
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">风控:</label>
        <div class="col-xs-12 col-sm-8">
            <select id="c-kong_style" data-rule="required" class="form-control selectpicker" name="row[kong_style]">
                <option value="0" <?php if(in_array((0), is_array($row['kong_style'])?$row['kong_style']:explode(',',$row['kong_style']))): ?>selected<?php endif; ?>>默认</option>
                <option value="1" <?php if(in_array((1), is_array($row['kong_style'])?$row['kong_style']:explode(',',$row['kong_style']))): ?>selected<?php endif; ?>>赢</option>
                <option value="2" <?php if(in_array((2), is_array($row['kong_style'])?$row['kong_style']:explode(',',$row['kong_style']))): ?>selected<?php endif; ?>>亏</option>
            </select>
        </div>
    </div>
    
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Status'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <select id="c-status" data-rule="required" class="form-control selectpicker" name="row[status]">
                <option value="1" <?php if(in_array((1), is_array($row['status'])?$row['status']:explode(',',$row['status']))): ?>selected<?php endif; ?>>正常</option>
                <option value="0" <?php if(in_array((0), is_array($row['status'])?$row['status']:explode(',',$row['status']))): ?>selected<?php endif; ?>>黑名单</option>
            </select>
        </div>
    </div>
    
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Level'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <select id="c-level" data-rule="required" class="form-control selectpicker" name="row[level]">
                <?php if(is_array($userLevel) || $userLevel instanceof \think\Collection || $userLevel instanceof \think\Paginator): if( count($userLevel)==0 ) : echo "" ;else: foreach($userLevel as $k=>$vo): ?>
                <option value="<?php echo $k; ?>" <?php if(in_array(($k), is_array($row['level'])?$row['level']:explode(',',$row['level']))): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                
            </select>
        </div>
    </div>
    
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Remark'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-remark" class="form-control" name="row[remark]" type="text" value="<?php echo htmlentities($row['remark']); ?>">
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