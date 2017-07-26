<link type="text/css" rel="stylesheet" href="<?php echo ADMIN_URL;?>tpl/25/css.css" media="all" />
<?php $this->element('25/top',array('lang'=>$lang)); ?>
<?php // 去掉上方的关注提醒 $this->element('guanzhu',array('shareinfo'=>$lang['shareinfo']));?>
<div id="main">
<style type="text/css">
.search_index {
margin: 5px 0px 3px 5px;
height: 46px;
border-radius: 2px;
background: url(<?php echo $this->img('input_bg.png');?>) repeat-x top left;
}
.search_index .right {
width: 44px;
float: right;
text-align: left;
}
.search_index .left {
text-align: center; height:46px;
}
.search_index .input1 {
height: 46px;
line-height: 46px;
text-indent: 5px;
color: #787575;
border: none;
background: url(<?php echo $this->img('611.png');?>) no-repeat center left;
display: block;
float: left;
width: 75%;
}
.goodslists{ min-height:300px;}
</style>
<ul class="goodslists">
<?php 
$imgs = array(); 
if ( ! empty( $rt['categoodslist'] ) )
foreach ( $rt['categoodslist'] as $k => $row )
{ 
    $imgs[] = $row['goods_img'];
?>
    <li style="width:50%; float:left; position:relative">
        <div style="padding:4px;">
        <a style="background:#fff; padding:5px; display:block;" href="<?php echo ADMIN_URL.($row['is_jifen']=='1'?'exchange':'product').'.php?id='.$row['goods_id'];?>">
            <div style=" height:150px; overflow:hidden; text-align:center;">
                <img src="<?php echo $row['goods_img'];?>" style="max-width:99%;width:130px; height:130px;display:inline;" alt="<?php echo $row['goods_name'];?>"/>
            </div>
            <p style="line-height:20px; height:20px; overflow:hidden; text-align:center">
            <?php if ( $row['goods_zone'] == 2 ) { ?>
            <font color="red">【会员专属】</font>
            <?php } ?>
            <?php echo $row['goods_name']; ?>
            </p>
            <p style="line-height:45px; height:45px; overflow:hidden;">
            <span style="float:left">本店价:</span>
            <b class="price" style="font-size:14px; float:left; padding-left:3px;">
                ￥<?php echo str_replace( '.00', '', $row['pifa_price'] ); ?>
            </b>
            </p>
            <!--<p style="line-height:20px; height:20px; overflow:hidden; color:#999999"><del>市场价&nbsp;&nbsp;￥<?php echo str_replace('.00','',$row['shop_price']);?></del></p>-->
        </a>
        </div>
        <a href="<?php echo ADMIN_URL.($row['is_jifen']=='1'?'exchange':'product').'.php?id='.$row['goods_id'];?>" >
            <span class="buyfals">立即购买</span>
        </a>
    </li>
<?php } ?>
<div class="clear"></div>
</ul>
<div class="clear10"></div>
<?php if ( ! empty( $rt['categoodspage'] ) ) { ?>
<div class="pages">
<?php echo str_replace( '上一页', '<img src="'.ADMIN_URL.'images/prev.jpg" align="absmiddle" />', $rt['categoodspage']['previ']); ?>
<?php 
if ( ! empty($rt['categoodspage']['list']) )
foreach ( $rt['categoodspage']['list'] as $kk => $v ) {
?>
<a href="<?php echo $v;?>" class="<?php echo $kk==$page?'ll this' : 'll';?>"><?php echo $kk;?></a>
<?php } ?>  
<?php echo str_replace( '下一页', '<img src="'.ADMIN_URL.'images/next.jpg" align="absmiddle" />', $rt['categoodspage']['next']); ?>
</div>
<div class="clear"></div>
<?php } ?>
</div>

<!-- 团购商品 Start -->
<ul class="groupbuy_list">
<?php if ( ! empty( $rt['groupbuy_list'] ) ) { ?>
<?php foreach ( $rt['groupbuy_list'] as $k => $group ) { ?>
    <li style="width:50%; float:left; position:relative">
        <div style="padding:4px;">
        <a style="background:#fff; padding:5px; display:block;" href="<?php echo ADMIN_URL.'group_product.php?id='.$group['group_id']; ?>">
            <div style=" height:150px; overflow:hidden; text-align:center;">
                <img src="<?php echo SITE_URL . $group['goods_img']; ?>" style="max-width:99%; height:130px;width:130px;display:inline;" />
            </div>
            <p style="line-height:20px; height:20px; overflow:hidden; text-align:center">
                [团购]<?php echo $group['group_name']; ?>
            </p>
            <p style="line-height:45px; height:45px; overflow:hidden;">
                <span style="float:left">团购价:</span>
                <b class="price" style="font-size:14px; float:left; padding-left:3px;">
                ￥<?php echo str_replace( '.00', '', $group['price'] ); ?>
                </b>
            </p>
        </a>
        </div>
        <a href="<?php echo ADMIN_URL.'group_product.php?id='.$group['group_id']; ?>">
        <span class="buyfals">立即购买</span>
        </a>
    </li>
<?php } } ?>
<div class="clear"></div>
</ul>
<!-- 团购商品 End -->

<?php
$title = ! empty($rt['cateinfo']['cat_title']) ? $rt['cateinfo']['cat_title'] : $rt['cateinfo']['cat_name'];
$imgs = $imgs[rand( 0, count($imgs)-1 )];
?>
<?php
$thisurl = Import::basic()->thisurl();
$rr = explode('?',$thisurl);
$t2 = isset($rr[1])&&!empty($rr[1]) ? $rr[1] : "";
$dd = array();
if ( ! empty($t2) ) {
$rr2 = explode( '&', $t2 );
if ( ! empty($rr2) ) foreach ( $rr2 as $v ) {
    $rr2 = explode( '=', $v );
    if ( $rr2[0] == 'from' || $rr2[0] == 'isappinstalled' || $rr2[0] == 'code'|| $rr2[0] == 'state') continue;
    $dd[] = $v;
}
}
$thisurl = $rr[0].'?'.(!empty($dd) ? implode('&',$dd) : 'tid=0');
?>
<script type="text/javascript">
  function _report(a,c){
        $.post('<?php ADMIN_URL;?>product.php',{action:'ajax_share',type:a,msg:c,thisurl:'<?php echo Import::basic()->thisurl();?>',imgurl:'<?php echo $imgs;?>',title:'<?php echo $title;?>'},function(data){
        });
  }
  
  document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
        window.shareData = {  
            "imgUrl": "<?php echo $imgs;?>",
            "LineLink": '<?php echo $thisurl;?>',
            "Title": "<?php echo $title;?>",
            "Content": "<?php echo !empty($rt['cateinfo']['cat_desc']) ? $rt['cateinfo']['cat_desc'] : $title;?>"
        };
        // 发送给好友
        WeixinJSBridge.on('menu:share:appmessage', function (argv) {
            WeixinJSBridge.invoke('sendAppMessage', { 
                "img_url": window.shareData.imgUrl,
                "img_width": "640",
                "img_height": "640",
                "link": window.shareData.LineLink,
                "desc": window.shareData.Content,
                "title": window.shareData.Title
            }, function (res) {
                _report('send_msg', res.err_msg);
            })
        });
        // 分享到朋友圈
        WeixinJSBridge.on('menu:share:timeline', function (argv) {
            WeixinJSBridge.invoke('shareTimeline', {
                "img_url": window.shareData.imgUrl,
                "img_width": "640",
                "img_height": "640",
                "link": window.shareData.LineLink,
                "desc": window.shareData.Content,
                "title": window.shareData.Title
            }, function (res) {
                _report('timeline', res.err_msg);
            });
        });
        // 分享到微博
        WeixinJSBridge.on('menu:share:weibo', function (argv) {
            WeixinJSBridge.invoke('shareWeibo', {
                "content": window.shareData.Content,
                "url": window.shareData.LineLink,
            }, function (res) {
                _report('weibo', res.err_msg);
            });
        });
        }, false)
</script>
<?php $this->element( '25/footer', array('lang'=>$lang) ); ?>