<?php
/**
 * @package WordPress
Template Name:Product-Jiyao
 */
get_header();
?>




<!--首页中间内容-->
<div class="index-all-content">
    <div class="container">
        <div class="row mt30 mb50">

            <!-- 左导航块-->
            <div class="col-xs-3 pl0">
                <ul class="all-content-kuai">
					<li class="ml-40 all-content-li-active">产品分类</li>
					<li class="ml-40 "><a href="/药品中心">全部产品</a></li>
                    <li class="ml-40 "><a href="/药品中心/全国独家">全国独家</a></li>
                    <li class="ml-40 all-content-li-active ml0mr40"><a href="/药品中心/全国基药">全国基药</a></li>
                    <li class="ml-40 "><a href="/药品中心/全国总代理">全国总代理</a></li>
                    <li class="ml-40 bb-none"><a href="/药品中心/流通产品">流通产品</a></li>
                </ul>
            </div>
            <!--/左导航块-->

            <!-- 右侧列表-->
            <div class="col-xs-8 col-xs-offset-1 mt20">

                <div class="row ml0 pb10 about-bottom">
				
                <!-- 面包屑导航-->
				
                   <a href="/" style="color:#999;">首页</a>&nbsp;>&nbsp;<a href="/药品中心" style="color:#999;">药品中心</a>&nbsp;>&nbsp;<a href="/药品中心/全国基药" style="color:black;">全国基药</a>
				
				<!-- 面包屑导航-->	
					
                </div>

                <div class="row ml0 mt3 about-top">
                </div>


                <div class="row ml0 mt20">

          <?php 
		  $limit = get_option('posts_per_page');
		  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		 
			$args = array(
				'post_type' => 'product', //自定义文章类型名称
				'post_status'=>'publish',
				'showposts' =>  $limit=9,
				'tax_query' => array(
					array(
						'taxonomy' => 'product_category',//自定义分类法名称
						'terms' => 7 //id为全国基药的
						),
					),
				'paged'=> $paged
				);
		  query_posts($args);
		  if (have_posts()) : while (have_posts()) : the_post();
				?>  


				<a href="<?php the_permalink();?>" style="display:block">
                    <div class="col-xs-4 pl0">
					
						<?php 
						$images = rwmb_meta( 'product_img_min', 'size=YOURSIZE' ); 
						$images = rwmb_meta( 'product_img_min', 'type=plupload_image&size=YOURSIZE' ); 
						if ( !empty( $images ) ) {
						foreach ( $images as $images_mobile_url ) {?>
	
                        <img src="<?php echo esc_url($images_mobile_url['url']); ?>" class="all-content-img-style mg0-left" />
						
					<?php }
												} ?>	
												
                        <p class="index-about-row" style="color:black;"><?php the_title();?></p>
                    </div>
                  </a>


		<?php endwhile;  ?>


                </div>
                <!-- 分页组件-->
				  <div class="f-right">		
					<?php all_pagenavi();?>
				</div>
                <!--/分页组件-->
   
   <?php endif;?>

            </div>
            <!-- /右侧列表-->
        </div>
    </div>
</div>



<?php get_footer();?>
   <!--获取静态文件-->
		   <?php wp_footer(); ?>
   <!--/获取静态文件-->