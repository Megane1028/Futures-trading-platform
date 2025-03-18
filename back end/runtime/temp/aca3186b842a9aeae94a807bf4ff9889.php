<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:81:"/www/wwwroot/www.1.com/public/../application/admin/view/product/product/edit.html";i:1718962356;s:65:"/www/wwwroot/www.1.com/application/admin/view/layout/default.html";i:1718292239;s:62:"/www/wwwroot/www.1.com/application/admin/view/common/meta.html";i:1718292246;s:64:"/www/wwwroot/www.1.com/application/admin/view/common/script.html";i:1718292246;}*/ ?>
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
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Code'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-code" class="form-control" name="row[code]" type="text" value="<?php echo htmlentities($row['code']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Title'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-title" class="form-control" name="row[title]" type="text" value="<?php echo htmlentities($row['title']); ?>">
        </div>
    </div>



    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Image'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="input-group">
                <input id="c-image" class="form-control" size="50" name="row[image]" type="text" value="<?php echo htmlentities($row['image']); ?>">
                <div class="input-group-addon no-border no-padding">
                    <span><button type="button" id="plupload-image" class="btn btn-danger plupload" data-input-id="c-image" data-mimetype="image/gif,image/jpeg,image/png,image/jpg,image/bmp" data-multiple="false" data-preview-id="p-image"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                    <span><button type="button" id="fachoose-image" class="btn btn-primary fachoose" data-input-id="c-image" data-mimetype="image/*" data-multiple="false"><i class="fa fa-list"></i> <?php echo __('Choose'); ?></button></span>
                </div>
                <span class="msg-box n-right" for="c-image"></span>
            </div>
            <ul class="row list-inline plupload-preview" id="p-image"></ul>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Cid'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-cid" class="form-control selectpage" data-source="product/type/index" data-primary-key="id" data-field="name"  name="row[cid]" type="text" value="<?php echo htmlentities($row['cid']); ?>">
        </div>
    </div>
    <!--<div class="form-group">-->
    <!--    <label class="control-label col-xs-12 col-sm-2">交易时间:</label>-->
    <!--    <div class="col-xs-12 col-sm-8">-->
    <!--        <input id="c-title" class="form-control" name="row[trade_time]" type="text" value="<?php echo htmlentities($row['trade_time']); ?>">-->
    <!--    </div>-->
    <!--</div>-->


    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">时间玩法间隔:</label>
        <div class="col-xs-12 col-sm-8">
            <dl class="fieldlist"  data-template="basictpl"  data-name="row[play_rule]">
                <dd>
                    <ins>时间(秒)</ins>
                    <ins>赢赔比例(%)</ins>
                    <ins>亏赔比例(%)</ins>
                </dd>
                <dd><a href="javascript:;" class="btn btn-sm btn-success btn-append"><i class="fa fa-plus"></i> <?php echo __('Append'); ?></a></dd>
                <textarea name="row[play_rule]" class="form-control hide" cols="30" rows="5"><?php echo htmlentities($row['play_rule']); ?></textarea>
            </dl>
            <script id="basictpl" type="text/html">
                <dd class="form-inline">
                    <ins><input type="text" name="<%=name%>[<%=index%>][time]" class="form-control" value="<%=row.time%>" placeholder="" size="10"/></ins>
                    <ins><input type="text" name="<%=name%>[<%=index%>][win]" class="form-control" value="<%=row.win%>" placeholder=""/></ins>
                    <ins><input type="text" name="<%=name%>[<%=index%>][lose]" class="form-control" value="<%=row.lose%>" placeholder=""/></ins>
                    <!--下面的两个按钮务必保留-->
                    <span class="btn btn-sm btn-danger btn-remove"><i class="fa fa-times"></i></span>
                    <span class="btn btn-sm btn-primary btn-dragsort"><i class="fa fa-arrows"></i></span>
                </dd>
            </script>
        </div>
    </div>

<div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">时间段控制:</label>
        <div class="col-xs-12 col-sm-8">
            <dl class="fieldlist" data-template="timetpl" data-name="row[time_control]">
                <dd>
                    <ins>起始时间</ins>
                    <ins>结束时间</ins>
                    <ins>类型</ins>
                </dd>
                <!-- 模板 -->
                <script id="timetpl" type="text/html">
                    <dd class="form-inline">
                        <ins><input type="time" name="<%=name%>[<%=index%>][start_time]" class="form-control" value="<%=row.start_time%>" /></ins>
                        <ins><input type="time" name="<%=name%>[<%=index%>][end_time]" class="form-control" value="<%=row.end_time%>" /></ins>
                        <ins>
                        <select id="c-is_open" data-rule="required" class="form-control selectpicker" name="<%=name%>[<%=index%>][type]">
                            <option value="1" <%= row.type == 1 ? 'selected' : '' %>>买涨</option>
                            <option value="2" <%= row.type == 2 ? 'selected' : '' %>>买跌</option>
                        </select>
                        </ins>
                        <span class="btn btn-sm btn-danger btn-remove"><i class="fa fa-times"></i></span>
                        <span class="btn btn-sm btn-primary btn-dragsort"><i class="fa fa-arrows"></i></span>
                    </dd>
                </script>
                <!-- 追加按钮 -->
                <dd><a href="javascript:;" class="btn btn-sm btn-success btn-append"><i class="fa fa-plus"></i> 添加时间段</a></dd>
                <!-- 隐藏域 -->
                <textarea name="row[time_control]" class="form-control hide" cols="30" rows="5"><?php echo htmlentities($row['time_control']); ?></textarea>
            </dl>
        </div>
    </div>



    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Remark'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <textarea id="c-remark" class="form-control " rows="5" name="row[remark]" cols="50"><?php echo htmlentities($row['remark']); ?></textarea>
        </div>
    </div>


    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Is_open'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <select id="c-is_open" data-rule="required" class="form-control selectpicker" name="row[is_open]">
                <option value="0" <?php if(in_array((0), is_array($row['is_open'])?$row['is_open']:explode(',',$row['is_open']))): ?>selected<?php endif; ?>>关闭</option>
                <option value="1" <?php if(in_array((1), is_array($row['is_open'])?$row['is_open']:explode(',',$row['is_open']))): ?>selected<?php endif; ?>>启用</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Status'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <select id="c-status" data-rule="required" class="form-control selectpicker" name="row[status]">
                <option value="0" <?php if(in_array((0), is_array($row['status'])?$row['status']:explode(',',$row['status']))): ?>selected<?php endif; ?>>禁用</option>
                <option value="1" <?php if(in_array((1), is_array($row['status'])?$row['status']:explode(',',$row['status']))): ?>selected<?php endif; ?>>正常</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">排序:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-rank" class="form-control" name="row[rank]" type="text" value="<?php echo htmlentities($row['rank']); ?>">
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
<script type="text/javascript" src="/assets/js/jquery.min.js"></script>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="/assets/js/require<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js" data-main="/assets/js/require-backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo \think\Config::get('site.version'); ?>"></script>
    </body>
</html>