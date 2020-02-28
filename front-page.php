<?php 

get_header();
$page = get_page_by_title('Home');
?>

<div class="content-home">

    <figure>
        <?php the_post_thumbnail(); ?>
    </figure>

    <div class="contenu">
        <?php
            $page = get_page_by_title('Accueil');
            $content = apply_filters('the_content', $page->post_content);
            echo $content;
 		?>

		<div class="section_evenements">

		<?php
			$args = array(
				'category_name' => 'Événement',
				'posts_per_page' => 3
			);

			$query = new WP_Query( $args );
			
			
			while ( $query->have_posts() ) {?>

				<article>
					<?php
					$query->the_post();
					echo get_the_post_thumbnail();
					echo "
					<a href=".get_the_permalink().">	
					<h1>". get_the_title() . "</h1>
					</a>	
					";
					?>
				</article>

			<?php }  //fin while
			
			wp_reset_postdata();
			?>
   		</div>
    </div>
</div>

<?php
get_footer();

?>