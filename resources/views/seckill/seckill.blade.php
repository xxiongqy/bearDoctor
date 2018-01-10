@extends('layout.index_head')
@section('content')

 <style>
  #mask {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 999;
  background: #666;
  opacity: 0.5;
  filter: alpha(opacity=50)-moz-opacity: 0.5;
  display: none;
  }
  .popup {
  position: absolute;
  left: 50%;
  width: 400px;
  height: 150px;
  font-size: 20px;
   padding: 25px;
  background-color: rgba(0,0,0,0.1);
  text-align: center;
  color:red;
  z-index: 1000;
  /*position: absolute; */
  display: none;
  }
  .btn_close {
  position: absolute;
  top: 5px;
  right: 5px;
  }

  .ch_c{
    width: 60px;
    height: 35px;
    line-height: 35px;
    overflow: hidden;
    background-color: #e2e2e2;
    color: #555555;
    font-size: 14px;
    text-align: center;
    float: left;
  }

 </style>

    <div class="i_bg">
        <!--Begin Banner Begin-->
        <div class="n_ban">
            <div class="top_slide_wrap">
                <ul class="slide_box bxslider">
                    <li><a href="#" style="background:url({{asset('images')}}/n_ban.jpg) no-repeat center top;">banner1</a></li>
                    <li><a href="#" style="background:url({{asse ('images')}}/n_ban.jpg) no-repeat center top;">banner2</a></li>
                    <li><a href="#" style="background:url({{asset('images')}}/n_ban.jpg) no-repeat center top;">banner3</a></li>
                </ul>
                <div class="op_btns clearfix">
                    <a href="#" class="op_btn op_prev"><span></span></a>
                    <a href="#" class="op_btn op_next"><span></span></a>
                </div>
            </div>
        </div>
       
        <script type="text/javascript">
            //var jq = jQuery.noConflict();
            (function(){
                $(".bxslider").bxSlider({
                    auto:true,
                    prevSelector:jq(".top_slide_wrap .op_prev")[0],nextSelector:jq(".top_slide_wrap .op_next")[0]
                });
            });
        </script>
        <!--End Banner End-->

        <div class="content mar_10">
            <!--Begin 特卖 Begin-->
            <div class="s_left">
                <div class="brand_t">品牌特卖</div>
                <ul class="sell_brand">
                    <li>
                        <div class="con">
                            <div class="simg"><img src="{{asset('images')}}/sb1.jpg" width="220" height="100" /></div>
                            <div class="ch_bg">
                                <span class="ch_txt">先领券再消费</span>
                                <a href="#" class="ch_a">查看</a>
                            </div>
                            09月12日 — 10月20日
                        </div>
                        <div class="img"><img src="{{asset('images')}}/tm1.jpg" width="530" height="190" /></div>
                    </li>
                    <li>
                        <div class="con">
                            <div class="simg"><img src="{{asset('images')}}/sb2.jpg" width="220" height="100" /></div>
                            <div class="ch_bg">
                                <span class="ch_txt">先领券再消费</span>
                                <a href="#" class="ch_a">查看</a>
                            </div>
                            09月12日 — 10月20日
                        </div>
                        <div class="img"><img src="{{asset('images')}}/tm2.jpg" width="530" height="190" /></div>
                    </li>
                    <li>
                        <div class="con">
                            <div class="simg"><img src="{{asset('images')}}/sb3.jpg" width="220" height="100" /></div>
                            <div class="ch_bg">
                                <span class="ch_txt">先领券再消费</span>
                                <a href="#" class="ch_a">查看</a>
                            </div>
                            09月12日 — 10月20日
                        </div>
                        <div class="img"><img src="{{asset('images')}}/tm3.jpg" width="530" height="190" /></div>
                    </li>
                </ul>


                <div class="brand_t" >商品特卖</div> 
               
                <ul class="p_sell">
                   <?php foreach($data as $k=>$v) {?>
                    <li>
                         <input type="hidden" id="timed_<?php echo $v['id']?>" value="<?php echo $v['start_time']?>">
                        
                        <div class="img"><img src="config('app.image')+xDTRT0fEm5dtskBbAP9bTLUkGcNA2niNBNgWDHFR.jpeg" width="150px" height="100px"/></div>
                        <div class="name"><?php echo $v['name']?></div>
                        <div class="price">
                            <table border="0" style="width:100%; color:#888888;" cellspacing="0" cellpadding="0">
                                <tr style="font-family:'宋体';">
                                    <td width="33%">市场价 </td>
                                    <td width="33%">折扣</td>
                                    <td width="33%">为您节省</td>
                                </tr>
                                <tr>
                                    <td style="text-decoration:line-through;"><?php echo $v['sell_price']?></td>
                                    <td>8.0</td>
                                    <td>￥100</td>
                                </tr>
                            </table>
                        </div>

                        <div class="ch_bg" id="gold_div">
                           <span class="ch_txt" id="ch_txt">￥<font><?php echo $v['seckill_price']?></font></span>
                            <a href="order" class="ch_c" id="gold_btn_{{$v['id']}}">准备</a>
                        </div>
                         <div class="times" id="showStartTime_<?php echo $v['id']?>"></div>
                         <input type="hidden" id="showtimekill_<?php echo $v['id']?>" value="<?php echo $v['start_time']?>">
                         <script type="text/javascript">
                          setInterval("set_time("+<?php echo $v['id']?>+")",1000);
                         </script>
                          <script type="text/javascript">
                          setInterval("begin_time("+<?php echo $v['id']?>+")",1000);
                         </script>
                         <div class="popup">开没开始，先等等哦...
                          <button class="btn_close">x</button>
                         </div>
                          
                    </li>
                        <?php } ?>
                    
                </ul>
            </div>
            <!--End 特卖 End-->
        <script type="text/javascript" src="{{asset('js')}}/jquery-1.8.2.min.js"></script>
        <script type="text/javascript">
         function begin_time($id){
             var res=parseInt($("#timed_"+$id).val());
             if(3600<res && res<=7200){
                 $(function() {
                  $('a').click(function() {
                   var $Popup = $('.popup');
                   $Popup.css({
                   left: ($('body').width() - $Popup.width()) / 2+ 'px',
                   top: ($(window).height() - $Popup.height()) / 2 + $(window).scrollTop() + 'px',
                   display: 'block'
                   })
                     $("#gold_btn_"+$id).removeAttr('href');  
                   
                  })
                  $('.btn_close').click(function() {
                   $('.popup').css('display', 'none');
                  })
                })
             }else if(res>0 && res<=3600){
                $("#gold_btn_"+$id).html('立即抢购');
                 $("#gold_btn_"+$id).attr("href", "border"); 

                $("#gold_btn_"+$id).click(function(){
                    

                    alert(11)


                })

             }else if(res<0){
                
                    $("#gold_btn_"+$id).html('已结束');
                    $("#gold_btn_"+$id).removeAttr('href');  
             }
         }
        </script>
        <!-- 倒计时 -->
        <script type="text/javascript">
               
             function set_time($id){
                    var data=parseInt($("#showtimekill_"+$id).val());
                   
                        if(3600<data && data<=7200){
                        var day=Math.floor(data/3600/24)<10?'0'+Math.floor(data/3600/24):Math.floor(data/3600/24);
                        var hours=Math.floor(data/3600%24)<10?'0'+Math.floor(data/3600%24):Math.floor(data/3600%24);
                        var minutes=Math.floor(data%3600/60)<10?'0'+Math.floor(data%3600/60):Math.floor(data%3600/60);
                        var seconds=(data%60)<10?'0'+(data%60):(data%60);
                        $("#showStartTime_"+$id).html("离开抢还有："+day+"天"+hours+"时"+minutes+"分"+seconds+"秒");
                        data--;
                        $("#showtimekill_"+$id).val(data);
                        }else if(data>0 && data<=3600){
                        var day=Math.floor(data/3600/24)<10?'0'+Math.floor(data/3600/24):Math.floor(data/3600/24);
                        var hours=Math.floor(data/3600%24)<10?'0'+Math.floor(data/3600%24):Math.floor(data/3600%24);
                        var minutes=Math.floor(data%3600/60)<10?'0'+Math.floor(data%3600/60):Math.floor(data%3600/60);
                        var seconds=(data%60)<10?'0'+(data%60):(data%60);
                        $("#showStartTime_"+$id).html("已开抢："+day+"天"+hours+"时"+minutes+"分"+seconds+"秒");
                        data--;
                        $("#showtimekill_"+$id).val(data);
                        }else if(data<0){
                        var day=Math.floor(data/3600/24)<10?'0'+Math.floor(data/3600/24):Math.floor(data/3600/24);
                        var hours=Math.floor(data/3600%24)<10?'0'+Math.floor(data/3600%24):Math.floor(data/3600%24);
                        var minutes=Math.floor(data%3600/60)<10?'0'+Math.floor(data%3600/60):Math.floor(data%3600/60);
                        var seconds=(data%60)<10?'0'+(data%60):(data%60);
                        $("#showStartTime_"+$id).html("已结束："+00+"天"+00+"时"+00+"分"+00+"秒");
                        data--;
                        $("#showtimekill_"+$id).val();
                           
                        }
                  
                }
        </script>
      
    </script>
            <div class="s_right">
                <div class="sell_ban">
                    <div id="imgPlays">
                        <ul class="imgs" id="actors">
                            <li><a href="#"><img src="{{asset('images')}}/tm_ban.jpg" width="300" height="352" /></a></li>
                            <li><a href="#"><img src="{{asset('images')}}/tm_ban.jpg" width="300" height="352" /></a></li>
                            <li><a href="#"><img src="{{asset('images')}}/tm_ban.jpg" width="300" height="352" /></a></li>
                        </ul>
                        <div class="prev_s">上一张</div>
                        <div class="next_s">下一张</div>
                    </div>
                </div>
                <div class="sell_hot">
                    <div class="s_hot_t">
                        <span class="fl">热销品牌</span>
                        <span class="h_more fr"><a href="#">更多</a></span>
                    </div>
                    <ul>
                        <li><a href="#"><img src="{{asset('images')}}/hb_1.jpg" width="160" height="59" /></a></li>
                        <li><a href="#"><img src="{{asset('images')}}/hb_2.jpg" width="160" height="59" /></a></li>
                        <li><a href="#"><img src="{{asset('images')}}/hb_3.jpg" width="160" height="59" /></a></li>
                        <li><a href="#"><img src="{{asset('images')}}/hb_4.jpg" width="160" height="59" /></a></li>
                        <li><a href="#"><img src="{{asset('images')}}/hb_5.jpg" width="160" height="59" /></a></li>
                        <li><a href="#"><img src="{{asset('images')}}/hb_6.jpg" width="160" height="59" /></a></li>
                        <li><a href="#"><img src="{{asset('images')}}/hb_7.jpg" width="160" height="59" /></a></li>
                        <li><a href="#"><img src="{{asset('images')}}/hb_8.jpg" width="160" height="59" /></a></li>
                        <li><a href="#"><img src="{{asset('images')}}/hb_9.jpg" width="160" height="59" /></a></li>
                        <li><a href="#"><img src="{{asset('images')}}/hb_10.jpg" width="160" height="59" /></a></li>
                        <li><a href="#"><img src="{{asset('images')}}/hb_11.jpg" width="160" height="59" /></a></li>
                        <li><a href="#"><img src="{{asset('images')}}/hb_12.jpg" width="160" height="59" /></a></li>
                    </ul>
                </div>
                <div class="sell_tel">
                    <table border="0" style="width:280px; margin:15px auto;" cellspacing="0" cellpadding="0">
                        <tr valign="top">
                            <td width="170"><img src="{{asset('images')}}/tm_1.png" /></td>
                            <td>
                                客服在线时间 <br />
                                每天09:00 - 18:00
                            </td>
                        </tr>
                        <tr valign="top">
                            <td colspan="2" style="padding-left:58px; padding-top:10px;">
                                <span style="color:#ff4e00; font-size:20px;">400-123-4567</span><br />
                                客服热线（免费长途）
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="sell_tel">
                    <table border="0" style="width:280px; margin:15px auto;" cellspacing="0" cellpadding="0">
                        <tr valign="top">
                            <td width="170"><img src="{{asset('images')}}/tm_2.png" /></td>
                            <td>
                                享受VIP专属特权
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="sell_tel">
                    <table border="0" style="width:280px; margin:15px auto;" cellspacing="0" cellpadding="0">
                        <tr valign="top">
                            <td width="170"><img src="{{asset('images')}}/tm_3.png" /></td>
                            <td>
                                客服在线时间<br />
                                每天09:00 - 18:00
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

