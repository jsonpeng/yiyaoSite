<?php
/**
 * @package WordPress
Template Name:Commit
 */
get_header();
?>


<!--中间内容-->
<div class="index-all-content">
    <div class="container">
        <div class="row mt30 mb100">

            <!-- 左导航块-->
            <div class="col-xs-3 pl0">
                <ul class="all-content-kuai">
                    <li class="ml-40 all-content-li-active"><a href="/联系我们">联系我们</a></li>
                    <li class="ml-40 bb-none"><a href="/联系我们/招聘信息">招聘信息</a></li>
                </ul>
            </div>
            <!--/左导航块-->

            <!-- 右侧列表-->
            <div class="col-xs-8 col-xs-offset-1 mt20">

                <div class="row ml0 pb10 about-bottom">
                 
				 	<!-- 面包屑导航-->
                   <!-- <a href="/" style="color:#999;">首页</a>><a style="color:black;">药品中心</a>-->
					<?php the_breadcrumb();?>
					<!-- 面包屑导航-->	
				
                </div>

                <div class="row ml0 mt3 about-top">


                </div>
<!--
                <p class="about-content mt20 mb0">
                    医院客服：
                </p>

                <p class="about-content mb0">
                    销售一部 尹经理 电话027-83295367 手机15827225218 传真027-83263606
                </p>

                <p class="about-content mb0">
                    销售一部 尹经理 电话027-83295367 手机15827225218 传真027-83263606
                </p>

                <p class="about-content mb0">
                    销售一部 尹经理 电话027-83295367 手机15827225218 传真027-83263606
                </p>

                <p class="about-content mb0">
                    销售一部 尹经理 电话027-83295367 手机15827225218 传真027-83263606
                </p>

                <p class="about-content mb0">
                    销售一部 尹经理 电话027-83295367 手机15827225218 传真027-83263606
                </p>

                <p class="about-content mb0">
                    销售一部 尹经理 电话027-83295367 手机15827225218 传真027-83263606
                </p>

                <p class="about-content mb0">
                    销售一部 尹经理 电话027-83295367 手机15827225218 传真027-83263606
                </p>

                <p class="about-content mb0">
                    销售一部 尹经理 电话027-83295367 手机15827225218 传真027-83263606
                </p>

                <p class="about-content mb0">
                    销售一部 尹经理 电话027-83295367 手机15827225218 传真027-83263606
                </p>

                <p class="about-content mb0">
                    销售一部 尹经理 电话027-83295367 手机15827225218 传真027-83263606
                </p>

                <p class="about-content mb0">
                    销售一部 尹经理 电话027-83295367 手机15827225218 传真027-83263606
                </p>
-->
<?php while ( have_posts() ) : the_post(); ?>

<?php the_content();?>

<?php endwhile;?>

            </div>
            <!-- /右侧列表-->
        </div>
    </div>
</div>

<!--/中间内容-->



<?php get_footer();?>

   <!--获取静态文件-->
		   <?php wp_footer(); ?>
   <!--/获取静态文件-->