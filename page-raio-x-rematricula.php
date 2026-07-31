<?php
/**
 * Ferramenta de diagnóstico. O conteúdo mora em inc/ferramentas.php.
 * Template ligado ao slug raio-x-rematricula (ver inc/paginas.php).
 */
get_header();
?>
<main>
	<?php se_ferramenta_quiz( 'raio-x-rematricula' ); ?>
	<?php se_ferramenta_rodape( 'raio-x-rematricula' ); ?>
</main>
<?php get_footer();
