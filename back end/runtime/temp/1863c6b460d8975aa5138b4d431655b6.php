<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:70:"/www/wwwroot/www.1.com/public/../application/admin/view/user/auth.html";i:1718292233;s:65:"/www/wwwroot/www.1.com/application/admin/view/layout/default.html";i:1718292239;s:62:"/www/wwwroot/www.1.com/application/admin/view/common/meta.html";i:1718292246;s:64:"/www/wwwroot/www.1.com/application/admin/view/common/script.html";i:1718292246;}*/ ?>
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
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Real_name'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-real_name" class="form-control" name="row[real_name]" type="text" value="<?php echo $row['real_name']; ?>">
        </div>
    </div>
   
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Id_card'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-id_card" class="form-control" name="row[id_card]" type="text" value="<?php echo $row['id_card']; ?>">
            
        </div>
    </div>
    
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Id_img_1'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input name="row[id_img_1]" value="<?php echo $row['id_img_1']; ?>" id="id_img_1">
            <input type="file" id="upload_1">
            <img src="<?php echo $row['id_img_1']; ?>" style="width:400px;" id="show_img_1" />
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Id_img_2'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input name="row[id_img_2]" value="<?php echo $row['id_img_2']; ?>" id="id_img_2">
            <input type="file" id="upload_2">
            <img src="<?php echo $row['id_img_2']; ?>" style="width:400px;" id="show_img_2" />
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">操作类型:</label>
        <div class="col-xs-12 col-sm-8">
            <select id="c-optype" data-rule="required" class="form-control" name="row[is_auth]">
                <option value="2">审核通过</option>
                <option value="-1"<?php if($row['is_auth'] == -1): ?>selected<?php endif; ?>>审核失败</option>
            </select>
        </div>
    </div>
    
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">失败原因:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-agent" class="form-control" name="row[id_auth_error]" type="text" value="<?php echo $row['id_auth_error']; ?>">
        </div>
    </div>
    
    <div class="form-group layer-footer">
        <label class="control-label col-xs-12 col-sm-2"></label>
        <div class="col-xs-12 col-sm-8">
            <button type="submit" class="btn btn-success btn-embossed"><?php echo __('OK'); ?></button>
            <button type="reset" class="btn btn-default btn-embossed"><?php echo __('Reset'); ?></button>
        </div>
    </div>
</form>
	<script type="text/javascript" src="/template/mb/lib/jquery-2.1.1.min.js"></script>
<script type="text/javascript" charset="utf-8">
    
    
    $('#upload_1').on("change",function(e){
        let selectedFile = e.target.files[0];
        var formData = new FormData();
        formData.append('file', selectedFile);
        $.ajax({
            url: "<?php echo url('user/uploadimg'); ?>",
            type: 'POST',
            data: formData,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function (data, textStatus, jqXHR) {
                if(data.code == 0){
                    $('#id_img_1').val(data.data.content)
                    $('#show_img_1').attr("src",data.data.content)
                }
            }
        });
    })
    
    $('#upload_2').on("change",function(e){
        let selectedFile = e.target.files[0];
        var formData = new FormData();
        formData.append('file', selectedFile);
        $.ajax({
            url: "<?php echo url('user/uploadimg'); ?>",
            type: 'POST',
            data: formData,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function (data, textStatus, jqXHR) {
                if(data.code == 0){
                    $('#id_img_2').val(data.data.content)
                    $('#show_img_2').attr("src",data.data.content)
                }
            }
        });
    })
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