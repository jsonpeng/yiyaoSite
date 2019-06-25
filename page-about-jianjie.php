<?php
/**
 * @package WordPress
Template Name:About-jianjie
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
                    <li class="ml-40 all-content-li-active">关于我们</li>

                    <li class="ml-40 all-content-li-active ml0mr40 bb-none"><a href="/关于我们/公司简介">公司简介</a></li>
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
                    <h4>公司简介</h4>
                    <h4>Corpation synopsis</h4>

                </div>

               <!--  <p class="about-content mb0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;湖北华鸿医药有限公司,成立于2007年,位于九省通衡的华中重镇武汉市, 地处国家级高新开发区东西湖七雄路鑫斯特产业园内,交通发达,物流便携,公司自主产权,占地18000平米,是一家具有独立自主经营权资格的一级法人企业,公司秉用现代化矩阵管理模式,各经营及职能部分完善齐全,更驱潮流及建设整合前瞻性机构,以期迅即稳定发展，与时俱进。</p>

                <p class="about-content mb0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;公司汇集了以董事长肖立珍女士为首的一批业内享有盛誉的优秀行业精英，涵括管理，营销，策划，开拓创新，勤勉拼搏性等文谋开成之专业技术人才，并籍实现了管理规范科学化，经营广泛民主灵动化，服务理念超前化，营销网络（中国大陆）无域化，质量体系无暇化，产品日新月异化，客源稳定频增化。</p>

                <p class="about-content mb0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;公司以人为基,以知识信息，产品为石，紧抓给予，健康科学发展，本着先益人，后获之，兴业理念，坚持诚信与人之企业本质，携手共进，共职盛业，富家强国之志愿书事!</p>-->
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


