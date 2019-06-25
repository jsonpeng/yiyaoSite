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
<?php while ( have_posts() ) : the_post(); ?>
            <!-- 左导航块-->
            <div class="col-xs-3 pl0">
                <ul class="all-content-kuai">
                  <li class="ml-40 all-content-li-active">产品分类</li>
				    <li class="ml-40 "><a href="/药品中心">全部产品</a></li>
                    <li class="ml-40 <?php $product_cat=rwmb_meta('product_cat', 'type=text' ); if($product_cat==全国独家){echo 'all-content-li-active ml0mr40';}?>"><a href="/药品中心/全国独家">全国独家</a></li>
                    <li class="ml-40 <?php $product_cat=rwmb_meta('product_cat', 'type=text' ); if($product_cat==全国基药){echo 'all-content-li-active ml0mr40';}?> "><a href="/药品中心/全国基药">全国基药</a></li>
                    <li class="ml-40 <?php $product_cat=rwmb_meta('product_cat', 'type=text' ); if($product_cat==全国总代理){echo 'all-content-li-active ml0mr40';}?>"><a href="/药品中心/全国总代理">全国总代理</a></li>
                    <li class="ml-40 <?php $product_cat=rwmb_meta('product_cat', 'type=text' ); if($product_cat==流通产品){echo 'all-content-li-active ml0mr40';}?> bb-none"><a href="/药品中心/流通产品">流通产品</a></li>
                </ul>
            </div>
            <!--/左导航块-->

            <!-- 右侧列表-->
            <div class="col-xs-8 col-xs-offset-1 mt20">
			
		
                <div class="row ml0 pb10 about-bottom">
                    <a href="/" class="product-not-active">首页</a>><a href="/药品中心" class="product-not-active">药品中心</a>><a href="/药品中心/<?php $product_cat=rwmb_meta('product_cat', 'type=text' ); echo  $product_cat; ?>" class="product-not-active"><?php $product_cat=rwmb_meta('product_cat', 'type=text' ); echo  $product_cat; ?></a>><a class="product-active"><?php the_title();?></a>
                </div>

                <div class="row ml0 mt3 about-top">
                </div>


                <div class="row ml0 mt20 mb30">

                    <div class="col-xs-6 pl0">
					
					
					
							<?php 
						$images = rwmb_meta( 'product_img_min', 'size=YOURSIZE' ); 
						$images = rwmb_meta( 'product_img_min', 'type=plupload_image&size=YOURSIZE' ); 
						if ( !empty( $images ) ) {
						foreach ( $images as $images_mobile_url ) {?>
	
                        <img src="<?php echo esc_url($images_mobile_url['url']); ?>" class="all-content-img-style mg0" />
						
					<?php }
												} ?>	
                    
						
                    </div>

                    <div class="col-xs-4 ">

                        <div class="row ml0 lh30">
                            <p class="product-not-active product-right-list">商品名称:</p>

                            <p class="product-active"><?php the_title();?></p>
                        </div>

                        <div class="row ml0 lh30">
                            <p class="product-not-active product-right-list">规格:</p>

                            <p class="product-active"><?php $product_spe=rwmb_meta('product_spe', 'type=text' ); echo  $product_spe; ?> <?php $product_pack=rwmb_meta('product_pack', 'type=text' ); echo  $product_pack;?></p>
                        </div>

                        <div class="row ml0 lh30">
                            <p class="product-not-active product-right-list">所属分类:</p>

                            <p class="product-active"><?php $product_cat=rwmb_meta('product_cat', 'type=text' ); echo  $product_cat; ?></p>
                        </div>

                        <div class="row ml0 lh30">
                            <p class="product-not-active product-right-list">生产企业:</p>

                            <p class="product-active"><?php $product_address=rwmb_meta('product_address', 'type=text' ); echo  $product_address; ?></p>
                        </div>


                        <div class="row ml0 lh30">
                            <p class="product-not-active product-right-list">零售价:</p>

                            <p class="product-active"><?php $product_price=rwmb_meta('product_price', 'type=text' ); echo  $product_price; ?></p>
                        </div>
                    </div>

                </div>

                <div class="row ml0 mb30">
                    <a class="product-content">商品详情</a><a class="product-content-other">&nbsp;</a>
                </div>

                <p class="about-content">功能主治:</p>

                <p class="about-content"><?php $product_function=rwmb_meta('product_function', 'type=text' ); echo  $product_function; ?></p>

             
				
				<div class="mt30 mb30">
				
				

					<?php the_content();?>

					
				
				</div>							
                    
				

                <div class="row ml0 mb80">
                    <div class="col-xs-4">
                        <a class="product-not-active"><?php  previous_post_link('上一页: %link','%title',true);?></a>
                    </div>

                    <a class="product-not-active f-right"><?php next_post_link('下一页: %link','%title',true); ?> </a>
                </div>
			<?php endwhile;?>



            </div>
            <!-- /右侧列表-->
        </div>
    </div>
</div>



<?php get_footer();?>

   <!--获取静态文件-->
		   <?php wp_footer(); ?>
   <!--/获取静态文件-->