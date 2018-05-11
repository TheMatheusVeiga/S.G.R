<html>
    <head>
    
       <?php  include("includes/cdns.php"); ?>
                
    </head>
    
    <body>
    
        <?php  include("includes/sidebar.php"); ?>
    
        <script>
        
            $(document).ready(function() {
              
            //Trigger da combobox
            $('select').material_select();
            
                $('.emissao').mask('00/00/0000 as 00:00');
                $('.retirada').mask('00/00/0000 as 00:00');
                
            //Script de cadastro de moradores
                $("#btn_cadastrar").click(function(){
					
					
					var nome_morador = $("#nome_morador option:selected").val();
					var endereco_morador = $("#endereco_morador").val();
					var empresa_emissora = $("#empresa_emissora").val();
					var descricao_produto = $("#desc_produto").val();
					var data_emissao = $("#data_emissao").val();
					var data_retirada = $("#data_retirada").val();
										
					if((nome_morador!="") && (endereco_morador!="") )
                       {
                       $.post("http://localhost/Project/Encomendas/Cadastra",{
							v_nome:nome_morador,
							v_endereco:endereco_morador,
							v_empresa:empresa_emissora,
							v_descricao:descricao_produto,
							v_emissao:data_emissao,
							v_retirada:data_retirada
														
					},function(dados){
             
						
						if(dados == "OK")
						{
							
							swal(
								  'Cadastrado com sucesso !!',
								  'Dados corretamente cadastrados !',
								  'success'
								);
                            
                           setTimeout(function(){

                               window.location.reload(); 
                               
                            },3000); 
                            
						}
						else
						{
							swal(
                              'Erro!',
                              '01 - Dados não recebidos pelo servidor!',
                              'error'
                            )
						}
						
					});
                       }
                       else
                       {
                           swal(
                              'Erro',
                              '02 - Campos incompletos!',
                              'error'
                            )
                       }
				});
                
                    
        
                //Trigger JSON
                $("select").change(function(){
                    
                            var valor = $(this).val();
                            console.log(valor)
                       
                    $.post("http://localhost/Project/Encomendas/Json",
                          {
                            id: valor
                            
                          },function(resultado){
                        
                            var resultJSON = JSON.parse(resultado);
                            console.log(resultJSON);
                        
                        $("#endereco_morador").removeClass();
                        $("#endereco_morador").val(resultJSON[0].endereco_morador);
                        
                    });                
                });
                
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
                            
                        $.post("http://localhost/Project/Encomendas/Exclui",
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
        
        
        <div class="container pgmargin">
            
            <ul id="tabs-swipe-demo" class="tabs tab-bar">
 
                <li class="tab col s3 tbs"><a class="active" href="#test-swipe-1">Dados gerais</a></li>
                <li class="tab col s3 tbs"><a href="#test-swipe-2">Cadastro</a></li>
                <li class="tab col s3 tbs"><a href="#test-swipe-3">Gerenciar</a></li>

            </ul>

            
            
            
            <div id="test-swipe-1" class="col s12 tbs"> <br><br><br>
             
            <?php include("includes/encomendapainels.php"); ?>    
                
                <table class="boarded center">
                        <thead>
                          <tr>
                              <th>Morador</th>
                              <th>Produto</th>
                              <th>Empresa emissora</th>
                              <th>Data de emissão</th>
                              <th>Data de retirada</th>
                          </tr>
                        </thead>
                        
                    <tbody>
                            
                          <?php $total = 0; ?>
                          <?php foreach($resultado as $linha): ?>
                          <tr>
                            <td><?= $linha->nome_morador;?></td>
                            <td><?= $linha->descricao_produto; ?></td>
                            <td><?= $linha->empresa_emissora; ?></td>
                            <td><?= $linha->data_emissao; ?></td>
                            <td><?= $linha->data_retirada; ?></td>
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
            
            <form action="<?php echo base_url("Encomendas/Cadastra");?>" method="post">
                    
                    <!-- Conteudo row 01 -->
                    <div class="row">
					 
						 <div class="input-field col s6">
                            <i class="material-icons small prefix">account_circle</i>
                             
                            <!-- Smart Select BD-->
                           <select id="nome_morador">
                              <option value="" disabled selected>Morador</option>
                                
                            <?php foreach($helper_morador as $linha) :?>
                                
                              <option value="<?php echo $linha->nome_morador ?>"> <?php echo $linha->nome_morador ?> </option>
                                
                            <?php endforeach; ?>
                            </select>
                            <!-- Smart Select BD--> 
                             
                        </div>
                        
                        <div class="input-field col s6">
						    <i class="material-icons small prefix">location_on</i>
<input disabled id="endereco_morador" placeholder="Endereço morador" type="text" name="endereco_unidade" class="validate black-text" value="">
							
						</div>
                        
					</div>
                     
                     <!-- Conteudo row 02 -->
                     <div class="row">
					 
						<div class="input-field col s6">
						    <i class="material-icons small prefix">home</i>
							<input id="empresa_emissora" type="text" name="modelo_unidade" class="validate date">
							<label for="icon_prefix">Empresa emissora</label>
						</div>
                         
                         <div class="input-field col s6">
						    <i class="material-icons small prefix">card_giftcard</i>
							<input id="desc_produto" type="text" name="modelo_unidade" class="validate date">
							<label for="icon_prefix">Descrição do produto</label>
						</div>
                             
                      </div>
                                             
                    <!-- Conteudo row 01 -->
                    <div class="row">
					 
						<div class="input-field col s6">
						    <i class="material-icons small prefix">date_range</i>
							<input id="data_emissao" type="text" class="validate emissao">
							<label for="icon_prefix">Data de emissão</label>
						</div>
                        
                        <div class="input-field col s6">
						    <i class="material-icons small prefix">date_range</i>
							<input id="data_retirada" type="text" name="endereco_unidade" class="validate retirada">
							<label for="icon_prefix">Data de retirada</label>
						</div>
                        
					</div>
                     
                    
                    <div class="row">

                      <a id="btn_cadastrar" class="btn-floating btn-large waves-effect waves-light green"><i class="material-icons">send</i></a>
                      <button type="reset" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">clear</i></button>

                    </div>
                </form>
					</div>
                     
        
            
            
            
            <div id="test-swipe-3" class="col s12"> <br> <br> <br>
            
            
                     <table class="striped centered">
                        <thead>
                          <tr>
                              <th>Id</th>
                              <th>Mordor</th>
                              <th>Endereço</th>
                              <th>Produto</th>
                              <th>Data emissão</th>
                              <th>Data retirada</th>
                              <th>Controle</th>
                          </tr>
                        </thead>

                        <tbody>
                            
                          <?php $total = 0; ?>
                          <?php foreach($resultado as $linha): ?>
                          <tr>
                            <td><?= $linha->id_encomenda; ?></td>
                            <td><?= $linha->nome_morador; ?></td>
                            <td><?= $linha->endereco_morador; ?></td>
                            <td><?= $linha->descricao_produto; ?></td>
                            <td><?= $linha->data_emissao; ?></td>
                            <td><?= $linha->data_retirada; ?></td>
                            <td> 
                                
                            <a class="btn-floating btn-large waves-effect waves-light red btn-excluir" value="<?php echo $linha->id_encomenda; ?>"><i class="material-icons">clear</i></a> 
                                
                            </td>  
                              
                            <!--Modals Layaut-->
                            
                              
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