<footer>

	<div class="site-info container-lg">
		<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'bth-starter' ) ); ?>">
			<?php printf( esc_html__( 'Proudly powered by %s', 'bth-starter' ), 'WordPress' ); ?>
		</a>
		<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'bth-starter' ), 'bth-starter', '<a href="http://underscores.me/">Underscores.me</a>' ); ?>
	</div><!-- .site-info -->
			
</footer>

<!--<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>-->

<?php wp_footer(); ?>
</body>
</html>