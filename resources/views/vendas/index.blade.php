<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Sistema - Vendas</title>

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

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- menu lateral -->
		@include('sidebar', ['id' => 3])
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
							<h6 class="m-0 font-weight-bold text-primary">Todas as Vendas</h6>
						</div>
						<div class="card-body">
							<a href="{{ url()->previous() }}" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-arrow-circle-left"></i>
                    </span>
                    <span class="text">Voltar</span>
                  </a>
						

							<div class="table-responsive" style="padding-top: 15px">
							  <div class="d-flex justify-content-center" style="padding-top: 20px">
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
											<th>Valor</th>
											<th width="5%">Comissão</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th width="4%"><input type="checkbox">
											</th>
											<th width="15%">Data</th>
											<th width="5%">ID</th>
											<th>Valor</th>
											<th width="5%">Comissão</th>
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

</body>
<script>
	/* Carrega as vendas de um vendedor */
	$( '#pagination' ).pagination( {
		dataSource: '{{ Config::get("app.api_url") }}/api/vendas?vendedor_id={{ $vendedor_id }}',
		locator: 'vendas',
		totalNumberLocator: function ( response ) {
			return response.vendas.length;
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
				html += '<td colspan="7" align="center">Nenhuma venda realizada até o momento.</td>';
				html += '</tr>';


			} else {

				$.each( result, function ( index, value ) {

					html += '<tr>';
					html += '<td><input type="checkbox"></td>';
					html += '<td>' + moment( value.created_at ).format( "DD/MM/YYYY HH:mm" ) + '</td>';
					html += '<td>' + value.id + '</td>';
					html += '<td>R$' + value.valor + '</td>';
					html += '<td>' + value.comissao + '%</td>';
					html += '</tr>';

				} );


			}

			// Exibe as informações na tela			
			$( "#dataTable > tbody" ).html( html );
			$( '#loading' ).hide();
			$( '#dataTable' ).show();
			$( "#pagination" ).show();

		}
	} );
</script>

</html>