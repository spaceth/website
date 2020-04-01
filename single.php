<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package seed
 */

get_header(); ?>

<?php
	$singleclass ='';
	if ($GLOBALS['s_blog_layout_single'] == 'full-width') {
		$singleclass = 'single-area';
	}
?>
<?php while ( have_posts() ) : the_post(); ?>

	<header class="entry-header s-grid -m1 -d2">

	<div class="entry-header-info">

			<h4><?php the_author(); ?></h4>
			<h1><?php the_title(); ?></h1>
			<?php if(in_category('advertorial')): ?>
			<span class="advertorial-declare">Advertorial</span>
			<?php endif; ?>


			<div class="entry-tags">
			<?php
global $post;
foreach(get_the_tags($post->ID) as $tag)
{
		echo '<a href="' . get_tag_link($tag->term_id) . '">' . '#' . $tag->name . '</a>' . ' ' ;
}

?>
</div>

</div>

<?php if ( in_category('podcast') ) : ?>

	<div class="entry-header-image">

	<?php
		 if (has_post_thumbnail()) {
				 the_post_thumbnail("medium");
		 } else {
				 echo '<div class="podcast-image-article"> <img src="' . esc_url(get_template_directory_uri()) .'/img/template.jpg" alt="'. get_the_title() .'" /> </div> ';
		 }
	?>

</div>

<?php else : ?>

<div class="entry-header-image">

<?php
	 if (has_post_thumbnail()) {
			 the_post_thumbnail("full");
	 } else {
			 echo '<img src="' . esc_url(get_template_directory_uri()) .'/img/template.jpg" alt="'. get_the_title() .'" />';
	 }
?>
</div>

<?php endif; ?>


	</header>



<div class="s-container main-body <?php echo($singleclass);?> <?php echo '-'.$GLOBALS['s_blog_layout_single']; ?>">


    <div id="primary" class="content-area">
        <main id="main" class="site-main hide-title">

								<p style="text-align:right; opacity:0.3;"><?php the_date(); ?></p>

            <?php get_template_part( 'template-parts/content-single', get_post_type() ); ?>

            <?php if ( comments_open() || get_comments_number() ) { comments_template(); } ?>

            <?php wp_reset_postdata(); ?>

        </main>
    </div>

</div>
<?php endwhile; ?>
<?php get_footer(); ?>
