<? get_header(); ?>
<div class="c">
	<div id="left-box">
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
								<? _e( 'category', 'chongen' ); ?>：<? the_category(','); ?><span>|</span>
								<? _e( 'author', 'chongen' ); ?>：<? the_author(); ?><span>|</span>
								<? echo __( 'time', 'chongen' ); ?>：<? the_time( 'Y-m-d' ); ?>
								<? edit_post_link( __( 'Edit','chongen' ), ' <span>|</span> ', '' ); ?>
							</div>
						</div>
						<?
					}
				}else{
					echo '没有日志可以显示';
				}
			?>
		</div>
		<div class="posts_nav_link">
			<? posts_nav_link(); ?>
		</div>
	</div>
	<? get_sidebar(); ?>
</div>
<? get_footer(); ?>