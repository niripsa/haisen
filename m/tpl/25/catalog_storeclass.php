<link type="text/css" rel="stylesheet" href="<?php echo ADMIN_URL;?>tpl/25/css.css" media="all" />
<link rel="stylesheet" href="<?php echo ADMIN_URL;?>tpl/25/201608style/css/new_style.css?v=1.27" />
<?php $this->element( '25/top', array( 'lang' => $lang ) ); ?>
 <div class="tab1" id="tab1">
        <div class="menua">
            <ul>
              <?php foreach ( (array)$store_class_list as $k => $v ) { ?>
                <a href="<?php echo ADMIN_URL; ?>catalog.php?act=store_list&flag=<?php echo $v['class_id'];?>"><li <?php if( $flag == $v['class_id'] ){echo 'class="off"';} ?>><?php echo $v['class_name'];?></li></a>
              <?php }?>
            </ul>
        </div>
        <div class="menudiv">
            <div id="con_one_1">
                <div class="ml_main">
                    <ul>
                    <?php foreach ( (array)$store_list as $k => $v ) { ?>
                        <li>
                            <div class="ml_main_lt">
                                <a href="#">
                                    <?php if( $v['store_logo'] == '' ){?>
                                    <img src="<?php echo ADMIN_URL;?>tpl/25/201608style/img/40403.png">
                                    <?php }else{?>
                                    <img src="<?php echo SITE_URL .$v['store_logo']; ?>">
                                    <?php }?>
                                </a>
                            </div>
                            <div class="ml_main_rt">
                                <h1><?php echo $v['store_name'];?></h1>
                                <h2>联系电话：<?php echo $v['phone'];?></h2>
                                <img src="<?php echo ADMIN_URL;?>tpl/25/201608style/img/dizhi_03.png">
                                <h3><?php echo $v['address'];?></h3>
                                <a href="<?php ADMIN_URL; ?>catalog.php?act=store_detail&store_id=<?php echo $v['store_id'];?>">进入店铺</a>
                            </div>
                        </li>
                      <?php }?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

<?php $this->element( '25/footer', array('lang'=>$lang) ); ?>