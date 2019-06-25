<?php
//描述：搜索结果
get_header();
?>

<!--中间内容-->
<div class="index-all-content">
    <div class="container">
        <div class="row mt30 mb50">

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

            <!-- 右侧列表-->
            <div class="col-xs-8 col-xs-offset-1 mt20">
				 <div class="row  mt20">
				 
			<?php if ( have_posts() ) : ?>
				<?php  $i=0;while ( have_posts() ) : the_post(); $i++;?>
				<div>
				
				
					<?php
						$images = rwmb_meta( 'product_img_min', 'size=YOURSIZE' ); 
						$images = rwmb_meta( 'product_img_min', 'type=plupload_image&size=YOURSIZE' ); 
						if (empty( $images ) ) {
				?>
			
				<a href="<?php  echo get_permalink($post->ID); ?>" style="text-align:center;"><?php the_title(); ?></a>
				
					
			
			
						<?php }?>
			
					<?php
						$images = rwmb_meta( 'product_img_min', 'size=YOURSIZE' ); 
						$images = rwmb_meta( 'product_img_min', 'type=plupload_image&size=YOURSIZE' ); 
						if ( !empty( $images ) ) {
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
				
				<?php }?>
				
				</div>
					
				<?php endwhile; ?>
				
				<?php else :?>
				<div style="position: absolute; top: 0; margin-top: -40px;left: 50px; ">
			
				<h1 class="entry-title"><?php _e( '没有找到该内容', 'leizi' ); ?></h1>

				<div class="entry-content">
				<p><?php _e( '抱歉没有找到该内容', 'leizi' ); ?></p>
				<?php get_search_form(); ?>
				</div>
				</div>
				
				<?php endif; ?>
			</div>	
	<div style="    line-height: 42px ;height: 42px; color: #999; font-size: 16px;position: absolute;top: 0;margin-top: -30px;left: 0;<?php if($i==0){
		echo 'display:none;';
	}?>">为您搜索到相关内容<?php echo $i;?>个</div>			
			</div>
		<!-- /右侧列表-->
		</div>
	</div>
</div>

<?php get_footer();?>
  
  
  
  
  
  
  <!--获取静态文件-->
  <?php wp_footer(); ?>
  <!--/获取静态文件-->