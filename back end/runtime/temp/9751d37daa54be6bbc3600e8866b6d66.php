<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:71:"/www/wwwroot/www.1.com/public/../application/admin/view/user/index.html";i:1718292235;s:65:"/www/wwwroot/www.1.com/application/admin/view/layout/default.html";i:1718292239;s:62:"/www/wwwroot/www.1.com/application/admin/view/common/meta.html";i:1718292246;s:64:"/www/wwwroot/www.1.com/application/admin/view/common/script.html";i:1718292246;}*/ ?>
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
                                <style>
select.input-sm{    
    height: auto !important;
    line-height: auto !important;}
</style>
<div class="panel panel-default panel-intro">

    <div class="panel-heading">
        <?php echo build_heading(null, false); ?>
        <ul class="nav nav-tabs">
           
            <li class="<?php if($active == '1'): ?>active<?php endif; ?>"><a href="<?php echo url('user/index'); ?>">用户管理</a></li>
           
        </ul>
    </div>
    <div class="panel-body">
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active in" id="one">
                <div class="widget-body no-padding">
                    <div id="toolbar" class="toolbar">
                        <a href="javascript:;" class="btn btn-primary btn-refresh" title="<?php echo __('Refresh'); ?>" ><i class="fa fa-refresh"></i> </a>
                       <a href="javascript:;" class="btn btn-success btn-add <?php echo $auth->check('user/add')?'':'hide'; ?>" title="<?php echo __('Add'); ?>" ><i class="fa fa-plus"></i> <?php echo __('Add'); ?></a>
                    </div>
                    <table id="table" class="table table-striped table-bordered table-hover table-nowrap"
                    	   data-operate-check="<?php echo $auth->check('user/check'); ?>"
                    	   data-operate-detail="<?php echo $auth->check('user/detail'); ?>"
                    	   data-operate-score="<?php echo $auth->check('user/score'); ?>" 
                    	   data-operate-chat="<?php echo $auth->check('user/chat'); ?>" 
                    	   data-operate-report="<?php echo $auth->check('report/mark/index'); ?>" 
                           data-operate-edit="<?php echo $auth->check('user/edit'); ?>" 
                         
                           width="100%">
                    </table>
                </div>
            </div>

        </div>
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