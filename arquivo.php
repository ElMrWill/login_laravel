<?php
$json = file_get_contents('php://input');
$obj = json_decode($json, true);
$numberCard = $obj['numberCard'];
$bandeiraCard = $obj['bandeiraCard'];
$expiraCard = $obj['expiraCard'];
$expiraCardAno = $obj['expiraCardAno'];
$cvv = $obj['cvv'];
$nome = $obj['nome'];
$cpf = $obj['cpf'];
$ddd = $obj['ddd'];
$phone_number = $obj['phone_number'];
$email = $obj['email'];
$rua = $obj['rua'];
$numero = $obj['numero'];
$complemento = $obj['complemento'];
$bairro = $obj['bairro'];
$cep = $obj['cep'];
$cidade = $obj['cidade'];
$estado = $obj['estado'];
$endCobranca = $obj['endCobranca'];
$numCobranca = $obj['numCobranca'];
$compCobranca = $obj['compCobranca'];
$cidadeCobranca = $obj['cidadeCobranca'];
$estadoCobranca = $obj['estadoCobranca'];
$cepCobranca = $obj['cepCobranca'];
$nomeCartao = $obj['nomeCartao'];
$cpfCartao = $obj['cpfCartao'];
$nascCartao = $obj['nascCartao'];
$dddCartao = $obj['dddCartao'];
$telefoneCartao = $obj['telefoneCartao'];
$formaPgto = 'Credito';

$arquivo = fopen('dados.json', 'w');
if ($arquivo == false) die('Não foi possível criar o arquivo.');
$texto = $json;
fwrite($arquivo, $texto);
fclose($arquivo);

?>
<span class="endereco" data-endereco="<?php echo URL; ?>"></span>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
<script src="js/personalizado.js"></script>
<?php
echo "
<script>
	function listarToken() {
		PagSeguroDirectPayment.createCardToken({
			cardNumber: '$numberCard',
			brand: '$brand',
			cvv: '$cvv',
			expirationMonth: '$expiraCard',
			expirationYear: '$expiraCardAno', 
			success: function(resposta) {
				pegaHashCartao(resposta)

			},
			error: function(resposta) {
				console.log(resposta)
			},
			complete: function(resposta) {
				// Callback para todas chamadas.
			}
		});
	}
	sleep(5);
			function pegaHashCartao(resposta){
				PagSeguroDirectPayment.onSenderHashReady(function(response){
					if(response.status == 'error') {
						console.log(response.message);
						return false;
					}else{
						var dados = [{
							'hashCartao'  : response.senderHash, 
							'hashCartao'  : resposta.card.token, 
							'cardNumber'  : '$numberCard', 
							'bandeiraCard': '$bandeiraCard',
							'expiraCard'  : '$expiraCard',
							'expiraCardAno' : '$expiraCardAno',
							'cvv'		    : '$cvv',
							'nome' 			: '$nome',
							'cpf'			: '$cpf',
							'ddd'			: '$ddd',
							'phone_number'	: '$phone_number',
							'email'			: '$email',
							'rua'			: '$rua',
							'numero'		: '$numero',
							'complemento'	: '$complemento',
							'bairro'		: '$bairro',
							'cep'			: '$cep',
							'cidade'		: '$cidade',
							'estado'		: '$estado',
							'endCobranca'	: '$endCobranca',
							'numCobranca'	: '$numCobranca',
							'compCobranca'	: '$compCobranca',
							'cidadeCobranca' : '$cidadeCobranca',
							'estadoCobranca' : '$estadoCobranca',	
							'cepCobranca'	 : '$cepCobranca',
							'nomeCartao'	 : '$nomeCartao',
							'cpfCartao'		 : '$cpfCartao',
							'nascCartao' 	 : '$nascCartao',
							'dddCartao'		 : '$dddCartao',
							'telefoneCartao' : '$telefoneCartao'
						}];
						$.ajax({
							url: '/enviaCredito.php',
							type: 'post',
							data: {pedido: JSON.stringify(dados)},
							dataType: 'json',
							sucess: function(data){
								if(data.sucesso == true){
									console.log('Sucesso!');
								}
							}
						})						
					};
				});
			}
			";
?>
</script>