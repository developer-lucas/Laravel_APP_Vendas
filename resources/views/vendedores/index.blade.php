<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Sistema - Vendedores</title>

	<!-- Custom fonts for this template -->
	<link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="/css/sb-admin-2.min.css" rel="stylesheet">

	<!-- Bootstrap core JavaScript-->
	<script src="/vendor/jquery/jquery.min.js"></script>
	<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="/js/sb-admin-2.min.js"></script>

	<!-- Pagination JS -->
	<script src="/js/pagination.js"></script>
	<link href="/css/pagination.css" rel="stylesheet" type="text/css">

	<!-- Moment JS -->
	<script src="/js/moment.js"></script>
	
	<!-- Mask Money -->
	<script src="/js/jquery.maskMoney.min.js"></script>

	<!-- Custom styles for this page -->
	<link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top" onLoad="loadData()">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- menu lateral -->
		@include('sidebar', ['id' => 2])
		<!-- menu lateral -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- BARRA SUPERIOR -->
				@include('top_bar')
				<!-- BARRA SUPERIOR -->

				<!-- Begin Page Content -->
				<div class="container-fluid">


					<!-- DataTales Example -->
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 id="title" class="m-0 font-weight-bold text-primary">Carregando, aguarde...</h6>
						</div>
						<div class="card-body">
							<a href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#cadastrar_vendedor">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus-square"></i>
                    </span>
                    <span class="text">Cadastrar Vendedor</span>
                  </a>
						
							<a href="#" class="btn btn-warning btn-icon-split" data-toggle="modal" data-target="#cadastrar_venda" style="float: right" onClick="loadVendedores()">
                    <span class="icon text-white-50">
                      <i class="fas fa-money-check-alt"></i>
                    </span>
                    <span class="text">Nova venda</span>
                  </a>
						


							<div class="table-responsive" style="padding-top: 15px">
								<div class="d-flex justify-content-center" style="padding-top: 20px; overflow: hidden;">
									<div id="loading" class="spinner-border" style="display: none">
										<span class="sr-only">Carregando, aguarde...</span>
									</div>
								</div>
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="display: none">
									<thead>
										<tr>
											<th width="4%"><input type="checkbox">
											</th>
											<th width="15%">Data</th>
											<th width="5%">ID</th>
											<th>Nome</th>
											<th>E-mail</th>
											<th width="5%">Comissão</th>
											<th width="10%"></th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th width="4%"><input type="checkbox">
											</th>
											<th width="15%">Data</th>
											<th width="5%">ID</th>
											<th>Nome</th>
											<th>E-mail</th>
											<th width="5%">Comissão</th>
											<th width="10%"></th>
										</tr>
									</tfoot>
									<tbody>
									</tbody>
								</table>
								<div style="float: right" id="pagination"></div>
							</div>
						</div>
					</div>

				</div>
				<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->

			<!-- Footer -->
			<footer class="sticky-footer bg-white">
				<div class="container my-auto">
					<div class="copyright text-center my-auto">
						<span>Copyright &copy; Your Website 2019</span>
					</div>
				</div>
			</footer>
			<!-- End of Footer -->

		</div>
		<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>



	<!-- Modal Novo vendedor -->
	<div class="modal fade" id="cadastrar_vendedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Cadastrar vendedor</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">×</span>
                    </button>
				</div>
				<form id="sendForm">
					<div class="modal-body">
						<div id="message" class="alert alert-primary" style="display: none"></div>
						<div class="form-group">
							<label><strong>Nome</strong></label>
							<input type="text" class="form-control" id="nome" name="nome">
						</div>
						<div class="form-group">
							<label><strong>Endereço de e-mail</strong></label>
							<input type="email" class="form-control" id="email" name="email">
						</div>
						<div class="form-group" style="width: 50%">
							<label><strong>Comissão (%)</strong></label>
							<input type="number" class="form-control" id="comissao" name="comissao" step="0.01" min="0" max="100">
							<small>Caso não seja informado, o valor será 8.5%</small>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fas fa-times-circle"></i> Cancelar</button>
						<button class="btn btn-success" type="submit"><i class="fas fa-check-circle"></i> Cadastrar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<!-- Modal Nova venda -->
	<div class="modal fade" id="cadastrar_venda" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Realizar venda</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
				

				</div>
				<form id="sendVendas">
					<div class="modal-body">
						<div id="messageVendas" class="alert alert-primary" style="display: none"></div>
						<div class="form-group">
							<label>Selecione o vendedor</label>
							<select class="form-control" id="vendedor" name="vendedor"></select>
						</div>
						<div class="form-group">
							<label>Valor da venda</label>
							<input type="text" class="form-control" id="valor" data-prefix="R$ " name="valor" style="width: 50%">
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
						<button class="btn btn-success" type="submit">Realizar venda</button>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
<script>
	
	/* Array de vendedores */
	var vendedores = [];
	
	/* Campo monetário */
	$(function() {
       $('#valor').maskMoney();
    });	
	
	/* Carrega os vendedores no select */
	function loadVendedores(){
		
		/* Limpa o select */
		$('#vendedor').empty();
		
		vendedores.forEach(function(item) {
		  $('#vendedor').append(new Option(
			  item.id + ' - ' + item.nome, item.id
		  ));
        });
		
	}
	
	/* Carrega os vendedores cadastrados */
	function loadData() {
		$( '#pagination' ).pagination( {
			dataSource: '{{ Config::get("app.api_url") }}/api/vendedores',
			locator: 'items',
			totalNumberLocator: function ( response ) {
				
				/* Configurando o titulo */
				$('#title').html(response.items.length + ' vendedores');
				vendedores = response.items;
				return response.items.length;
			},
			alias: {
				pageNumber: 'page',
				pageSize: 'limit'
			},
			pageSize: 100,
			position: 'top',
			ajax: {
				beforeSend: function () {
					$( '#loading' ).show();
					$( "#pagination" ).hide();
					$( '#dataTable > tbody' ).empty();
				}
			},
			callback: function ( result, pagination ) {

				var html = '';

				html += '<div class="row">';

				if ( result.length == 0 ) {

					html += '<tr>';
					html += '<td colspan="7" align="center"><br>Nenhum vendedor cadastrado até o momento.<br></td>';
					html += '</tr>';


				} else {

					$.each( result, function ( index, value ) {

						html += '<tr>';
						html += '<td><input type="checkbox"></td>';
						html += '<td>' + moment( value.created_at ).format( "DD/MM/YYYY HH:mm" ) + '</td>';
						html += '<td>' + value.id + '</td>';
						html += '<td>' + value.nome + '</td>';
						html += '<td>' + value.email + '</td>';
						html += '<td>' + value.comissao + '%</td>';
						html += '<td align="center"><a href="/vendas/' + value.id + '" class="btn btn-info btn-circle btn-sm" title="Vendas"><i class="fas fa-shopping-cart"></i></a> <a href="#" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash-alt"></i></a></td>';
						html += '</tr>';

					} );


				}

				// Exibe as informações na tela			
				$( "#dataTable > tbody" ).html( html );
				$( '#loading' ).hide();
				$( '#dataTable' ).show();
				$( "#pagination" ).show();

			}
		} )

	}
	
	/* Realizar uma nova venda  */
	$( "#sendVendas" ).submit( function ( event ) {

		event.preventDefault();
		
		// Prepara o payload para envio
		let payload = new FormData();
		payload.append( 'vendedor_id', $( "#vendedor" ).children( "option:selected" ).val() );
		payload.append( 'valor', $( '#valor' ).val().replace(/[^0-9.]/g, "") );
		
		console.log($( '#valor' ).val().replace(/[^0-9.]/g, ""));

		/* Send data to softpay */
		fetch( '{{ Config::get("app.api_url") }}/api/vendas/lancar', {
				method: 'POST',
				body: payload
			} )
			.then( function ( response ) {
				response.json().then( function ( result ) {

					$( '#sendVendas' ).trigger( "reset" );					

					if ( response.status == 200 ) {

                        $("#messageVendas").removeClass().addClass( 'alert alert-success' ).html( 'Venda realizada com sucesso.' ).show().fadeTo(2000, 500).slideUp(500, function(){
                          $("#messageVendas").hide();
                        });
						
					} else {

						$("#messageVendas").removeClass().addClass( 'alert alert-warning' ).html(result.message ).show().fadeTo(2000, 500).slideUp(500, function(){
                          $("#messageVendas").hide();
                        });
					}


				} )

				// Falha inesperada
				.catch( err => {
					$("#messageVendas").removeClass().addClass( 'alert alert-danger' ).html( 'Serviço indisponível no momento. Tente novamente mais tarde.' ).show().fadeTo(2000, 500).slideUp(500, function(){
                        $("#messageVendas").hide();
                    });
				} );
			} )

	} );

	/* Cadastra um novo vendedor */
	$( "#sendForm" ).submit( function ( event ) {

		event.preventDefault();

		// Prepara o payload para envio
		let payload = new FormData();
		payload.append( 'nome', $( '#nome' ).val() );
		payload.append( 'email', $( '#email' ).val() );
		payload.append( 'comissao', $( '#comissao' ).val() );

		/* Send data to softpay */
		fetch( '{{ Config::get("app.api_url") }}/api/vendedores/cadastrar', {
				method: 'POST',
				body: payload
			} )
			.then( function ( response ) {
				response.json().then( function ( result ) {

					$( '#sendForm' ).trigger( "reset" );					

					if ( response.status == 200 ) {

						$("#message").removeClass().addClass( 'alert alert-success' ).html( 'Vendedor cadastrado com sucesso.' ).show().fadeTo(2000, 500).slideUp(500, function(){
                           $("#message").hide();							
                        });
						
                        loadData();
						
					} else {

						$("#message").removeClass().addClass( 'alert alert-warning' ).html( result.mensagem ).show().fadeTo(2000, 500).slideUp(500, function(){
                           $("#message").hide();							
                        });
					}


				} )

				// Falha inesperada
				.catch( err => {
					$("#messageVendas").removeClass().addClass( 'alert alert-danger' ).html( 'Serviço indisponível no momento. Tente novamente mais tarde.' ).show().fadeTo(2000, 500).slideUp(500, function(){
                        $("#messageVendas").hide();
                    });
				} );
			} )

	} );
</script>

</html>