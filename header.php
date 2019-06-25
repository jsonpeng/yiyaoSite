<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?php echo get_option('website-title'); ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
    <meta name="description" content="<?php echo get_option('website-des'); ?>"/>
    <meta name="keywords" content="<?php echo get_option('website-keyword'); ?>" />
    

    <link rel="shortcut icon" type="image/x-icon" href="<?php website_static_pre();?>images/logo-min.png">
    <link rel="stylesheet" type="text/css" href="<?php website_static_pre();?>css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?php website_static_pre();?>style.css">

            <!--[if lt IE 9]>
              <script src="<?php website_static_pre();?>js/html5-fit.min.js"></script>
              <script src="<?php website_static_pre();?>js/html5-res.min.js"></script>
            <![endif]-->
 
    <script src="<?php website_static_pre();?>js/jquery.min.js"></script>
    <script src="<?php website_static_pre();?>js/all.min.js"></script>
</head>

<body>

<!--顶部背景-->
        <div class="index-banner-bg">
            <div class="container">
                <div class="row mlmro index-banner-bg-line">

                 <div class="col-xs-5">
                    <p class="all-font-color"><?php echo get_option('welcome-text'); ?></p>
                </div>
                
                   <div class="pull-right">
                      <div class="row mlmr0 all-font-color">
                    <a href="/关于我们">关于我们</a>&nbsp;&nbsp;<a>|</a>&nbsp;&nbsp;<a href="/新闻中心">新闻中心</a>&nbsp;&nbsp;<a>|</a>&nbsp;&nbsp;<a href="/联系我们">联系我们</a>
                      </div>
                    </div>
                 </div>

                </div>
            </div>
        </div>
<!--/顶部背景-->

<!--顶部下方的内容-->
        <div class="index-banner-content">
            <div class="container">
                <div class="row mt30 mb30">
                    <div class="col-xs-5">
                     <a  href="/" class="index-banner-company-title"> <img class="index-logo" src="<?php website_static_pre();?>images/logo.png" /> </a>
                    </div>

				<!-- 搜索框功能-->
                    <div class="col-xs-4 mt10">
                        <form method="get" id="searchform" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input name="s" id="s" class="form-control mt8" type="text" /> 
                         <button type="submit" class="index-search-button">搜索</button>
                         </form>
                    </div>
				<!-- /搜索框功能-->

                    <div class="f-right mr50-can mt10">
                        <div class="row mt10">

                            <div class="col-xs-4">
                                <img src="<?php website_static_pre();?>images/tel.png" />
                             </div>

                            <div class="col-xs-8">
                                <p class="mb0">热线电话:</p>
                                <p><a href="tel:<?php echo get_option('hot-phone'); ?>" style="color:black;"> <?php echo get_option('hot-phone'); ?> </a></p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--/顶部下方的内容-->

<!--导航菜单-->
        <div class="index-banner-navbar">
        <nav class="navbar mynavbar" role="navigation">
                <div class="container-fluid">

               <div class="container">
                    <!--菜单管理定制-->
                   <?php website_navbar_setting();?>
                   <!--/菜单管理定制-->
                  </div>    
                </div>
            </nav>
        </div>
<!--/导航菜单-->

<!--轮播图-->
<?php 
    echo do_shortcode("[metaslider id=43]"); 
?>
<!--/轮播图-->