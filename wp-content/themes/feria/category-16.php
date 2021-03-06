<?php get_header(); ?>
	<div id="content" class="clearfix row-fluid">
		<div id="main" class="span8 clearfix" role="main">  
			<div class="page-header">
                <?php if (is_category()) { ?>
                <?php if(qtrans_getLanguage() == 'es'): ?> 
				<ul class="breadcrumb"> 
					<li class="active"><?php single_cat_title(); ?></li> 
				</ul>
				<?php else: ?> 
				<ul class="breadcrumb">
					<li class="active"><?php single_cat_title(); ?></li> 
				</ul>
                <?php endif; ?>
                <?php } ?> 
			</div>
			<div class='travel span12'>
				<?php
				    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				    $args = array('cat'=>'16', 'orderby' => 'date', 'order' => 'DESC','paged' => $paged) ;
				    $query = new WP_Query( $args );	
				    if ($query->have_posts()) :
                    while ($query->have_posts() ) : $query->the_post();
				?>
				<article id="post-<?php echo get_the_ID(); ?>" class='bit' >
				    <header>
					    <div class='header-izq'>
                            <h2><?php echo get_the_title(); ?></h2>
                        </div>
						<div class='header-der'>
						    <time datetime="<?php echo get_the_time('Y-m-j', get_the_ID()); ?>" pubdate>
							    <?php echo /*date('j \d\e F \d\e\l Y', get_post_time())/**/strftime('%d de %B del %Y', get_post_time()) ?>
                            </time>
						</div>
					</header>
				    <section>
					    <p></p>
                        <?php the_content(''); ?>
					</section>
					<footer>
					<figure>  <?php echo get_the_post_thumbnail($page->ID, 'medium'); ?> </figure>
					    <div class="vermas"><a href="<?php the_permalink() ?>" >Ver Más + </a></div>
					</footer>
				</article>
				<?php
                    endwhile;
				    endif;
				?>
		    </div>

			<div class="row pagination">
                <nav class="wp-prev-next">
                    <ul class="clearfix">
						<li class="prev-link"><?php next_posts_link('Siguiente', $query->max_num_pages); ?></li> 
						<li class="next-link"><?php previous_posts_link('Anterior'); ?></li>
					</ul>
				</nav>
			</div> 
		</div>
        <!-- end #main -->
		<?php get_sidebar(); // sidebar 1 ?>
	</div> <!-- end #content -->
    <?php get_footer(); ?>
