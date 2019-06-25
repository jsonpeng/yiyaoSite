<?php
/**
 * @package WordPress
Template Name:News-Detail
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
                    <li class="ml-40 <?php   $category = get_the_category();
	$cat=$category[0]->cat_name; if($cat==公司新闻){echo 'all-content-li-active ml0mr40';}?> "><a href="/新闻中心/公司新闻">公司新闻</a></li>
                    <li class="ml-40  <?php   $category = get_the_category();
	$cat=$category[0]->cat_name; if($cat==行业新闻){echo 'all-content-li-active ml0mr40';}?> bb-none"><a href="/新闻中心/行业新闻">行业新闻</a></li>
                </ul>
            </div>
            <!--/左导航块-->

            <!-- 右侧列表-->
            <div class="col-xs-8 col-xs-offset-1 mt20">
			
        <?php  while ( have_posts() ) : the_post(); ?>
		
                <div class="row ml0 pb10 about-bottom">
				
               	<!-- 面包屑导航-->
                 <a href="/" style="color:#999;">首页</a>&nbsp;>&nbsp; <a href="/新闻中心" style="color:#999;">新闻中心</a>&nbsp;>&nbsp;
				 <a href="/新闻中心/<?php   $category = get_the_category();
	$cat=$category[0]->cat_name; echo $cat;?>" style="color:#999;"><?php   $category = get_the_category();
	$cat=$category[0]->cat_name; echo $cat;?> </a>&nbsp;>&nbsp;<a style="color:black;"><?php the_title();?></a>
						
				<!-- 面包屑导航-->	
				
                </div>

                <div class="row ml0 mt3 about-top">
                </div>

              
				
                 

		
					<div class="row index-company-news-list  mb10" style="padding-bottom:10px;">

					<h1 style="text-align:center;font-size:30px;color:#337ab7;" ><?php the_title();?> </h1>
				     
					<div style="display:table;margin:0 auto;"> 作者:<?php the_author(); ?> &nbsp;&nbsp; 时间:<?php the_time('Y-m-j');?></div>
				</div>
              
			  
			  <div style="line-height:26px;">
			  <?php the_content();?>
			  </div>
			  
		<?php endwhile;?>
				
				   
             




				<div class="row mt30 mb30">
				
			<div class="col-xs-4">	   
		<?php  
		$categories = get_the_category();  
		$categoryIDS = array();  
		foreach ($categories as $category) {  
		array_push($categoryIDS, $category->term_id);  
		}  
		$categoryIDS = implode(",", $categoryIDS);  
		?>  
<?php if (get_previous_post($categoryIDS)) { previous_post_link('上一篇: %link','%title',true);} else { echo "没有了，已经是最后文章";} ?>  

			</div>
			
			<div class="f-right">
		<?php if (get_next_post($categoryIDS)) { next_post_link('上一篇: %link','%title',true);} else { echo "没有了，已经是最新文章";} ?> 
			</div>
			
            </div>
			
		
			
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