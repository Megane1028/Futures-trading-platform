<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:72:"/www/wwwroot/www.1.com/public/../application/admin/view/user/detail.html";i:1718292234;s:65:"/www/wwwroot/www.1.com/application/admin/view/layout/default.html";i:1718292239;s:62:"/www/wwwroot/www.1.com/application/admin/view/common/meta.html";i:1718292246;s:64:"/www/wwwroot/www.1.com/application/admin/view/common/script.html";i:1718292246;}*/ ?>
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
                                <table class="table table-striped">
    <thead>
        <tr>
            <th>标题</th>
            <th>内容</th>
        </tr>
    </thead>
    <tbody>
         <tr>
             <td>会员号</td>
             <td><?php echo $row['id']; ?></td>
         </tr>
         <tr>
             <td>会员名称</td>
             <td><?php echo $row['username']; ?></td>
         </tr>
         <tr>
             <td>会员头像</td>
             <td><img src="<?php echo $row['user_avatar']; ?>" width="45px"></td>
         </tr>
         <tr>
             <td>余额</td>
             <td><?php echo $row['money']; ?></td>
         </tr>
         <tr>
             <td>上级代理</td>
             <td><?php echo is_empty($row['agent'], '无'); ?></td>
         </tr>
         <tr>
             <td>是否代理</td>
             <td><?php if($row['isagent'] == 1): ?>是<?php else: ?>否<?php endif; ?></td>
         </tr>
         <tr>
             <td>是否在线</td>
             <td><?php if($row['is_online'] == 1): ?>是<?php else: ?>否<?php endif; ?></td>
         </tr>
         <tr>
             <td>用户状态</td>
             <td><?php if($row['status'] == 1): ?>正常<?php else: ?>冻结<?php endif; ?></td>
         </tr>
         <tr>
             <td>用户类别</td>
             <td><?php if($row['isagent'] == 1): ?>代理<?php else: if($row['real'] == 1): ?>会员<?php else: ?>假人<?php endif; endif; ?></td>
         </tr>
         <tr>
             <td>备注</td>
             <td><?php echo $row['remark']; ?></td>
         </tr>
         <tr>
             <td>上次登陆时间</td>
             <td><?php echo is_empty($row['last_login_time']); ?></td>
         </tr>
         <tr>
             <td>上次登陆IP</td>
             <td><?php echo is_empty($row['last_login_ip']); ?></td>
         </tr>
         <tr>
             <td>上次登陆次数</td>
             <td><?php echo is_empty($row['login_times']); ?></td>
         </tr>
         
         <tr>
             <td>提现账号</td>
             <td><?php echo is_empty($row['attach_text']['bank_card']['account']); ?></td>
         </tr>
         
         <tr>
             <td>提现名字</td>
             <td><?php echo is_empty($row['attach_text']['bank_card']['user_name']); ?></td>
         </tr>
         
         <tr>
             <td>提现银行</td>
             <td><?php echo is_empty($row['attach_text']['bank_card']['bank_name']); ?></td>
         </tr>
        
    </tbody>
</table>
<div class="hide layer-footer">
    <label class="control-label col-xs-12 col-sm-2"></label>
    <div class="col-xs-12 col-sm-8">
        <button type="reset" class="btn btn-primary btn-embossed btn-close" onclick="Layer.closeAll();"><?php echo __('Close'); ?></button>
    </div>
</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="/assets/js/require<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js" data-main="/assets/js/require-backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo \think\Config::get('site.version'); ?>"></script>
    </body>
</html>