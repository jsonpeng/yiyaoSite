<?php
/*
 * 注册自定义菜单
 */
register_nav_menus(array('header-menu' => __( 'website-Menu' ),));

/*
 * 移除li不必要的class
 */
add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
function my_css_attributes_filter($var) {
    return is_array($var) ? array() : '';
}


/*
 * 网站标题
 */
function website_title(){
    echo '湖北绅泰铠医药有限公司官方网站';
}


/*
解决图片上传过大问题
*/
add_filter( 'wp_image_editors', 'change_graphic_lib' );
function change_graphic_lib($array) {
return array( 'WP_Image_Editor_GD', 'WP_Image_Editor_Imagick' );
}

/*
 * 网站导航菜单参数设置
 *
 */
function website_navbar_setting(){
 wp_nav_menu(
    array('theme_location'  => '',//指定显示的导航名，如果没有设置，则显示第一个
'container'       =>'div', //最外层容器标签名
'container_class' => 'collapse navbar-collapse', //最外层容器class名
'container_id'    => 'example-navbar-collapse',//最外层容器id值
'menu_class'      => 'nav navbar-nav', //ul标签class
'echo'            => true,//是否打印，默认是true，如果想将导航的代码作为赋值使用，可设置为false
'fallback_cb'     => 'wp_page_menu',//备用的导航菜单函数，用于没有在后台设置导航时调用
'before'          => '',//显示在导航a标签之前
'after'           => '',//显示在导航a标签之后
'link_before'     => '',//显示在导航链接名之后
'link_after'      => '',//显示在导航链接名之前
'depth'           => 2,////显示的菜单层数，默认0，0是显示所有层
'walker'          => new wp_bootstrap_navwalker())//调用一个对象定义显示导航菜单
);
    /*展开之后html代码
                    <div class="collapse navbar-collapse" id="example-navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li ><a href="/index">首页</a></li>
                            <li><a href="/service">服务项目</a></li>
                            <li><a href="/example"> 精彩案例</a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">h5</a></li>
                                </ul>
                            </li>
                            <li><a href="/about">关于我们</a></li>
                            <li><a href="/news">新闻中心</a></li>
                            <li><a href="#">联系我们</a></li>
                        </ul>
                    </div>
    */
}





/*
 * bootstrap 自定义nav设置
 */
class wp_bootstrap_navwalker extends Walker_Nav_Menu {

    /**
     * @see Walker::start_lvl()
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int $depth Depth of page. Used for padding.
     */
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat( "\t", $depth );
        $output .= "\n$indent<ul role=\"menu\" class=\" dropdown-menu\">\n";
    }

    /**
     * @see Walker::start_el()
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item Menu item data object.
     * @param int $depth Depth of menu item. Used for padding.
     * @param int $current_page Menu item ID.
     * @param object $args
     */
    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        /**
         * Dividers, Headers or Disabled
         * =============================
         * Determine whether the item is a Divider, Header, Disabled or regular
         * menu item. To prevent errors we use the strcasecmp() function to so a
         * comparison that is not case sensitive. The strcasecmp() function returns
         * a 0 if the strings are equal.
         */
        if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {
            $output .= $indent . '<li role="presentation" class="divider">';
        } else if ( strcasecmp( $item->title, 'divider') == 0 && $depth === 1 ) {
            $output .= $indent . '<li role="presentation" class="divider">';
        } else if ( strcasecmp( $item->attr_title, 'dropdown-header') == 0 && $depth === 1 ) {
            $output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
        } else if ( strcasecmp($item->attr_title, 'disabled' ) == 0 ) {
            $output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
        } else {

            $class_names = $value = '';

            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
            $classes[] = 'menu-item-' . $item->ID;

            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

            if ( $args->has_children )
                $class_names .= ' dropdown';

            if ( in_array( 'current-menu-item', $classes ) )
                $class_names .= ' active';

            $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

            $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
            $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

            $output .= $indent . '<li' . $id . $value . $class_names .'>';

            $atts = array();
            $atts['title']  = ! empty( $item->title )   ? $item->title  : '';
            $atts['target'] = ! empty( $item->target )  ? $item->target : '';
            $atts['rel']    = ! empty( $item->xfn )     ? $item->xfn    : '';

            // If item has_children add atts to a.
            if ( $args->has_children && $depth === 0 ) {
                $atts['href']           = '#';
                $atts['data-toggle']    = 'dropdown';
                $atts['class']          = 'dropdown-toggle';
                $atts['aria-haspopup']  = 'true';
            } else {
                $atts['href'] = ! empty( $item->url ) ? $item->url : '';
            }

            $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

            $attributes = '';
            foreach ( $atts as $attr => $value ) {
                if ( ! empty( $value ) ) {
                    $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                    $attributes .= ' ' . $attr . '="' . $value . '"';
                }
            }

            $item_output = $args->before;

            /*
             * Glyphicons
             * ===========
             * Since the the menu item is NOT a Divider or Header we check the see
             * if there is a value in the attr_title property. If the attr_title
             * property is NOT null we apply it as the class name for the glyphicon.
             */
            if ( ! empty( $item->attr_title ) )
                $item_output .= '<a'. $attributes .'><span class="glyphicon ' . esc_attr( $item->attr_title ) . '"></span>&nbsp;';
            else
                $item_output .= '<a'. $attributes .'>';

            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
            $item_output .= ( $args->has_children && 0 === $depth ) ? ' <span class="caret"></span></a>' : '</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }
    }

    /**
     * Traverse elements to create list from elements.
     *
     * Display one element if the element doesn't have any children otherwise,
     * display the element and its children. Will only traverse up to the max
     * depth and no ignore elements under that depth.
     *
     * This method shouldn't be called directly, use the walk() method instead.
     *
     * @see Walker::start_el()
     * @since 2.5.0
     *
     * @param object $element Data object
     * @param array $children_elements List of elements to continue traversing.
     * @param int $max_depth Max depth to traverse.
     * @param int $depth Depth of current element.
     * @param array $args
     * @param string $output Passed by reference. Used to append additional content.
     * @return null Null on failure with no changes to parameters.
     */
    public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element )
            return;

        $id_field = $this->db_fields['id'];

        // Display this element.
        if ( is_object( $args[0] ) )
            $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );

        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }

    /**
     * Menu Fallback
     * =============
     * If this function is assigned to the wp_nav_menu's fallback_cb variable
     * and a manu has not been assigned to the theme location in the WordPress
     * menu manager the function with display nothing to a non-logged in user,
     * and will add a link to the WordPress menu manager if logged in as an admin.
     *
     * @param array $args passed from the wp_nav_menu function.
     *
     */
    public static function fallback( $args ) {
        if ( current_user_can( 'manage_options' ) ) {

            extract( $args );

            $fb_output = null;

            if ( $container ) {
                $fb_output = '<' . $container;

                if ( $container_id )
                    $fb_output .= ' id="' . $container_id . '"';

                if ( $container_class )
                    $fb_output .= ' class="' . $container_class . '"';

                $fb_output .= '>';
            }

            $fb_output .= '<ul';

            if ( $menu_id )
                $fb_output .= ' id="' . $menu_id . '"';

            if ( $menu_class )
                $fb_output .= ' class="' . $menu_class . '"';

            $fb_output .= '>';
            $fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">Add a menu</a></li>';
            $fb_output .= '</ul>';

            if ( $container )
                $fb_output .= '</' . $container . '>';

            echo $fb_output;
        }
    }
}

/*
 *添加特色图片 即文章略缩图
 */
add_theme_support( 'post-thumbnails' );


//网站静态文件前缀
function website_static_pre(){
    echo 'http://weileyiyao.com/wp-content/themes/yiyao/';

}


//添加自定义产品
function my_custom_post_product() {
    $args = array();
    register_post_type( 'product', $args ); 
}
add_action( 'init', 'my_custom_post_product');

function custom_post_product_menu() {
  $labels = array(
    'name'               => _x( 'Product', 'post type 名称' ),
    'singular_name'      => _x( 'Product', 'post type 单个 item 时的名称，因为英文有复数' ),
    'add_new'            => _x( '新建产品', '添加新内容的链接名称' ),
    'add_new_item'       => __( '新建一个产品(创建新的产品名称)' ),
    'edit_item'          => __( '编辑产品' ),
    'new_item'           => __( '新产品' ),
    'all_items'          => __( '所有产品' ),
    'view_item'          => __( '查看产品' ),
    'search_items'       => __( '搜索产品' ),
    'not_found'          => __( '没有找到有关产品' ),
    'not_found_in_trash' => __( '回收站里面没有相关产品' ),
    'parent_item_colon'  => '',
    'menu_name'          => '产品管理'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => '我们网站的产品信息',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array('title','editor'),
    'has_archive'   => true
  );
  register_post_type( 'product', $args );
}

add_action( 'init', 'custom_post_product_menu');

//添加产品分类
function my_custom_cat_product() {
  $labels = array(
    'name'              => _x( '产品分类', 'taxonomy 名称' ),
    'singular_name'     => _x( '产品分类', 'taxonomy 单数名称' ),
    'search_items'      => __( '搜索产品分类' ),
    'all_items'         => __( '所有产品分类' ),
    'parent_item'       => __( '该产品分类的上级分类' ),
    'parent_item_colon' => __( '该产品分类的上级分类：' ),
    'edit_item'         => __( '编辑产品分类' ),
    'update_item'       => __( '更新产品分类' ),
    'add_new_item'      => __( '添加新的产品分类' ),
    'new_item_name'     => __( '新产品分类' ),
    'menu_name'         => __( '产品分类' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'product_category', 'product', $args );
}
add_action( 'init', 'my_custom_cat_product', 0 );

//添加产品自定义字段
add_filter( 'rwmb_meta_boxes', 'your_prefix_meta_boxes' );
function your_prefix_meta_boxes( $meta_boxes ) {
    $meta_boxes[] = array(
        'title'      => __( '产品扩展', 'textdomain' ),
        'post_types' => 'product',
        'fields'     => array(
          array(
				'name'             => __( '产品略缩图', 'textdomain' ),
				'id'               => "product_img_min",
				'type'             => 'plupload_image',
				// Delete image from Media Library when remove it from post meta?
				// Note: it might affect other posts if you use same image for multiple posts
				'force_delete'     => false,
				// Maximum image uploads
				'max_file_uploads' => 1,
				// Display the "Uploaded 1files" status
				'max_status'       => true,
			),
			   array(
                'id'      => 'product_cat',
                'name'    => __( '产品所属分类', 'textdomain' ),
                'type'    => 'text',
            ),
			
			    array(
                'id'      => 'product_spe',
                'name'    => __( '产品规格', 'textdomain' ),
                'type'    => 'textarea',
            ),
			  array(
                'id'      => 'product_pack',
                'name'    => __( '产品包装', 'textdomain' ),
                'type'    => 'textarea',
            ),
            array(
                'id'      => 'product_function',
                'name'    => __( '产品主治', 'textdomain' ),
                'type'    => 'textarea',
            ),
			  array(
						'id'   => 'product_address',
						'name' => __( '生产企业', 'textdomain' ),
						'type' => 'text',
					),
            array(
                'id'   => 'product_price',
                'name' => __( '产品零售价格', 'textdomain' ),
                'type' => 'text',
            ),
        ),
    );
    return $meta_boxes;
}




//添加自定义网站前端文本编辑
add_action('admin_menu', 'options_admin_menu');


function options_admin_menu(){
	add_submenu_page( 'options-general.php','网站信息设置', '网站信息设置', 'administrator', 'custom-setting', 'customSetting' );
}

function customSetting(){ ?>
	<div class="wrap">
	<h2>网站页首信息设置</h2>
	<?php
	if ($_POST['update_options']=='true') {//若提交了表单，则保存变量
		update_option('website-title', $_POST['website-title']);
		update_option('website-keyword', $_POST['website-keyword']);
		update_option('website-des', $_POST['website-des']);
		update_option('welcome-text', $_POST['welcome-text']);
		update_option('hot-phone', $_POST['hot-phone']);
		update_option('index-about-text', $_POST['index-about-text']);
		update_option('footer-phone1', $_POST['footer-phone1']);
		update_option('footer-phone2', $_POST['footer-phone2']);
		update_option('reg-address', $_POST['reg-address']);
		update_option('ware-address', $_POST['ware-address']);
		
	
		//若值为空，则删除这行数据
		if( empty($_POST['website-title']) ) delete_option('website-title' );
		if( empty($_POST['website-keyword']) ) delete_option('website-keyword' );
		if( empty($_POST['website-des']) ) delete_option('website-des' );
		if( empty($_POST['welcome-text']) ) delete_option('welcome-text' );
		if( empty($_POST['hot-phone']) ) delete_option('hot-phone' );
		if( empty($_POST['index-about-text']) ) delete_option('index-about-text' );
		if( empty($_POST['footer-phone1']) ) delete_option('footer-phone1' );
		if( empty($_POST['footer-phone2']) ) delete_option('footer-phone2' );
		if( empty($_POST['reg-address']) ) delete_option('reg-address' );
		if( empty($_POST['ware-address']) ) delete_option('ware-address' );
	


		echo '<div id="message" class="updated below-h2"><p>保存成功！</p></div>';//保存完毕显示文字提示
	}
	//下面开始界面表单
	?>
	<form method="POST" action="">
		<input type="hidden" name="update_options" value="true" />
		<table class="form-table">
		
			<tr>
				<th scope="row">网站标题:</th>
				<td><textarea rows="2" name="website-title" id="website-title" style="width: 100%;"><?php echo get_option('website-title'); ?></textarea></td>
			</tr>
			
			<tr>
				<th scope="row">网站关键字:</th>
				<td><textarea rows="1" name="website-keyword" id="website-keyword" style="width: 100%;"><?php echo get_option('website-keyword'); ?></textarea></td>
			</tr>
			
				<tr>
				<th scope="row">网站描文本（描述.助于SEO优化）:</th>
				<td><textarea rows="2" name="website-des" id="website-des" style="width: 100%;"><?php echo get_option('website-des'); ?></textarea></td>
			</tr>
		
			<tr>
				<th scope="row">左上角欢迎导语:</th>
				<td><textarea rows="2" name="welcome-text" id="welcome-text" style="width: 100%;"><?php echo get_option('welcome-text'); ?></textarea></td>
			</tr>
			
			<tr>
				<th scope="row">热线电话:</th>
				<td><input type="text" name="hot-phone" id="hot-phone" style="width: 20%;" value="<?php echo get_option('hot-phone'); ?>" /></td>
			</tr>
		
			<tr>
				<th scope="row">首页中间关于我们文字:</th>
				<td><textarea rows="3" name="index-about-text" id="index-about-text" style="width: 100%;"><?php echo get_option('index-about-text'); ?></textarea></td>
			</tr>
			
			
		<tr>
			<th scope="row"><h2>页尾信息设置</h2></th>
		</tr>
		
		
			<tr>
				<th scope="row">联系电话:</th>
				<td><input type="text" name="footer-phone1" id="footer-phone1" style="width: 20%;" value="<?php echo get_option('footer-phone1'); ?>" /></td>
			</tr>
				<tr>
				<th scope="row">传真:</th>
				<td><input type="text" name="footer-phone2" id="footer-phone2" style="width: 20%;" value="<?php echo get_option('footer-phone2'); ?>" /></td>
			
			</tr>
			<tr>
				<th scope="row">注册地址:</th>
				<td><textarea rows="2" name="reg-address" id="reg-address" style="width: 100%;"><?php echo get_option('reg-address'); ?></textarea></td>
			
			</tr>
		
			<tr>
				<th scope="row">仓库地址:</th>
			<td><textarea rows="2" name="ware-address" id="ware-address" style="width: 100%;"><?php echo get_option('ware-address'); ?></textarea></td>
			</tr>
		
		</table>
		<p><input type="submit" class="button-primary" name="admin_options" value="保存"/></p>
	</form>
	</div>
	<?php
	add_action('admin_menu', 'customSetting');
}




//面包屑导航
function the_breadcrumb($cat) {
              
        if (!is_home()) {
                echo '<a href="';
                echo get_option('home');
                echo '" style="color:#999;">';
                echo '首页';
                echo "</a>&nbsp;>&nbsp;";
                if (in_category($cat) || is_single()) {
                        echo '<a href="';
						echo  $cat;
					    echo '">';
						echo $cat;
						  echo "</a>&nbsp;>&nbsp;";
                        if (is_single()) {
                                echo "</a>&nbsp;>&nbsp;<a>";
                                the_title();
                                echo '</a>&nbsp;>&nbsp;';
                        }
                } elseif(is_page()){
					    echo '<a href="" style="color:black;">';
                        echo the_title();
                        echo '</a>';
				}
        }
        elseif (is_tag()) {single_tag_title();}
        elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
        elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
        elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
        elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
        elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
        elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
       
}




//分页代码
function all_pagenavi( $range = 4 ) {
    global $paged,$wp_query;
    if ( !$max_page ) {
        $max_page = $wp_query->max_num_pages;
    }
    if( $max_page >1 ) {
        echo "<div class='fenye'>"; 
        if( !$paged ){
            $paged = 1;
        }
		
		
		echo '<span>当前为第'.$paged.'页</span>/';
        echo '<span>共'.$max_page.'页</span>';
		echo '&nbsp;&nbsp;&nbsp;';
       // if( $paged != 1 ) {
            echo "<a href='".get_pagenum_link(1) ."' class='extend' title='跳转到首页'>首页</a>";
        //}
        previous_posts_link('上一页');
        if ( $max_page >$range ) {
            if( $paged <$range ) {
                for( $i = 1; $i <= ($range +1); $i++ ) {
                    echo "<a href='".get_pagenum_link($i) ."'";
                if($i==$paged) echo " class='current'";echo ">$i</a>";
                }
            }elseif($paged >= ($max_page -ceil(($range/2)))){
                for($i = $max_page -$range;$i <= $max_page;$i++){
                    echo "<a href='".get_pagenum_link($i) ."'";
                    if($i==$paged)echo " class='current'";echo ">$i</a>";
                    }
                }elseif($paged >= $range &&$paged <($max_page -ceil(($range/2)))){
                    for($i = ($paged -ceil($range/2));$i <= ($paged +ceil(($range/2)));$i++){
                        echo "<a href='".get_pagenum_link($i) ."'";if($i==$paged) echo " class='current'";echo ">$i</a>";
                    }
                }
            }else{
                for($i = 1;$i <= $max_page;$i++){
                    echo "<a href='".get_pagenum_link($i) ."'";
                    if($i==$paged)echo " class='current'";echo ">$i</a>";
                }
            }
        next_posts_link('下一页');
        //if($paged != $max_page){
            echo "<a href='".get_pagenum_link($max_page) ."' class='extend' title='跳转到最后一页'>尾页</a>";
        //}

        echo "</div>\n";  
    }
} 

