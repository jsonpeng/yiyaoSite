<?php
/*
 * 用来判断产品和新闻模板的选择
 */
if (in_category('全国独家')){
	
	include('page-product-category-dujia.php');

}else if(in_category('全国基药')){
	
	include('page-product-category-jiyao.php');
	
}else if(in_category('全国总代理')){
	
	include('page-product-category-zongdaili.php');
	
}else if(in_category('流通产品')){
	
	include('page-product-category-liutong.php');
	
}