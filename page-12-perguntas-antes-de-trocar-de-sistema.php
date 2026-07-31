<?php
/**
 * Versão em tela do guia das 12 perguntas.
 * O conteúdo mora em inc/ferramentas.php; o PDF, em assets/materiais.
 */
get_header();
$se_fer = '12-perguntas-antes-de-trocar-de-sistema';
?>
<main>
	<?php se_ferramenta_quiz( $se_fer ); ?>
	<?php se_ferramenta_rodape( $se_fer ); ?>
</main>
<?php get_footer();
