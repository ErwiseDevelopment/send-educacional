<?php
/**
 * Consentimentos do formulário, a prova que a LGPD pede.
 *
 * O site tinha um selo "Dados protegidos pela LGPD" no formulário, mas selo
 * não é consentimento: o titular precisa marcar que autoriza, e a empresa
 * precisa conseguir demonstrar depois que ele marcou. Aqui ficam a lista e a
 * exportação. Guardamos só o necessário, sem IP e sem rastro de navegação.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/** Tela em Ferramentas > Consentimentos (LGPD). */
function se_consentimentos_menu() {
	add_management_page(
		'Consentimentos (LGPD)',
		'Consentimentos (LGPD)',
		'manage_options',
		'se-consentimentos',
		'se_consentimentos_tela'
	);
}
add_action( 'admin_menu', 'se_consentimentos_menu' );

function se_consentimentos_tela() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( 'Sem permissão.' );
	}

	$registros = get_option( 'se_consentimentos', array() );
	if ( ! is_array( $registros ) ) {
		$registros = array();
	}
	?>
	<div class="wrap">
		<h1>Consentimentos (LGPD)</h1>
		<p>
			Quem autorizou o contato pelo formulário de demonstração, com a data e o texto que estava no ar.
			Guardamos os <strong>500 mais recentes</strong> e nenhum endereço de IP.
			Para atender a um pedido de exclusão, apague o lead no RD Station <em>e</em> a linha correspondente aqui.
		</p>

		<?php if ( ! $registros ) : ?>
			<div class="notice notice-info inline"><p>Nenhum consentimento registrado ainda.</p></div>
		<?php else : ?>
			<p>
				<a class="button" download="consentimentos.csv"
				   href="data:text/csv;charset=utf-8,<?php echo rawurlencode( se_consentimentos_csv( $registros ) ); ?>">Baixar CSV</a>
			</p>
			<table class="widefat striped">
				<thead>
					<tr>
						<th style="width:150px">Quando</th>
						<th>Nome</th>
						<th>E-mail</th>
						<th style="width:200px">Segmento</th>
						<th style="width:160px">Origem</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ( $registros as $r ) : ?>
					<tr>
						<td><?php echo esc_html( isset( $r['quando'] ) ? $r['quando'] : '' ); ?></td>
						<td><?php echo esc_html( isset( $r['nome'] ) ? $r['nome'] : '' ); ?></td>
						<td><?php echo esc_html( isset( $r['email'] ) ? $r['email'] : '' ); ?></td>
						<td><?php echo esc_html( isset( $r['segmento'] ) ? $r['segmento'] : '' ); ?></td>
						<td><?php echo esc_html( isset( $r['origem'] ) ? $r['origem'] : '' ); ?></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		<?php endif; ?>
	</div>
	<?php
}

/** CSV simples, para anexar a um pedido do titular ou a uma auditoria. */
function se_consentimentos_csv( $registros ) {
	$linhas = array( 'quando;nome;email;segmento;origem;texto' );

	foreach ( $registros as $r ) {
		$campos = array();
		foreach ( array( 'quando', 'nome', 'email', 'segmento', 'origem', 'texto' ) as $c ) {
			$valor    = isset( $r[ $c ] ) ? (string) $r[ $c ] : '';
			$campos[] = str_replace( array( ';', "\n", "\r" ), array( ',', ' ', '' ), $valor );
		}
		$linhas[] = implode( ';', $campos );
	}

	return implode( "\n", $linhas );
}
