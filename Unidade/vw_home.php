<html>
    <head>
    
       <?php  include("includes/cdns.php"); ?>
                        
    </head>
    
    <body>
    
        <?php  include("includes/sidebar.php"); ?>
<!-- Script de componentes -->
        <script>
            $(document).ready(function(event) {
                
                $('.size').mask('0000,0 m²');
                
                //Script de cadastro de moradores
                $("#btn_cadastrar").click(function(){
					
					
					var tamanho = $("#tamanho_unidade").val();
					var modelo = $("#modelo_unidade").val();
					var endereco = $("#endereco_unidade").val();
					//var planta = $("#foto").val();
                    
                    if( (tamanho!="") && (modelo!="") && (endereco!="") )
                        {
                            $.post("http://localhost/Project/Unidade/Cadastra",
                    {
                        v_tamanho:tamanho,
                        v_modelo:modelo,
                        v_endereco:endereco
                    },function(dados){
                        console.log(dados);
                        
						if(dados == "OK")
						{
							
							swal(
								  'Cadastrado com sucesso !!',
								  'Dados corretamente cadastrados no Banco de dados',
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
								  'Dados não cadastrados!',
								  'error'
								);
						}
						
					
                });
                        }
                    else 
                    {
                        swal(
								  'Erro !!',
								  'Dados não cadastrados',
								  'error'
								);
                    }
										
					
            });

                //Trigger Exclui
                $(".btn-excluir").click(function(){
                    
                    var valor = $(this).attr("value");
                    
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
                            
                        $.post("http://localhost/Project/Unidade/Exclui",
                          {
                            id: valor
                            
                          },function(resultado){
                            
            
                        });
                            
                          swal(
                            'Deletado!',
                            'Seu registro foi deletado!',
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
                });
        </script>
<!-- Fim script -->
        
        
        <div class="container pgmargin">
            
            <ul id="tabs-swipe-demo" class="tabs tab-bar">
 
                <li class="tab col s3 tbs"><a class="active" href="#test-swipe-1">Dados gerais</a></li>
                <li class="tab col s3 tbs"><a href="#test-swipe-2">Cadastro</a></li>
                <li class="tab col s3 tbs"><a href="#test-swipe-3">Gerenciar</a></li>

            </ul>

            
            
            
            <div id="test-swipe-1" class="col s12 tbs"><br><br><br>
             
                <?php  include("includes/unidadepainels.php"); ?>
                
                <div class="row">
                    
                    <div class="col s12">
                        
                        
                    <table class="boarded center">
                        <thead>
                          <tr>
                              <th>Tamanho da unidade</th>
                              <th>Modelo</th>
                              <th>Endereço</th>
                          </tr>
                        </thead>

                        <tbody>
                            
                          <?php $total = 0; ?>
                          <?php foreach($resultado as $linha): ?>
                          <tr>
                            <td><?= $linha->tamanho_unidade;?></td>
                            <td><?= $linha->modelo_unidade; ?></td>
                            <td><?= $linha->endereco_unidade; ?></td>
                          </tr>
                          <?php $total ++;?>        
                          <?php endforeach; ?>
                            
                        </tbody>
                         
                      </table>
					 
                <br>
                <br>
                <br>
                          
                    </div>
                                        
                </div>
                    
                </div>
                             
                        
              <div id="test-swipe-2" class="col s12"> <br> <br> <br>
                  
                <form action="<?php echo base_url("Unidade/Cadastra");?>" method="post">
                    
                    <!-- Conteudo row 01 -->
                    <div class="row">
					 
						<div class="input-field col s6">
						    <i class="material-icons small prefix">content_paste</i>
							<input id="tamanho_unidade" type="text" class="validate size">
							<label for="icon_prefix">Tamanho da unidade</label>
						</div>
                        
                        <div class="input-field col s6">
						    <i class="material-icons small prefix">home</i>
							<input id="modelo_unidade" type="text" name="modelo_unidade" class="validate date">
							<label for="icon_prefix">Modelo da unidade</label>
						</div> 
                        
                        
                        
					</div>
                     
                     <!-- Conteudo row 02 -->
                     <div class="row">
					 
						 <div class="input-field col s12">
						    <i class="material-icons small prefix">location_on</i>
							<input id="endereco_unidade" type="text" name="endereco_unidade" class="validate phone">
							<label for="icon_prefix">Localização da unidade</label>
						</div>                 
                        
					</div>
                     
                    
                    <!-- Conteudo row 04 -->
                
                    <div class="row">

                      <a id="btn_cadastrar" class="btn-floating btn-large waves-effect waves-light green"><i class="material-icons">send</i></a>
                      <button type="reset" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">clear</i></button>

                    </div>
                </form>
            </div>
        
            
            
            <div id="test-swipe-3" class="col s12 tbs"><br><br><br>
            
            <table class="striped centered">
                        <thead>
                          <tr>
                              <th>Id</th>
                              <th>Tamanho</th>
                              <th>Modelo</th>
                              <th>Endereço</th>
                          </tr>
                        </thead>

                        <tbody>
                            
                          <?php $total = 0; ?>
                          <?php foreach($resultado as $linha): ?>
                          <tr>
                            <td><?= $linha->id_unidade; ?></td>
                            <td><?= $linha->tamanho_unidade; ?></td>
                            <td><?= $linha->modelo_unidade; ?></td>
                            <td><?= $linha->endereco_unidade; ?></td>
                            <td> 
                                
                            <a class="btn-floating btn-large waves-effect waves-light red btn-excluir" value="<?php echo $linha->id_unidade; ?>"><i class="material-icons">clear</i></a> 
                            </td>  
                      
                        </tr>

                        <?php $total ++;?>       
                        <?php endforeach; ?>
                            
                        </tbody>
                         
            </table>
					 
                <br>
                <br>
                <br>
                
                      
                
            </div>
            
     
        
        </div>
        
    </body>
</html>