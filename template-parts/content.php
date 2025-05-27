<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ALLINHERE
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemscope itemtype="http://schema.org/Article">
	<?php do_action( 'allinhere_before_entry_header' ); ?>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title" itemprop="headline"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				// Example for datePublished and dateModified
				// echo '<time itemprop="datePublished" datetime="' . esc_attr( get_the_date( DATE_ISO8601 ) ) . '">' . esc_html( get_the_date() ) . '</time>';
				// if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
				// 	echo '<time itemprop="dateModified" datetime="' . esc_attr( get_the_modified_date( DATE_ISO8601 ) ) . '">' . esc_html( get_the_modified_date() ) . '</time>';
				// }
				// allinhere_posted_on(); // This function would ideally output the time tags
				// allinhere_posted_by(); // This function would ideally output author with itemprop="author"
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
	<?php do_action( 'allinhere_after_entry_header' ); ?>

	<?php // allinhere_post_thumbnail(); // If this function outputs an image, it should have itemprop="image" ?>

	<?php do_action( 'allinhere_before_entry_content' ); ?>
	<div class="entry-content" itemprop="articleBody">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'allinhere' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'allinhere' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
	<?php do_action( 'allinhere_after_entry_content' ); ?>

	<?php do_action( 'allinhere_before_entry_footer' ); ?>
	<footer class="entry-footer">
		<?php // allinhere_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	<?php do_action( 'allinhere_after_entry_footer' ); ?>
</article><!-- #post-<?php the_ID(); ?> -->
