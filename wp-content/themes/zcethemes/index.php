<!doctype html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=<? echo get_bloginfo('charset'); ?>" />
	<title><? bloginfo('name'); ?></title>
	<meta name="description" content="<? bloginfo('description'); ?>" />
	<link rel="stylesheet" href="<? bloginfo('stylesheet_url'); ?>" type="text/css" />

	<? wp_head(); ?>
</head>
<body>
	<div id="header">
		<div id="headerimg">
			<h1><a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a></h1>
			<div class="description"><?php bloginfo('description'); ?></div>
		</div>
	</div>
	
	<div id="home-loop">
		<?
			if( have_posts() ){
				while( have_posts() ){
					
					//获取下一篇文章的信息，并且将信息存入全局变量 $post 中
					the_post();
					?>
					<div class="post-item">
						<div class="post-title"><h2><a href="<? the_permalink(); ?>"><? the_title(); ?></a><h2></div>
						<div class="post-content"><? the_content(); ?></div>
						
						<div class="post-meta">
							<? _e( 'category', 'zhangchongen' ); ?>：<? the_category(','); ?><span>|</span>
							
							<!--
							这里这句话找zhangchongen这个语言包，以及对应的category这个翻译，有就翻译，没有就原文
							_e获取翻译，并且输出
							_0获取翻译并返回值
							-->
							
							<? _e( 'author', 'zhangchongen' ); ?>：<? the_author(); ?><span>|</span>
							<? echo __( 'time', 'zhangchongen' ); ?>：<? the_time( 'Y-m-d' ); ?>
							<? edit_post_link( __( 'Edit','zhangchongen' ), ' <span>|</span> ', '' ); ?>
							
							<?php setPostViews(get_the_ID()); echo ' 浏览次数';echo number_format(getPostViews(get_the_ID())); ?>
						</div>
					</div>
					<?
				}
			}else{
				echo '没有日志可以显示';
			}
		?>
	</div>
	<? wp_footer(); ?>
</body>
</html>