<?php 
/*
 * 用来判断产品详情和新闻内页
 */

if ( in_category('公司新闻') || in_category('行业新闻')) {
    include('page-news-detail.php');
}
?>