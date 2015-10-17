
<?php
	// Define que o arquivo terá a codificação de saída no formato CSS
	header('Content-type:text/css');
	
	//body e texto
	$cor_texto = '#003333';
	$margin_top = '3px';
	$style_text = 'Comic Sans';
	//for_pesquisa
	$margin_form_pesquisa = '3%';
	$margin_form_pesquisa_button = '33%';
	$margin_form_pesquisa_bottom = '0%';
	
	//form_solicita_corrida
	$margin_form_solicita_corrida = '3%';
	$margin_form_solicita_corrida_top= '0%';
	
	//mapa
	$margin_mapa = '1%';
	$borda_espessura = '2px';
	$borda_estilo = 'solid';
	$margin_mapa_top = '1%';
	
	
	$espaco_logo_altura = '40%';
	$espaco_logo_largura = '80px';
	//$imagem_link = '../img/link.jpg'
?>

body {
	background: <?php echo $cor_fundo = '#FFFF99'; ?>;
	margin:<?php echo $margin_body = '15px'; ?>;
	font: "Comic Sans, Comic Sans MS, cursive";
}
header{
	width: <?php echo $largura_titulo; ?>;
	height: <?php echo $altura_titulo; ?>;
}
#logo{
	margin-left:<?php echo $margin_logo; ?>;
	margin-right:<?php echo $margin_logo_right;?>;	
}
header img{
		margin-top:<?php echo $margin_top; ?>;
}
span{
	font-family: Verdana, Arial, Trebuchet, serif;
	color: <?php echo $cor_texto; ?>;
	font-size: 12px;
}
strong{
	color: <?php echo $cor_texto; ?>;
	font-size: 50px;
	margin-left:<?php echo $margin_frase_left = '8%'; ?>;
}
input{
	margin-left:<?php echo $margin_input_left = '10px'; ?>;
	margin-top:<?php echo $margin_top; ?>;
}

input[name="data"]{
	margin-left:<?php echo $margin_input_left_date = '21px'; ?>;
	margin-top:<?php echo $margin_top; ?>;
}
.form_pesquisa{
	margin-left:<?php echo $margin_form_pesquisa; ?>;
	margin-top:<?php echo $margin_form_pesquisa; ?>;
	margin-bottom:<?php echo $margin_form_pesquisa_bottom; ?>;	
}
.form_pesquisa input[type="button"]{
	margin-left:<?php echo $margin_form_pesquisa_button; ?>;
}
.form_pesquisa input[type="submit"]{
	margin-left:<?php echo $margin_form_solicita_corrida_button="14%"; ?>;
}
#mapa{
	margin-left:<?php echo $margin_mapa; ?>;
	margin-top:<?php echo $margin_mapa_top; ?>;
	border-width:<?php echo $borda_espessura; ?>;
	border-style:<?php echo $borda_estilo; ?>;
}