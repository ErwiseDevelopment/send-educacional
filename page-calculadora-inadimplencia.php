<?php
/**
 * Ferramenta de diagnóstico. O conteúdo mora em inc/ferramentas.php.
 * Template ligado ao slug calculadora-inadimplencia (ver inc/paginas.php).
 */
get_header();
?>
<main>
	<?php se_ferramenta_calculadora( 'calculadora-inadimplencia' ); ?>
	<?php se_ferramenta_rodape( 'calculadora-inadimplencia' ); ?>
</main>
<?php get_footer();
