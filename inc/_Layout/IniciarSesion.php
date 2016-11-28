<!-- Modal Structure -->
<form action="inc/Signin.php" method="POST">
	<div id="signin" class="modal modal-signin">
		<div class="modal-content">
			<div class="row">
				<div class="col s12 m8 offset-m2">
					<div class="card">
						<div class="card-content">
							<h4 class="center">
								Iniciar Sesión
							</h4>
							<p>
								<div class="row">
									<div class="input-field col s12">
										<i class="material-icons prefix">phone</i>
										<input name="UserName" id="email" type="text" class="validate" validate>
										<label for="email">Email</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12">
										<i class="material-icons prefix">account_circle</i>
										<input name="UserPassword" id="password" type="password" class="validate" validate>
										<label for="password">Password</label>
									</div>
								</div>
							</p>
						</div>
						<div class="card-action">
							<div>
								<button type="submit" class="btn deep-orange darken-1">
									Entrar
								</button>
								<a href="#" class="modal-action modal-close btn btn-flat">
									Salir
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

<script type="text/javascript">
	$(document).ready(function(){
		$(".signin").click(function() {
			//$(".side-nav").sideNav("hide");
			$("#signin").openModal();
			$("#sidenav-overlay").remove();
		});
	});
</script>