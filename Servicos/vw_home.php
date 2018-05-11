<html>
    <head>
    
       <?php  include("includes/cdns.php"); ?>
                
    </head>
    
    <body>
    
        <?php  include("includes/sidebar.php"); ?>
    
        <script>
            $(document).ready(function() {
                                
                $('.cod').mask('00000-0');
                
                //Script de cadastro de moradores
                $("#btn_cadastrar").click(function(event){
					event.preventDefault();
					
					var codigo = $("#codigo").val();
					var modelo = $("#modelo").val();
					var nome = $("#nome").val();
					var desc = $("#desc").val();
					
					
					$.post("<?=base_url("/Servicos/Cadastro");?>",{
                        
							v_codigo:codigo,
							v_modelo:modelo,
							v_nome:nome,
							v_desc:desc
							
					},function(dados){
						
						if(dados == "OK")
						{
							
							swal(
								  'Cadastrado com sucesso !!',
								  'Dados corretamente cadastrados no Banco de dados',
								  'success'
								)

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
								)
						}
						
					});
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
                            
                        $.post("http://localhost/Project/Servicos/Exclui",
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
                //fim do Script
                
            });
        </script>
        
        <div class="container pgmargin">
            
            <ul id="tabs-swipe-demo" class="tabs tab-bar">
 
                <li class="tab col s3 tbs"><a class="active" href="#test-swipe-1">Dados gerais</a></li>
                <li class="tab col s3 tbs"><a href="#test-swipe-2">Cadastro</a></li>
                <li class="tab col s3 tbs"><a href="#test-swipe-3">Gerenciar</a></li>

            </ul>

            
            
            
            <div id="test-swipe-1" class="col s12 tbs">
             
               <?php  include("includes/servicopainels.php"); ?>
                
               <table class="boarded">
               <thead>
                 <tr>
                     <th>Código</th>
                     <th>Nome da empresa</th>
                     <th>Descrição</th>
                 </tr>
               </thead>

               <tbody>
                   
                 <?php $total = 0; ?>
                 <?php foreach($resultado as $linha): ?>
                 <tr>
                   <td><?= $linha->codigo_servico;?></td>
                   <td><?= $linha->nome_servico; ?></td>
                   <td><?= $linha->descricao_servico; ?></td>
                 </tr>
                 <?php $total ++;?>        
                 <?php endforeach; ?>
                   
               </tbody>
                
             </table>
					 
                <br>
                <br>
                <br>
                
            </div>
            
            
            <div id="test-swipe-2" class="col s12 tbs"><br><br><br>
            
              <form action="<?php echo base_url("Servicos/Cadastro");?>" method="post">
                    
                    <!-- Conteudo row 01 -->
                    <div class="row">
					 
						<div class="input-field col s4">
						    <i class="material-icons small prefix">format_list_numbered</i>
                            
							<input id="codigo" type="text" class="validate cod">
                            
							<label for="icon_prefix">Código do serviço prestado</label>
						</div>
                        
                        
						<div class="input-field col s4">
						    <i class="material-icons small prefix">info</i>
                            
							<input id="modelo" type="text" class="validate">
                            
							<label for="icon_prefix">Ramo</label>
						</div>
                        
                        
                        
					</div>
                  
                  <div class="row">
                  
                    <div class="input-field col s4">
						    <i class="material-icons small prefix">motorcycle</i>
                            
							<input id="nome" type="text" class="validate">
                            
							<label for="icon_prefix">Nome do serviço</label>
						</div>
                      
                      <div class="input-field col s4">
						    <i class="material-icons small prefix">subtitles</i>
                            
							<input id="desc" type="text" class="validate">
                            
							<label for="icon_prefix">Descrição</label>
						</div>
                  
                  </div>
            
                    <!-- Conteudo row 04 -->
                
                    <div class="row">

                          <a id="btn_cadastrar" type="submit" class="btn-floating btn-large waves-effect waves-light green"><i class="material-icons">send</i></a>
                        <button type="reset" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">clear</i></button>

                    </div>
                </form>     
                
            </div>
            
            
            <div id="test-swipe-3" class="col s12 tbs"><br><br><br>
            
            <table class="striped centered">
                        <thead>
                          <tr>
                              <th>Codigo</th>
                              <th>Area de atuação</th>
                              <th>Nome da empresa</th>
                              <th>Descrição</th>                 
                          </tr>
                        </thead>

                        <tbody>
                            
                          <?php $total = 0; ?>
                          <?php foreach($resultado as $linha): ?>
                          <tr>
                            <td><?= $linha->codigo_servico; ?></td>
                            <td><?= $linha->tipo_servico; ?></td>
                            <td><?= $linha->nome_servico; ?></td>
                            <td><?= $linha->descricao_servico; ?></td>
                            <td> 
                            
                            <a class="btn-floating btn-large waves-effect waves-light red btn-excluir" value="<?php echo $linha->id_servico; ?>"><i class="material-icons">clear</i></a> 
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