<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package seed
 */
get_header();?>



<div class="s-container main-body">

  <br/>  <br/>  <br/>  <br/>  <br/>
  <div class="section-separator">
    <h1>404</h1>
    <h4>หน้านี้ไม่มีอยู่จริง</h4>
  </div>


  <div class="section-separator">
    <h4>สามารถอ่านเรื่องราวอื่น ๆ ได้ที่</h4>
  </div>

  <div class="home-widget-banner s-grid -m2 -d4">

    <div class="widget-grid">
      <?php dynamic_sidebar( 'inconversation1' ); ?>
    </div>

    <div class="widget-grid">
      <?php dynamic_sidebar( 'inconversation2' ); ?>
    </div>

    <div class="widget-grid">
      <?php dynamic_sidebar( 'inconversation3' ); ?>
    </div>

    <div class="widget-grid">
      <?php dynamic_sidebar( 'inconversation4' ); ?>
    </div>

  </div>


</div>

<?php get_footer();?>
