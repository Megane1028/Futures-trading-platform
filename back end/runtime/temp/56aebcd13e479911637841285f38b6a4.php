<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:51:"../application/index/view/default/user/shiming.html";i:1716392043;s:72:"/www/wwwroot/www.1.com/application/index/view/default/public/layout.html";i:1706520753;}*/ ?>
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

<style>
    body{
        background: #f7f7fa;
    }
    .header-title{
        font-size: 18px;
        font-weight: bold;
        padding: 13px 0;
        text-align: center;
        background: #fff;
        width: 100%;
    }
    .btmline{
        border-bottom: 1px solid #eee;
    }
    .blue{
        text-align: center;
        width: 100%;
        background: #588bf7;
        height: 150px;
        color: #fff;
    }
    .blue article{
        padding-top: 50px;
    }
    .blue article span{
        display: block;
        font-size: 20px;
        margin-bottom: 10px;
    }
    .sfk article{
        display: flex;
        flex-direction: row;
        align-items: center;
    }
    .sfk{
        padding: 15px 5%;
        background: #fff;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
    }
    .sfk span{
        color: #666;
        font-size: 16px;
    }
    .sfk-left{
        margin-right: 20px;
        width: 20px;
        height: 20px;
    }
    .sfk-right{
        width: 15px;
        height: 18px;
    }
    .withdraw{
        background: #fff;
        margin: 10px 0;
    }
    .withdraw-tip{
        padding: 10px 5%;
    }
    .withdraw-input span{
        color: #666;
        font-size: 24px;
    }
    .withdraw-input{
        font-size: 20px;
        padding: 10px 5%;
        border-bottom: 1px solid #eee;
    }
    .dlmm-mm{
        border-bottom: 1px solid #eee;
    display: flex;
    flex-direction: row;
    padding: 10px 5%;
    align-items: center;
    }
    .dlmm-mm input {
        width: 80%;
    }
    .dlmm-mm article img {
         width: 25px;
        height: 25px;
    }
    .dlmm-mm article {
        border-radius: 5px;
        display: flex;
        flex-direction: row;
        padding: 10px 3%;
        width: 70%;
        background: #f7f7fa;
        margin-left: 5%;
    }
    .dlmm-mm span {
        font-size: 16px;
        width: 25%;
    }
    .withdraw-input input{
        color: #999;
    }
    .withdraw-fee{
        padding: 0px 5%;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        color: #8d9dbc;
    }
    .dlbtn button {
        background: #588bf7;
        width: 60%;
        border-radius: 20px;
        color: #fff;
        font-size: 16px;
        padding: 10px 0;
        display: block;
        border: 0;
        margin: 30px auto;
        text-align: center;
    }
    .currencymask{
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.5);
    }
    .currencymask-box span{
        display: block;
        width: 100%;
        text-align: center;
        padding: 15px 0;
        background: #fff;
        border-bottom: 1px solid #eee;
    }
    .currencymask-box{
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
    }
    .currencymask-box em{
        background: #ddd;
        width: 100%;
        height: 10px;
        display: block;
    }
    .header-right {
        position: absolute;
        top: 12px;
        right: 6%;
    }
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
		
		
<div id="app" v-cloak>
    
	 <div class="bgfff btmline">
    <a class="back" href="javascript:history.go(-1)">
		
	</a>
    <!--<div class="header-title" data-localize="zdy.txsq">实名认证</div>-->
    <div class="header-title">实名认证</div>
   </div>
    <div class="container " style="margin-top:10px">
        <div class="panel panel-default">
          <div class="panel-body">

              <div v-if="is_auth != 2">
                  <div class="form-group">
                <label for="real_name">真实姓名</label>
                <input type="text" class="form-control" id="real_name" v-model="real_name">
              </div>
              <div class="form-group">
                <label for="id_card">身份证号</label>
                <input type="text" class="form-control" id="id_card" v-model="id_card">
              </div>
              <!--<div class="form-group">-->
              <!--  <label for="id_card">身份证正/反面照片</label>-->
              <!--  <div class="text-center">-->
              <!--      <img v-if="id_img_1 == ''" src="/assets/img/upload.png" style="display:inline-block;width:48%;" alt="身份证正面照片" class="img-thumbnail" @click="doUpload(1)">-->
              <!--      <img v-else :src="id_img_1" style="display:inline-block;width:48%;" alt="身份证正面照片" class="img-thumbnail" @click="doUpload(1)">-->
              <!--      <input type="hidden" name="id_img_1" value="<?php echo $user['id_img_1']; ?>" />-->
                    
              <!--      <img v-if="id_img_2 == ''" src="/assets/img/upload.png" style="display:inline-block;width:48%;" alt="身份证正面照片" class="img-thumbnail" @click="doUpload(2)">-->
              <!--      <img v-else :src="id_img_2" style="display:inline-block;width:48%;" alt="身份证正面照片" class="img-thumbnail" @click="doUpload(2)">-->
              <!--      <input type="hidden" name="id_img_2" value="<?php echo $user['id_img_2']; ?>" />-->
              <!--  </div>-->
              <!--</div>-->
              <!--<div class="form-group">-->
              <!--   <h5>上传要求</h5>-->
              <!--   <p>1,能看清证件号和姓名，支持jpg/jpeg/png;</p>-->
              <!--   <p>2,图片大小限制在5M以内</p>-->
              <!--</div>-->
              <div class="form-group text-danger" v-if="is_auth == -1">
                <label for="id_card">认证失败：</label>
                <p v-if="id_auth_error!=''">{{id_auth_error}}</p>
              </div>
              <div class="form-group" style="display:none">
                <input type="file" id="uploadFile" @change="handleChange">
              </div>
              </div>
                <div class="text-center">
                    <button v-if="is_auth == 0 || is_auth == -1" style="width:100%;" class="btn btn-warning" @click="submit">提交认证</button>
                    <button v-else-if="is_auth == 1" style="width:100%;" class="btn btn-primary" disabled="" >已提交，等待审核</button>
                    <button v-else-if="is_auth == 2" style="width:100%;" class="btn btn-success" disabled="">认证成功</button>
                </div>
              

          </div>
        </div>
    </div>
   
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
<script>
   
   var page = new Vue({
       el:"#app",
       data:{
           real_name:"<?php echo $user['real_name']; ?>",
           id_card:"<?php echo $user['id_card']; ?>",
           id_img_1:"<?php echo $user['id_img_1']; ?>",
           id_img_2:"<?php echo $user['id_img_2']; ?>",
           upload_type:1,
           is_auth:"<?php echo $user['is_auth']; ?>",
           id_auth_error:"<?php echo $user['id_auth_error']; ?>",
       },
       mounted(){
       },
       
       methods:{
           handleChange(event){
                let that = this
                let upload_type = this.upload_type
                let selectedFile = event.target.files[0]
                var formData = new FormData();
                formData.append('file', selectedFile);
                $('#uploadFile').val("")
                $.ajax({
                    url: "<?php echo url('user/uploadimg'); ?>",
                    type: 'POST',
                    data: formData,
                    dataType: "json",
                    processData: false,
                    contentType: false,
                    success: function (data, textStatus, jqXHR) {
                        if(data.code == 0){
                            if( upload_type == 1){
                                that.id_img_1 = data.data.content
                            }else{
                                that.id_img_2 = data.data.content
                            }
                        }
                    }
                });
                
           },
           
           doUpload(type){
               this.upload_type = type
               $('#uploadFile').trigger('click');
           },
           submit(){
               var data={};
               let that=this;
             

        	   if(that.real_name==''){
                   layer.msg('请输入真实姓名');
                   return;
               }

        	   if(that.id_card==''){
                   layer.msg('请输入身份证号');
                   return;
               }

        	   //if(that.id_img_1==''){
            //       layer.msg('请上传身份证正面照');
            //       return;
            //   }

        	   //if(that.id_img_2==''){
            //       layer.msg('请上传身份证反面照');
            //       return;
            //   }

              data = {
            	real_name:this.real_name,
                id_card:this.id_card,
                id_img_1:this.id_img_1,
            	id_img_2:this.id_img_2,
              }
          
     
              layer.load(1);
              initDatas({
                    url: 'user/doAuth',
                    type: 'post',
                    data: data
                }, function (res) {
                	layer.closeAll();
                    if (res.code==200) {
                    	layer_msg(res.msg);
                    	setTimeout(() => {
                            window.location.href = '<?php echo url("user/user"); ?>';
                        }, 1500);
                    } else {
                    	var msg = getlg(res.msg) ? getlg(res.msg) : res.msg;
                    	layer_msg(msg);  
                    }
                });
           },
           
       },
   })
  </script>

</body>
</html>