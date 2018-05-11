<html>
    <head>
    
       <?php  include("includes/cdns.php"); ?>
        
                
    </head>
    
    <body>
    
        <?php  include("includes/sidebar.php"); ?>
    
<!-- Script de componentes -->

        <script>
            $(document).ready(function() {
                
                $('.cod').mask('00000-0');
                $('.parce').mask('0x de R$000000');
                
                 //Trigger Exclui
                $(".btn-excluir").click(function(){
                    
                    var id = $(this).attr("value");
                    console.log(id);
                    
                    swal({
                          title: 'Tem certeza?',
                          text: "Não podera recuperar o registro!",
                          type: 'warning',
                          showCancelButton: true,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: '<i class="material-icons small prefix">done</i>',
                          cancelButtonText: '<i class="material-icons small prefix">clear</i>',
                          confirmButtonClass: 'btn green accent-4 btn-floating btn-large',
                          cancelButtonClass: 'btn deep-orange darken-3 btn-floating btn-large',
                          buttonsStyling: false
                        }).then(function () {
                            
                        $.post("http://localhost/Project/Pagamento/Exclui",
                          {
                            val: id
                            
                          },function(resultado){
                            
            
                        });
                            
                          swal(
                            'Deletado!',
                            'Seu arquivo foi deletado!',
                            'success'
                          )
                        setTimeout(function(){

                               window.location.reload(); 
                               
                            },3000);
                        
                         
                        
                        }, function (dismiss) {
                          // dismiss can be 'cancel', 'overlay',
                          // 'close', and 'timer'
                          if (dismiss === 'cancel') {
                              
                            swal(
                              'Cancelado',
                              'Registro salvo!',
                              'error'
                            )
                              
                          }
                        })             
              
                });
                
                $("#trigger").click(function(event){
					event.preventDefault();
					
					var codigo = $("#codigo").val();
					var parcela = $("#parcela").val();
					
					$.post("http://localhost/Project/Pagamento/cadastro",{
							v_codigo:codigo,
							v_parcela:parcela
					},function(dados){
						
						if(dados == "OK")
						{
							
							swal(
								  'Sucesso!!',
								  'Dados cadastrados corretamente!',
								  'success'
								);

                                setTimeout(function(){

                               window.location.reload(); 
                               
                            },3000); 
						}
						else
						{
							swal(
								  'Erro !!',
								  'E-mail ou senha incorretos!',
								  'error'
								);
						}
						
					});
				});
                
            });
        </script>
<!-- Fim script -->
        
        <div class="container pgmargin">
            
            <!-- MENU DAS TAB'S -->
            <ul id="tabs-swipe-demo" class="tabs tab-bar">
 
                <li class="tab col s3"><a class="active" href="#test-swipe-1">Dados gerais</a></li>
                <li class="tab col s3"><a href="#test-swipe-2">Cadastro</a></li>
                <li class="tab col s3"><a href="#test-swipe-3">Gerenciar</a></li>

            </ul>

            
            
            <!-- SWIPE 01 DAS TAB'S -->
            <div id="test-swipe-1" class="col s12"> <br> <br> <br>
             
                <?php include("includes/pagamentopainels.php"); ?> <br><br><br>
                
                <table class="bordered centered">
                        <thead>
                          <tr>
                              <th>Código</th>
                              <th>Valor</th>
                          </tr>
                        </thead>

                        <tbody>
                            
                    <?php foreach($resultado as $linha): ?>
                          <tr>
                            <td><?= $linha->codigo_parcela; ?></td>
                            <td><?= $linha->modelo_parcela; ?></td>
                          </tr>
                    <?php endforeach; ?>
                            
                        </tbody>
                         
                      </table>
					 
                <br>
                <br>
                <br>
                
                
            </div>
            
            <!-- SWIPE 02 DAS TAB'S -->
            <div id="test-swipe-2" class="col s12"> <br> <br> <br>
                  
                <form action="<?php echo base_url("Pagamento/cadastro");?>" method="post">
                    
                    <!-- Conteudo row 01 -->
                    <div class="row">
					 
						<div class="input-field col s4">
						    <i class="material-icons small prefix">format_list_numbered</i>
                            
							<input id="codigo" type="text" class="validate cod">
                            
							<label for="icon_prefix">Código da parcela</label>
						</div>
                        
                        
						<div class="input-field col s4">
						    <i class="material-icons small prefix">monetization_on</i>
                            
							<input id="parcela" type="text" class="validate parce">
                            
							<label for="icon_prefix">Modelo da parcela</label>
						</div>
                        
					</div>
            
                    <!-- Conteudo row 04 -->
                
                    <div class="row">

                          <a id="trigger" type="submit" class="btn-floating btn-large waves-effect waves-light green"><i class="material-icons">send</i></a>
                        <button type="reset" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">clear</i></button>

                    </div>
                </form>
            </div>
            
            <!-- SWIPE 03 DAS TAB'S -->
           <div id="test-swipe-3" class="col s12"> <br> <br> <br>
                
                <div id="resultado">
                
                </div>
                     <table class="striped centered">
                        <thead>
                          <tr>
                              <th>Id</th>
                              <th>Código</th>
                              <th>Modelo</th>
                              <th>Controle</th>
                          </tr>
                        </thead>

                        <tbody>
                            
                          <?php $total = 0; ?>
                          <?php foreach($resultado as $linha): ?>
                          <tr>
                            <td><?= $linha->id_parcela; ?></td>
                            <td><?= $linha->codigo_parcela; ?></td>
                            <td><?= $linha->modelo_parcela; ?></td>
                            <td>   
                                
                            <a class="btn-floating btn-large waves-effect waves-light red btn-excluir" value="<?php echo $linha->id_parcela; ?>"><i class="material-icons">clear</i></a> 
                                
                            </td>  
                              
                            <!--Modals Layaut-->
                            
                              
                          </tr>
                          <?php $total ++;?>       
                          <?php endforeach; ?>
                            
                        </tbody>
                         
                      </table>
                
                            <div id="modal-morador" class="modal"><br>
                                
                                <div class="container">
                                   <h3 class="center"> Atualização de dados</h3>
                                </div>

                                <div class="modal-content">

                                  

                                </div>

                                <div class="modal-footer">

                                  <a id="btn-att" class="modal-action modal-close waves-effect waves-green btn ">Atualizar</a>
                                  <a class="modal-action modal-close waves-effect waves-green btn">Cancelar</a>

                                </div>

                            </div>
                    
                
                
					 
                <br>
                <br>
                <br>
                
                 
                
            </div>
            <!-- FIM DOS SWIPE'S DAS TAB'S -->               
           
            
            
            
            
            
        
        </div>
        
        
        
    </body>
</html>