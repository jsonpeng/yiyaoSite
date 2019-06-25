<?php
/**
 * @package WordPress
Template Name:Product-Detail
 */
get_header();
?>



<!--首页中间内容-->
<div class="index-all-content">
    <div class="container">
        <div class="row mt30 ">

            <!-- 左导航块-->
            <div class="col-xs-3 pl0">
                <ul class="all-content-kuai">
                    <li class="ml-40 all-content-li-active">产品分类</li>
                    <li class="ml-40 ">全国独家</li>
                    <li class="ml-40 ">全国基药</li>
                    <li class="ml-40 ">全国总代理</li>
                    <li class="ml-40 bb-none">流通产品</li>
                </ul>
            </div>
            <!--/左导航块-->

            <!-- 右侧列表-->
            <div class="col-xs-8 col-xs-offset-1 mt20">

                <div class="row ml0 pb10 about-bottom">
                    <a class="product-not-active">首页</a>><a class="product-not-active">药品中心</a>><a class="product-not-active">全国独家</a>><a class="product-active">注射用奥美拉</a>
                </div>

                <div class="row ml0 mt3 about-top">
                </div>


                <div class="row ml0 mt20 mb30">

                    <div class="col-xs-6 pl0">
                        <img src="images/demo.png" class="all-content-img-style mg0" />
                    </div>

                    <div class="col-xs-4 ">

                        <div class="row ml0 lh30">
                            <p class="product-not-active product-right-list">商品名称</p>:

                            <p class="product-active">商品的具体名称</p>
                        </div>

                        <div class="row ml0 lh30">
                            <p class="product-not-active product-right-list">规格</p>:

                            <p class="product-active">商品的规格</p>
                        </div>

                        <div class="row ml0 lh30">
                            <p class="product-not-active product-right-list">所属分类</p>:

                            <p class="product-active">全国独家</p>
                        </div>

                        <div class="row ml0 lh30">
                            <p class="product-not-active product-right-list">生产企业</p>:

                            <p class="product-active">哈尔冰</p>
                        </div>


                        <div class="row ml0 lh30">
                            <p class="product-not-active product-right-list">零售价</p>:

                            <p class="product-active">零售的价格</p>
                        </div>
                    </div>

                </div>

                <div class="row ml0 mb30">
                    <a class="product-content">商品详情</a><a class="product-content-other">&nbsp;</a>
                </div>

                <p class="about-content">功能主治:</p>

                <p class="about-content">清热解毒，化毒疗伤。清热解毒，化毒疗伤清热解毒，化毒疗伤清热解毒，化毒疗伤清热解毒，化毒疗伤清热解毒，化毒疗伤清热解毒，化毒疗伤清热解毒，化毒疗伤清热解毒，化毒疗伤</p>

                <img src="images/demo.png" class="mt30 mb30" />


                <div class="row ml0 mb80">
                    <div class="col-xs-4">
                        <a class="product-not-active">上一页:上一页标题</a>
                    </div>

                    <a class="product-not-active f-right">下一页:下一页标题 </a>
                </div>

            </div>
            <!-- /右侧列表-->
        </div>
    </div>
</div>



<?php get_footer();?>

   <!--获取静态文件-->
		   <?php wp_footer(); ?>
   <!--/获取静态文件-->