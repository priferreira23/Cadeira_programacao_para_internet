<!--Código HTML-->
<!DOCTYPE html>
<html>
	<meta charset="utf-8">
	<title>Taxi-Express</title>
	<link href="css.php" rel="stylesheet">
	
	<head>
	
		<!-- Parâmetro sensor é utilizado somente em dispositivos com GPS -->
		<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript">
		
		  function CalculaDistancia() {
			$('#resultado').html('Eapere um momento...');
			
			//"DistanceMatrixService" sendo iniciado.
			var service = new google.maps.DistanceMatrixService();
			
			//"DistanceMatrixService" sendo executado.
			service.getDistanceMatrix({
				//origins(origem), destinations(destino), travelMode(Modo de locomoção) e unitSystem(Sistema de medida).
				origins: [$("#origem").val()], 
				destinations: [$("#destino").val()],
				travelMode: google.maps.TravelMode.DRIVING,
				unitSystem: google.maps.UnitSystem.METRIC 
			}, callback); 
		  }				 

		  // Tratamento do retorno DistanceMatrixService
		  function callback(response, status) {
		    //verifica se status é Ok ou não
			if (status != google.maps.DistanceMatrixStatus.OK) { 
				$("#resultado").html(status);
			} else { 
				$("#resultado").html("&nbsp;"); // Remove o "aguarde".
				// Popula os campos.
				$("#origemResultado").val(response.originAddresses);
				$("#destinoResultado").val(response.destinationAddresses);
				$("#distancia").val(response.rows[0].elements[0].distance.text);
				var tempo = response.rows[0].elements[0].duration.text;
				tempo = tempo.replace("day", "dia").replace("hour", "hora").replace("min", "min");
				$("#txtTempo").val(tempo);
							
				var preco = $("#distancia").val().replace("km", "").replace(" ", "").replace(",", ".") * 4.50;
				$("#txtPreco").val(preco);
				
				//Atualiza o mapa.
				$("#map").attr("src", "https://maps.google.com/maps?saddr=" + response.originAddresses + "&daddr=" + response.destinationAddresses + "&output=embed");
			}
		  }
		  
		</script>	
		<script src="jquery-2.1.4.js" type="text/javascript"> 
			jQuery(function($){
					$(".data").mask("99/99/9999");
				});
		</script>		
		</head>
		
		<header>
			<div id="logo">
				<img src="img/logo_taxiexpress.png" alt="imagem do topo" width="300px" height="80px"/>
				<strong>Sua Corrida Rápido & Fácil!</strong>
				<img src="img/fundo_topo.png" alt="imagem do topo" width="1320px" height="100px"/>
				
			</div>
			</header>
		
		<body>
			<div id="topo" width="100px" height="200px" ></div>
		
			<div class="form_pesquisa">
				<form name="dados_da_corrida" method="post" action="tgaDiferente.php" >
					<div><h3>Dados de Pesquisa da Corrida</h3></div>
					<span>Endereço de Origem: </span><input name="pesquisaOrigem" type="text" id="origem" class="field" style="width: 400px" /></br>			
					<span>Endereço de destino: </span><input name="pesquisaDestino" type="text" id="destino" class="field" style="width: 400px" /></br>			
					<input name="calcula" type="button" value="Calcular distancia" onclick="CalculaDistancia()" />
					<div><h3>Resposta da Pesquisa</h3></div>	
					<span>Data:</span><input type="date" name="data" /><br />
					<span>Nome:</span> 
					<input type="text" name="nome" /><br />					
					<span>Distância: </span><input name="resultDistancia" readonly="readonly" type="text" id="distancia"/></br>
					<span>Valor Estimado: </span><input name="preco" readonly="readonly" type="text" id="txtPreco" /></br>	
					<span>Tempo Estimado: </span><input name="tempo" readonly="readonly" type="text" id="txtTempo" /></br>
					<input name="botao" type="submit" value="Solicitar Corrida!" />
				</form>		
			</div>
			<div id="mapa">
				<iframe width="100%" scrolling="no" height="400px" frameborder="0" id="map" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?saddr=Porto Alegre&daddr=Viamao&output=embed"></iframe>
			</div>
			</br>
			<strong>LISTA DE CORRIDAS CADASTRADAS</strong>
			</br></br>
	
<!--Código PHP-->
<?php
	echo "</br>";	
	$quebra_linha = "\r\n";
	$i = 1;
	
		//salvar em TXT
		if(isset($_POST["botao"])){
			@$arquivoDeTexto = "chamada.txt";
			if($_POST["nome"] == null){
				$_POST["nome"] = "Não Informado";
			}
			if($_POST["data"] == null){
				$_POST["data"] = "Não Informado";
			}
			@$formulario = " |Cliente: ".$_POST["nome"] ." |Data: ".$_POST["data"] ." |Origem: " .$_POST["pesquisaOrigem"] ." |Destino: " .$_POST["pesquisaDestino"]." |Tempo: " .$_POST["tempo"]." |Valor: " .$_POST["preco"].$quebra_linha;
			@$ponteiro = Fopen($arquivoDeTexto, "a+");
			fwrite($ponteiro, $formulario);
			fclose($ponteiro);
		
			if($arquivoDeTexto){
				@$arquivo = fopen($arquivoDeTexto, "r") or die ("Erro!");
				while (!feof($arquivo)) {
					@$buffer = fgets($arquivo);						
					$saltodelinha = nl2br($buffer);
					echo "Corrida ".$i." - " .$saltodelinha;
					$i++;
				}
				fclose($arquivo);
			}		
		}		
	
?>
	</body>
</html>

