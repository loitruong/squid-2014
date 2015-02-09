<?php
function squid_scripts() {
	
	wp_enqueue_style( 'font-awesome-css', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css', array(), '4.2.0');
	wp_enqueue_style( 'bootstrap-css', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css', array(), '3.3.0');
	wp_enqueue_style( 'squid-css', get_template_directory_uri().'/style.css', array(), '1.0');
	wp_enqueue_script( 'squid-jQuery', '//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js',array(),'1.11.1',true);
	wp_enqueue_script( 'bootstrap-jQuery', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js',array(),'3.3.0',true);
	wp_enqueue_script( 'imagesloaded', '//cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/3.0.4/jquery.imagesloaded.min.js', array(),'3.0.4',true);
	
}
add_action( 'wp_enqueue_scripts', 'squid_scripts' );

add_action('get_header', 'remove_adminbar_pushdown');
function remove_adminbar_pushdown() {  
    remove_action('wp_head', '_admin_bar_bump_cb');  
}

//define('FS_METHOD', 'direct');

if (!isset($content_width)) $content_width = 770;

/**
 * squid_setup function.
 * 
 * @access public
 * @return void
 */
function squid_setup() {

	require 'inc/general/class-Squid_Walker_Nav_Menu.php';

	load_theme_textdomain('squid', get_template_directory().'/languages');

	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'Bootstrap WP Primary' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	/**
	 * Setup the WordPress core custom background feature.
	 */
	add_theme_support( 'custom-background', apply_filters( 'squid_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	)));
}

add_action( 'after_setup_theme', 'squid_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function squid_widgets_init() {
	register_sidebar(array(
		'name'          => __('Sidebar','squid'),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	));
}
add_action( 'widgets_init', 'squid_widgets_init' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory().'/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory().'/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory().'/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory().'/inc/jetpack.php';

/**
 * PREZ for Advanced Custom Fields
 */
function prez($args = 'nope'){
	$argType = gettype($args);
	if($argType == 'string'){
		$prez = get_fields(); 
	}
	elseif ($argType == 'array'){
		$prez = $args;	
	}
	elseif ($argType == 'integer'){
		$prez = get_fields($args);
	}
	echo '<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.2/highlight.min.js"></script>';
	echo '<script type="text/javascript">hljs.initHighlightingOnLoad();</script>';
	echo '<style>.hljs{display:block;overflow-x:auto;padding:.5em;background:#f0f0f0;-webkit-text-size-adjust:none}.apache .hljs-cbracket,.apache .hljs-tag,.asciidoc .hljs-header,.bash .hljs-variable,.coffeescript .hljs-attribute,.django .hljs-variable,.erlang_repl .hljs-function_or_atom,.haml .hljs-symbol,.hljs-addition,.hljs-constant,.hljs-flow,.hljs-parent,.hljs-pragma,.hljs-preprocessor,.hljs-rules .hljs-value,.hljs-stream,.hljs-string,.hljs-tag .hljs-value,.hljs-template_tag,.hljs-title,.markdown .hljs-header,.ruby .hljs-symbol,.ruby .hljs-symbol .hljs-string,.smalltalk .hljs-class,.tex .hljs-command,.tex .hljs-special{color:#800}.asciidoc .hljs-blockquote,.diff .hljs-header,.hljs-annotation,.hljs-chunk,.hljs-comment,.hljs-template_comment,.markdown .hljs-blockquote,.smartquote{color:#888}.asciidoc .hljs-bullet,.asciidoc .hljs-link_url,.go .hljs-constant,.hljs-change,.hljs-date,.hljs-hexcolor,.hljs-literal,.hljs-number,.hljs-regexp,.lasso .hljs-variable,.makefile .hljs-variable,.markdown .hljs-bullet,.markdown .hljs-link_url,.smalltalk .hljs-char,.smalltalk .hljs-symbol{color:#080}.apache .hljs-sqbracket,.asciidoc .hljs-attribute,.asciidoc .hljs-link_label,.clojure .hljs-attribute,.coffeescript .hljs-property,.erlang_repl .hljs-reserved,.haml .hljs-bullet,.hljs-array,.hljs-attr_selector,.hljs-decorator,.hljs-deletion,.hljs-doctype,.hljs-envvar,.hljs-filter .hljs-argument,.hljs-important,.hljs-javadoc,.hljs-label,.hljs-localvars,.hljs-phony,.hljs-pi,.hljs-prompt,.hljs-pseudo,.hljs-shebang,.lasso .hljs-attribute,.markdown .hljs-link_label,.nginx .hljs-built_in,.ruby .hljs-string,.tex .hljs-formula,.vhdl .hljs-attribute{color:#88f}.apache .hljs-tag,.asciidoc .hljs-strong,.bash .hljs-variable,.css .hljs-tag,.hljs-built_in,.hljs-dartdoc,.hljs-id,.hljs-javadoctag,.hljs-keyword,.hljs-phpdoc,.hljs-request,.hljs-status,.hljs-title,.hljs-type,.hljs-typename,.hljs-winutils,.hljs-yardoctag,.markdown .hljs-strong,.smalltalk .hljs-class,.tex .hljs-command{font-weight:400}.asciidoc .hljs-emphasis,.markdown .hljs-emphasis{font-style:italic}.nginx .hljs-built_in{font-weight:400}.coffeescript .javascript,.javascript .xml,.lasso .markup,.tex .hljs-formula,.xml .css,.xml .hljs-cdata,.xml .javascript,.xml .vbscript{opacity:.5}.hljs,.hljs-change,.hljs-flow,.hljs-keyword,.hljs-literal,.hljs-strong,.hljs-tag,.hljs-tag .hljs-title,.hljs-winutils,.nginx .hljs-title,.tex .hljs-special{color:#fff}.hljs .hljs-constant,.hljs-code{color:#66d9ef}.hljs-class .hljs-title,.hljs-code,.hljs-header{color:#fff}.hljs-attribute,.hljs-link_label,.hljs-regexp,.hljs-symbol,.hljs-symbol .hljs-string,.hljs-value{color:#bf79db}.apache .hljs-cbracket,.apache .hljs-tag,.django .hljs-filter .hljs-argument,.django .hljs-template_tag,.django .hljs-variable,.hljs-addition,.hljs-attr_selector,.hljs-built_in,.hljs-bullet,.hljs-emphasis,.hljs-envvar,.hljs-javadoc,.hljs-link_url,.hljs-pragma,.hljs-preprocessor,.hljs-prompt,.hljs-pseudo,.hljs-stream,.hljs-string,.hljs-subst,.hljs-tag .hljs-value,.hljs-title,.hljs-type,.ruby .hljs-class .hljs-parent,.smalltalk .hljs-array,.smalltalk .hljs-class,.smalltalk .hljs-localvars,.tex .hljs-command{color:#1E824C}.apache .hljs-sqbracket,.hljs-annotation,.hljs-blockquote,.hljs-comment,.hljs-decorator,.hljs-deletion,.hljs-doctype,.hljs-horizontal_rule,.hljs-pi,.hljs-shebang,.hljs-template_comment,.smartquote,.tex .hljs-formula{color:#75715e}.apache .hljs-tag,.bash .hljs-variable,.css .hljs-id,.diff .hljs-header,.hljs-chunk,.hljs-dartdoc,.hljs-header,.hljs-keyword,.hljs-literal,.hljs-phpdoc,.hljs-request,.hljs-status,.hljs-title,.hljs-type,.hljs-winutils,.rsl .hljs-built_in,.smalltalk .hljs-class,.tex .hljs-special,.vbscript .hljs-built_in{font-weight:700}.coffeescript .javascript,.javascript .xml,.tex .hljs-formula,.xml .css,.xml .hljs-cdata,.xml .javascript,.xml .vbscript{opacity:.5}body{height:100%}.hljs{color:#C8F7C5}#pre-z{width:100%;position:fixed;top:0;height:100%;overflow-y:scroll;left:-100%;z-index:999999;-webkit-transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;transition:all .2s ease-in-out}input.pre-z-check{display:none}label.pre-z-lbl{color:#FFF;background-color:rgba(46,204,113,.95);padding:10px 30px;position:fixed;top:10px;left:0;z-index:999999;text-align:center;cursor:pointer;-webkit-transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;transition:all .2s ease-in-out}label.pre-z-lbl-x{color:#FFF;background-color:rgba(46,204,113,.95);padding:10px 30px;position:fixed;top:10px;left:0;z-index:9999999;-webkit-transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;transition:all .2s ease-in-out;cursor:pointer;opacity:0;border:3px solid #fff;border-left:0}#pre-z pre{margin:0;font-size:12px;font-family:"Lucida Sans Unicode","Lucida Grande",sans-serif;background-color:rgba(46,204,113,.95);color:#FFF;border:none;border-radius:0;padding-top:5px;height:100%}#pre-z code{background-color:transparent;height:100%}input.pre-z-check:checked~#pre-z{left:0}input.pre-z-check:checked~label.pre-z-lbl{opacity:0}input.pre-z-check:checked~label.pre-z-lbl-x{opacity:1}#pre-z p{padding:50px;text-align:center;word-break:break-all;word-wrap:break-word;line-height:1.4;font-size:14px}#pre-z p span{font-size:150%}#pre-z h1{font-size:50px;text-align:center}</style>
	<input id="pre-z-check" type="checkbox" class="pre-z-check">
	<label class="pre-z-lbl" for="pre-z-check">PRE-Z</label>
	<label class="pre-z-lbl-x" for="pre-z-check">CLOSE</label>
	<div id="pre-z">
	<pre><code class="css"><h1>PRE-Z</h1>';
	if($prez) { 
		print_r($prez);
	} else {
		echo '<p>SOMETHING WENT WRONG</p>';
	} 
	echo '</code></pre></div>';
}

/**
 * squid_breadcrumbs function.
 * Edit the standart breadcrumbs to fit the bootstrap style without producing more css
 * @access public
 * @return void
 */
function squid_breadcrumbs() {

	$delimiter = '&raquo;';
	$home = 'Home';
	$before = '<li class="active">';
	$after = '</li>';

	if (!is_home() && !is_front_page() || is_paged()) {

		echo '<ol class="breadcrumb">';

		global $post;
		$homeLink = get_bloginfo('url');
		echo '<li><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . '</li> ';

		if (is_category()) {
			global $wp_query;
			$cat_obj = $wp_query->get_queried_object();
			$thisCat = $cat_obj->term_id;
			$thisCat = get_category($thisCat);
			$parentCat = get_category($thisCat->parent);
			if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
			echo $before . single_cat_title('', false) . $after;

		} elseif (is_day()) {
			echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
			echo '<li><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a></li> ' . $delimiter . ' ';
			echo $before . get_the_time('d') . $after;

		} elseif (is_month()) {
			echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
			echo $before . get_the_time('F') . $after;

		} elseif (is_year()) {
			echo $before . get_the_time('Y') . $after;

		} elseif (is_single() && !is_attachment()) {
			if ( get_post_type() != 'post' ) {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li> ' . $delimiter . ' ';
				echo $before . get_the_title() . $after;
			} else {
				$cat = get_the_category(); $cat = $cat[0];
				echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
				echo $before . get_the_title() . $after;
			}

		} elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
			$post_type = get_post_type_object(get_post_type());
			echo $before . $post_type->labels->singular_name . $after;

		} elseif (is_attachment()) {
			$parent = get_post($post->post_parent);
			$cat = get_the_category($parent->ID); $cat = $cat[0];
			echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
			echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a></li> ' . $delimiter . ' ';
			echo $before . get_the_title() . $after;

		} elseif ( is_page() && !$post->post_parent ) {
			echo $before . get_the_title() . $after;

		} elseif ( is_page() && $post->post_parent ) {
			$parent_id  = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
				$page = get_page($parent_id);
				$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
				$parent_id  = $page->post_parent;
			}
			$breadcrumbs = array_reverse($breadcrumbs);
			foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
			echo $before . get_the_title() . $after;

		} elseif ( is_search() ) {
			echo $before . 'Search results for "' . get_search_query() . '"' . $after;

		} elseif ( is_tag() ) {
			echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;

		} elseif ( is_author() ) {
			global $author;
			$userdata = get_userdata($author);
			echo $before . 'Articles posted by ' . $userdata->display_name . $after;

		} elseif ( is_404() ) {
			echo $before . 'Error 404' . $after;
		}

		if ( get_query_var('paged') ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
			echo ': ' . __('Page') . ' ' . get_query_var('paged');
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
		}

		echo '</ol>';

	}
}

/**
 * Advanced Custom Fields option page support
 */
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Options',
		'menu_title'	=> 'Options',
		'menu_slug' 	=> 'options',
		'capability'	=> 'edit_posts',
		'redirect'	=> false
	));
	
	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Page 1',
	// 	'menu_title'	=> 'Page 1',
	// 	'parent_slug'	=> 'options',
	// ));
}

function kriesi_pagination($pages = '', $range = 2){  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
         echo "</div>\n";
     }
}

/**
 * Remove editor from admin menu
 * Uncomment add_action to enable
 */
function remove_the_editor() {
	remove_action('admin_menu', '_add_themes_utility_last', 101);
}
//add_action('_admin_menu', 'remove_the_editor', 1);

/**
 * Uncomment to remove item from admin menu
 */
function remove_menus(){
  
  	//remove_menu_page( 'index.php' );                  //Dashboard
  	//remove_menu_page( 'edit.php' );                   //Posts
  	//remove_menu_page( 'upload.php' );                 //Media
  	//remove_menu_page( 'edit.php?post_type=page' );    //Pages
  	remove_menu_page( 'edit-comments.php' );          //Comments
  	//remove_menu_page( 'themes.php' );                 //Appearance
  	//remove_menu_page( 'plugins.php' );                //Plugins
  	//remove_menu_page( 'users.php' );                  //Users
  	//remove_menu_page( 'tools.php' );                  //Tools
  	//remove_menu_page( 'options-general.php' );        //Settings
  
}
add_action( 'admin_menu', 'remove_menus' );
