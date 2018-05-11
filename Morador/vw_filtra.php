
			<table class="striped centered">
                        <thead>
                          <tr>
                              <th>Id</th>
                              <th>Nome</th>
                              <th>Rg</th>
                              <th>Endereço</th>
                              <th>Telefone</th>
                              <th>Telefone</th>
                              <th>Controle</th>
                          </tr>
                        </thead>

                        <tbody>
                            
                          <?php $total = 0; ?>
                          <?php foreach($resultado as $linha): ?>
                          <tr>
                            <td><?= $linha->Id_morador; ?></td>
                            <td><?= $linha->nome_morador; ?></td>
                            <td><?= $linha->rg_morador; ?></td>
                            <td><?= $linha->endereco_morador; ?></td>
                            <td><?= $linha->contato1; ?></td>
                            <td><?= $linha->contato2; ?></td>
                            <td> 
                            <a class="btn-floating btn-large waves-effect waves-light yellow modal-trigger btn-alterar" value="<?php echo $linha->Id_morador; ?>"><i class="material-icons">edit</i></a> 
                                
                            <a class="btn-floating btn-large waves-effect waves-light red btn-excluir" value="<?php echo $linha->Id_morador; ?>"><i class="material-icons">clear</i></a> 
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

<script>
            $(document).ready(function() {
                
                //Modal Control
                
                $('.modal').modal();
                $('.modal').modal();
                
                
                
                //Filtro de pesquisa
               $("#btn_ok").click(function(){
			
				var v_pesquisa = $("#pesquisa").val();
			
				$.post("<?php echo base_url("Morador/Filtra");?>",
				{
					pesquisa:v_pesquisa
				},function(resposta){
					$("#resultado").html(resposta);
					$('#tabelaFiltra');
					
								
						});
					});
                
                
                
                //Atualização de dados
                $("#btn-att").click(function(){
                    
                   var id = $("#id").attr("value"); 
                   var nome = $("#nome_up").val();
                   var rg = $("#rg_up").val();            
                   var contato1 = $("#contato1_up").val();
                   var contato2 = $("#contato2_up").val();
                   var endereco = $("#endereco_up").val();
                   var cpf = $("#cpf_up").val();
                    
                    /*var nome = $("#nome_up").val();
					var nascimento = $("#data_up").val();
					var rg = $("#rg_up").val();
					var cpf = $("#cpf_up").val();
					var telefone1 = $("#fone1_up").val();
					var telefone2 = $("#fone2_up").val();
					var endereco = $("#endereco_up").val();
					var parcela = $("#parcela_up option:selected").val();
					var unidade = $("#unidade_up").val();
					var qtnveiculos = $("#qtndveiculos_up").val();
					var placa_veiculo = $("#placa_up").val();*/
                    
					//var foto = $("#foto").val();
                    
                    $.post("<?php echo base_url("Morador/Atualiza");?>",
                    {
							id:id,
							nome:nome,
							rg:rg,
							contato1:contato1,
                            contato2:contato2,
                            endereco:endereco,
                            cpf:cpf
                        
					},function(resultado){
                           
						
                        
                        swal(
                              'Concluido!',
                              'Registro alterado com sucesso!',
                              'success'
                            )
                        
						
					});
                });
                
                //Trigger Altera
                $(".btn-alterar").click(function(){
                    
                    //Definiçõs da Mask
                 
                    
                    var valor = $(this).attr("value");
                    
                    console.log(valor)
                    $.post("http://localhost/Project/Morador/Altera",
                          {
                            id: valor
                            
                          },function(resultado){
                            var resultJSON = JSON.parse(resultado);
                        
                            console.log(resultJSON);
                        
                            $(".modal-content").html(
                                
"<div class='row'><div class='input-field col s4'><i class='material-icons small prefix'>account_circle</i><label class='active' for='icon_prefix'>Nome completo</label><input id='nome_up' class='validate' type='text' value='"+resultJSON[0].nome_morador+"'></div> <div class='input-field col s4'><i class='material-icons small prefix'>assignment</i><label class='active' for='icon_prefix'>Rg</label><input id='rg_up' class='rg validate' type='text' value='"+resultJSON[0].rg_morador+"'></div> <div class='row'> <div class='input-field col s4'><i class='material-icons small prefix'>assignment</i><label class='active' for='icon_prefix'>cpf</label><input id='cpf_up' class='validate cpf' type='text' value='"+resultJSON[0].cpf_morador+"'></div> <div class='input-field col s4'><i class='material-icons small prefix'>location_on</i><label class='active' for='icon_prefix'>Endereço</label><input id='endereco_up' class='validate' type='text' value='"+resultJSON[0].endereco_morador+"'></div><div class='input-field col s4'><i class='material-icons small prefix'>phone</i><label class='active' for='icon_prefix'>Telefone</label><input id='contato1_up' class='validate phone' type='text' value='"+resultJSON[0].contato1+"'></div> <div class='input-field col s4'><i class='material-icons small prefix'>phone</i><label class='active' for='icon_prefix'>Telefone</label><input id='contato2_up' class='validate phone' type='text' value='"+resultJSON[0].contato2+"'></div><input id='id' class='validate' type='hidden' value='"+resultJSON[0].Id_morador+"'></div>"
                            );
                        
                            $("#modal-morador").modal("open")
                        $('.date').mask('00/00/0000');
                $('.phone').mask('(00)0000-00000');
                $('.cpf').mask('000.000.000-00', {reverse: true});
                $('.rg').mask('00.000.000-0', {reverse: true});

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
                            
                        $.post("http://localhost/Project/Morador/Exclui",
                          {
                            id: valor
                            
                          },function(resultado){
                            
            
                        });
                            
                          swal(
                            'Deletado!',
                            'Seu arquivo foi deletado!',
                            'success'
                          )
                        
                         
                        
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
                
                //Script de cadastro de moradores
               /* $("#btn_cadastrar").click(function(){
					
					
					var nome = $("#nome").val();
					var nascimento = $("#data").val();
					var rg = $("#rg").val();
					var cpf = $("#cpf").val();
					var telefone1 = $("#fone1").val();
					var telefone2 = $("#fone2").val();
					var placa1 = $("#placa1").val();
					var placa2 = $("#placa2").val();
					var marca1 = $("#marca1").val();
					var marca2 = $("#marca2").val();
					var modelo1 = $("#modelo1").val();
					var modelo2 = $("#modelo2").val();
					var endereco = $("#endereco").val();
					var parcela = $("#parcela option:selected").val();
					var unidade = $("#unidade").val();
					var qtnveiculos = $("#veiculos").val();
					//var foto = $("#foto").val();
					
					if((nome!="") && (nascimento!="") )
                       {
                       $.post("http://localhost/Project/Morador/Cadastra",{
							v_nome:nome,
							v_data:nascimento,
							v_rg:rg,
							v_cpf:cpf,
							v_fone1:telefone1,
							v_fone2:telefone2,
							v_endereco:endereco,
							v_parcela:parcela,
							v_unidade:unidade,
                            v_placa1:placa1,
                            v_placa2:placa2,
                            v_marca1:marca1,
                            v_marca2:marca2,
                            v_modelo1:modelo1,
                            v_modelo2:modelo2,
							v_veiculos:qtnveiculos
                           // v_foto:foto,
							
					},function(dados){
             
						
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
				});*/
                //----------------------------------------------------------------------fim do POST
                
                $("#btn_rec").click(function(){
                    
                    setTimeout(function(){

                               window.location.reload(); 
                               
                            },500); 
                });
                
            });
        </script>