<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:66:"../application/index/view/default/user/withdraw/withdraw_mpwd.html";i:1600263228;s:72:"/www/wwwroot/www.1.com/application/index/view/default/public/layout.html";i:1706520753;}*/ ?>
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
    .dlmm{
        background: #fff;
    }
    .dlmm-yzm{
        border-bottom: 1px solid #eee;
        display: flex;
        flex-direction: row;
        padding: 10px 5%;
        align-items: center;
    }
    .dlmm-yzm span{
        font-size: 16px;
        width: 25%;
    }
    .dlmm-yzm article button{
        border: 0;
        background: #f7f7fa;
        color:#588bf7;
    }
    .dlmm-yzm input,.dlmm-mm input{
        width: 80%;
    }
    .dlmm-yzm article,.dlmm-mm article {
        border-radius: 5px;
        display: flex;
        flex-direction: row;
        padding: 10px 3%;
        width: 70%;
        background: #f7f7fa;
        margin-left: 5%;
    }
    .dlmm-mm article img{
        width: 25px;
        height: 25px;
    }
    .dlmm-mm span{
        font-size: 16px;
        width: 25%;
    }
    .dlmm-mm{
        border-bottom: 1px solid #eee;
        display: flex;
        flex-direction: row;
        padding: 10px 5%;
        align-items: center;
    }
    .dlbtn button{
        background: #588bf7;
        width: 60%;
        border-radius: 20px;
        color:#fff;
        font-size: 16px;
        padding: 10px 0;
        display: block;
        border: 0;
        margin: 30px auto;
        text-align: center;
    }
  </style>

</head>

<body>
	<div id="home">
		
		
   <div class="bgfff btmline">
    	<div class="header-title">资金密码设置</div>
   </div>
   <div class="dlmm">
       
       <div class="dlmm-mm">
           <span  data-localize="zdy.xmm">新密码</span>
           <article>
               <input v-model="password" :type="eyeIndex==0?'password':'text'" placeholder="请输入密码" data-localize="safe.ppwd">
               <img src="/template/mb/images/eye_no.png" :src="eye[eyeIndex]" @click="eyetab()">
           </article>
       </div>
       <div class="dlmm-mm">
           <span  data-localize="zdy.qrmm">确认密码</span>
           <article>
               <input  v-model="repassword" :type="eyeIndexTwo==0?'password':'text'" placeholder="请输入密码" data-localize="safe.ppwd">
               <img src="/template/mb/images/eye_no.png" :src="eye[eyeIndexTwo]" @click="eyetwo()">
           </article>
       </div>
   </div>
   <div class="dlbtn">
       <button data-localize="zdy.qrxg" @click="submit()">确认修改</button>
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
       el:"#home",
       data:{
           code:'',
           type:1,
           eye:['/template/mb/images/eye_no.png','/template/mb/images/eye.png'],
           password:"",
           repassword:"",
           eyeIndex:0,
           eyeIndexTwo:0,
           areaCode:"",
           areaCodeId:"",
           sendTxt:getlg('tsend'),
           username:localStorage.getItem('userName'),
           title:getlg('xgdlmm'),
       },
       filters: {
           
    	},
       mounted(){
           if(get_param('type')!=1){
               this.type=get_param('type');
               this.title=getlg('xgzjmm');
           }
           let that=this;
           
       },
       
       methods:{
           submit(){
               let that=this;
                var ps = /^[a-zA-Z0-9]{6,16}$/;
                if (!ps.test(that.password)){
                    layer_msg(getlg('plength'));
                    return;
                }
                if (that.password != that.repassword) {
                    layer_msg(getlg('twonot'));
                    return
                } 
                
                layer.load(1);
                initDatas({
	                type:"post",
	                url:"user/ajax",
	                data:{
	                	request:'mpwd',
	                	mpasswd: that.password,
                        repassword: that.repassword,
	                }
	            },function(res){
	                if(res.status){
	                	layer.closeAll();
                        layer_msg(res.msg);
                        setTimeout(function(){
                            window.location.reload();
                        },1500);
	                } else {
	                	layer_msg(res.msg);
	                }
	            });
                
           }, 
           eyetab(){
              this.eyeIndex==1?this.eyeIndex=0:this.eyeIndex=1;   
           },
           eyetwo(){
              this.eyeIndexTwo==1?this.eyeIndexTwo=0:this.eyeIndexTwo=1;  
           },
         
         
       },
   })
  </script>

</body>
</html>