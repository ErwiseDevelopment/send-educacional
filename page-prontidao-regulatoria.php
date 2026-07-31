<?php
/**
 * Ferramenta de diagnóstico. O conteúdo mora em inc/ferramentas.php.
 * Template ligado ao slug prontidao-regulatoria (ver inc/paginas.php).
 */
get_header();
?>
<main>
	<?php se_ferramenta_quiz( 'prontidao-regulatoria' ); ?>
	<?php se_ferramenta_rodape( 'prontidao-regulatoria' ); ?>
</main>
<?php get_footer();
