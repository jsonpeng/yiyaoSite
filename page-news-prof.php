<?php
/**
 * @package WordPress
Template Name:News-Prof
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
                    <li class="ml-40 all-content-li-active ml0mr40 bb-none"><a href="/新闻中心/行业新闻">行业新闻</a></li>
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

              
				
                 
        <?php
      $args_query = array(
		  'category_name' => '行业新闻', 
          'posts_per_page' => 3,
          'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1
      );
      query_posts($args_query);
       if( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				  
				  
                
                <div class="row ">
				<a  href="<?php the_permalink();?>" style="display:block;color:black;">
                    <div class="col-xs-7">
                        <p class="mt10">·&nbsp;&nbsp;
						<?php if(mb_strlen(the_title(),'utf-8')>20){ echo '...';} ?></p>
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