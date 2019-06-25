<?php
/**
 * @package WordPress
Template Name:News-Center
 */
get_header();
?>





<!--中间内容-->
<div class="index-all-content">
    <div class="container">
        <div class="row mt30 ">

            <!-- 左导航块-->
            <div class="col-xs-3 pl0">
                <ul class="all-content-kuai">
                    <li class="ml-40 all-content-li-active"><a href="/新闻中心">新闻中心</a></li>
                    <li class="ml-40 "><a href="/新闻中心/公司新闻">公司新闻</a></li>
                    <li class="ml-40 bb-none"><a href="/新闻中心/行业新闻">行业新闻</a></li>
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

              
				
  <?php $limit = get_option('posts_per_page');
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts('post_type=post&post_status=publish&showposts=' . $limit=6 . '&paged=' . $paged);
if (have_posts()) : while (have_posts()) : the_post(); ?>
				  
				  
                
                <div class="row ">
				<a  href="<?php the_permalink();?>" style="display:block;color:black;">
                    <div class="col-xs-7">
                        <p class="mt10">·&nbsp;&nbsp;
						<?php
						$title=the_title();
						$sub_title=mb_substr($title,0,19,'utf-8');
						ob_start();
						if(mb_strlen($title,'utf-8')>=20){ 
					    echo $sub_title;
						echo '...';
						ob_flush();
						ob_clean();
						}else{
						echo $title;
						ob_flush();
						ob_clean();
						}
						?></p>
                    </div>
                    <div class="f-right">
                        <p class="mt10"><?php echo the_time('Y-m-j');?></p>
                    </div>
				</a>
				<div class="row ml18 index-company-news-list"></div>
               </div>
			   
			<?php endwhile;?>
		
		
			<div class="f-right">		
			<?php all_pagenavi();?>
			</div>
					
 
			<?php endif;?>
			
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