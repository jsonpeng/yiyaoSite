<?php
//描述：网站首页
get_header();
?>

<!--首页中间内容-->
        <div class="index-all-content">
            <div class="container">
                <div class="row mt30">

                <!-- 左导航块-->
                    <div class="col-xs-3 pl0">
                   <ul class="all-content-kuai">
                    <li class="ml-40 all-content-li-active">产品分类</li>
                    <li class="ml-40 "><a href="/药品中心/全国独家">全国独家</a></li>
                    <li class="ml-40 "><a href="/药品中心/全国基药">全国基药</a></li>
                    <li class="ml-40 "><a href="/药品中心/全国总代理">全国总代理</a></li>
                    <li class="ml-40 bb-none"><a href="/药品中心/流通产品">流通产品</a></li>
					</ul>
                    </div>
                <!--/左导航块-->

                <!-- 右侧药品列表-->
                    <div class="col-xs-8 col-xs-offset-1">
                        <div class="row">
		<?php
         //获取自定义产品类型列表
         $args = array( 'post_type' => 'product', 'order' => 'DESC','posts_per_page' => 9,'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1 );
         $loop = new WP_Query( $args );
        while ($loop->have_posts() ) : $loop->the_post();
         ?>
				<a href="<?php the_permalink();?>" style="display:block">
                    <div class="col-xs-4 pl0">
					
						<?php 
						$images = rwmb_meta( 'product_img_min', 'size=YOURSIZE' ); // Since 4.8.0
						$images = rwmb_meta( 'product_img_min', 'type=plupload_image&size=YOURSIZE' ); 
						if ( !empty( $images ) ) {
						foreach ( $images as $images_mobile_url ) {?>
	
                        <img src="<?php echo esc_url($images_mobile_url['url']); ?>" class="all-content-img-style mg0-left" />
						
					<?php }
												} ?>	
												
                        <p class="index-about-row" style="color:black;"><?php the_title();?></p>
                    </div>
                  </a>
                    
					
					
  <?php endwhile;?>
                   
						</div>

                    </div>
                 <!-- /右侧药品列表-->
                </div>
            </div>
        </div>

        <!--关于我们-->
        <div class="index-about-our mt30">
            <div class="container">
                    <h1 class="mt20">关于我们</h1>
                    <h2 class="mt0 mb40" style="font-size:20px;">Corpation Synopsis</h2>
                <div class="index-about-content mt40 pd20 mb20 ">
                     <p class="lh24" style="color:#666666;text-align:center;"> 
					 <?php echo get_option('index-about-text'); ?>
					 </p> 

            <div class="row  pt30 mb20 index-about-row">
                     <span class="index-about-content-icon">认知</span>  
                     <span class="index-about-content-icon">执行</span> 
                     <span class="index-about-content-icon">合作</span> 
                     <span class="index-about-content-icon">共赢</span> 
            </div>

                </div>
            </div>  
        </div>
        <!--/关于我们-->


        <!--公司新闻-->
       <div class="index-about-our cancel-bg cancel-for-black">
            <div class="container">
                     <h1 class="mt40">公司新闻</h1>
                     <h2 class="mt0 mb40" style="font-size:20px;">Company News</h2>
                 <div class="row index-company-news pt20 pb10 mb50">

                 <div class="col-xs-6">

            <?php     
     $args_query = array(
		  'category_name' => '公司新闻', 
          'posts_per_page' => 5,
		  'order' => 'DESC',
          'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1
      );
	   $count_2=0;
      query_posts($args_query);
      if( have_posts() ) :  while ( have_posts() ) : the_post();$count_2++; ?>

                     <div class="row ">
					 	<a  href="<?php the_permalink();?>" style="display:block;color:black;">
                     <div class="col-xs-7 pl40">
                        <p class="mt10">·&nbsp;&nbsp;<?php the_title();?>...</p>
                     </div>
                     <div class="col-xs-3 col-xs-offset-2">
                        <p class="mt10"><?php the_time('Y-m-j');?></p>
                     </div>
					 </a>
					 	 <div class="row index-company-news-list <?php if($count_2==5){ echo 'bb-none';} ?>" style="margin-left:50px;margin-right:20px;"></div>
                    </div>
<?php endwhile; ?>

<?php endif;?>


                 </div>

                 <div class="col-xs-6">

                            <?php     
     $args_query = array(
		  'category_name' => '公司新闻', 
          'posts_per_page' => 5,
		  'order' => 'ASC',
          'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1
      );
      query_posts($args_query);
	  $count_1=0;
      if( have_posts() ) :  while ( have_posts() ) : the_post();  $count_1++;?>

                     <div class="row  ">
					 	<a  href="<?php the_permalink();?>" style="display:block;color:black;">
                     <div class="col-xs-7 pl40">
                        <p class="mt10">·&nbsp;&nbsp;<?php the_title();?>...</p>
                     </div>
                     <div class="col-xs-3 col-xs-offset-2">
                        <p class="mt10"><?php the_time('Y-m-j');?></p>
                     </div>
					 </a>
					 <div class="row index-company-news-list <?php if($count_1==5){ echo 'bb-none';} ?>" style="margin-left:50px;margin-right:20px;"></div>
                    </div>
	<?php endwhile; ?>

	<?php endif;?>

                 </div>
            </div>
        </div>
        <!--/公司新闻-->
<!--/首页中间内容-->
			
           <?php get_footer();?>
		   
		   <!--获取静态文件-->
		   <?php wp_footer(); ?>
		    <!--/获取静态文件-->