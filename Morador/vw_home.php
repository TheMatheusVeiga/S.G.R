<html>
    <head>
    
       <?php  include("includes/cdns.php"); ?>
        
                
    </head>
    
    <body>
    
        <?php  include("includes/sidebar.php"); ?>
    
<!-- Script de componentes -->

        <script>
            $(document).ready(function() {
                
                //Modal Control
                
                $('.modal').modal();
                $('.modal').modal();
                
                //Trigger da combobox
                $('select').material_select();
                
                //Definiçõs da Mask
                 $('.date').mask('00/00/0000');
                $('.phone').mask('(00)0000-00000');
                $('.cpf').mask('000.000.000-00', {reverse: true});
                $('.rg').mask('00.000.000-0', {reverse: true});
            
                
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
                
                //Campos de contato
                $("#contatos").change(function(){
			
			        var select = $(this).val();
                    
                    
                    
                    if(select == 1)
                       {
                        $("#tel_aux1").removeClass("hide");
                        $("#tel_aux2").addClass("hide");
                          //alert(select + "-01");    -Verificação de segurança
                       }
                    else if(select == 2) 
                       {
                        $("#tel_aux1").removeClass("hide");
                        $("#tel_aux2").removeClass("hide");
                           //alert(select + "-02");    -Verificação de segurança
                       }
                    else
                    {
                        $("#tel_aux1").addClass("hide");
                        $("#tel_aux2").addClass("hide");
                    }
                     
                    
                });
                
                
                
                //Campos de veículos
                $("#veiculos").change(function(){
			
			        var select = $(this).val();
                    
                    
                    
                    if(select == 1)
                       {
                        $("#veic_auxplaca1").removeClass("hide");
                        $("#veic_auxmodelo1").removeClass("hide");
                        $("#veic_auxmarca1").removeClass("hide");

                        //->

                        $("#veic_auxplaca2").addClass("hide");
                        $("#veic_auxmodelo2").addClass("hide");
                        $("#veic_auxmarca2").addClass("hide");
                          //alert(select + "-01");    -Verificação de segurança
                       }
                    else if(select == 2) 
                       {
                        $("#veic_auxplaca1").removeClass("hide");
                        $("#veic_auxmodelo1").removeClass("hide");
                        $("#veic_auxmarca1").removeClass("hide");
                        //->
                        $("#veic_auxplaca2").removeClass("hide");
                        $("#veic_auxmodelo2").removeClass("hide");
                        $("#veic_auxmarca2").removeClass("hide");

                          //alert(select + "-01");    -Verificação de segurança
                       }
                    else
                    {
                        $("#veic_auxplaca1").addClass("hide");
                        $("#veic_auxmodelo1").addClass("hide");
                        $("#veic_auxmarca1").addClass("hide");
                        $("#veic_auxplaca2").addClass("hide");
                        $("#veic_auxmodelo2").addClass("hide");
                        $("#veic_auxmarca2").addClass("hide");
                        
                    }
                     
                    
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
                        setTimeout(function(){

                               window.location.reload(); 
                               
                            },3000);
						
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
                $("#btn_cadastrar").click(function(){
					
					
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
				});
                //----------------------------------------------------------------------fim do POST
                
                $("#btn_rec").click(function(){
                    
                    setTimeout(function(){

                               window.location.reload(); 
                               
                            },500); 
                });
                
            });
        </script>
<!-- Fim script -->
        
        <div class="container pgmargin">
            
            <!-- MENU DAS TAB'S -->
            <ul id="tabs-swipe-demo" class="tabs tab-bar">
 
                <li class="tab col s3"><a class="active" href="#test-swipe-1">Dados gerais</a></li>
                <li class="tab col s3"><a href="#test-swipe-2" batatinha="xavier">Cadastro</a></li>
                <li class="tab col s3"><a href="#test-swipe-3">Gerenciar</a></li>

            </ul>

            
            
            <!-- SWIPE 01 DAS TAB'S -->
            <div id="test-swipe-1" class="col s12"> <br> <br> <br>
             
                <?php include("includes/moradorpainels.php"); ?>    
                
                <table class="boarded center">
                        <thead>
                          <tr>
                              <th>Nome</th>
                              <th>Nascimento</th>
                              <th>Rg</th>
                              <th>Cpf</th>
                              <th>Telefone(1)</th>
                              <th>Telefone(2)</th>
                              <th>Modelo de pagamento</th>
                          </tr>
                        </thead>

                        <tbody>
                            
                          <?php $total = 0; ?>
                          <?php foreach($resultado as $linha): ?>
                          <tr>
                            <td><?= $linha->nome_morador;?></td>
                            <td><?= $linha->nascimento_morador; ?></td>
                            <td><?= $linha->rg_morador; ?></td>
                            <td><?= $linha->cpf_morador; ?></td>
                            <td><?= $linha->contato1; ?></td>
                            <td><?= $linha->contato2; ?></td>                              
                            <td><?= $linha->parcela_morador; ?></td>
                          </tr>
                          <?php $total ++;?>        
                          <?php endforeach; ?>
                            
                        </tbody>
                         
                      </table>
					 
                <br>
                <br>
                <br>
                
                
                
            </div>
            
            <!-- SWIPE 02 DAS TAB'S -->
            <div id="test-swipe-2" class="col s12"> <br> <br> <br>
                  
                <form action="<?php echo base_url("Morador/Cadastra");?>" method="post">
                    
                    <!-- Conteudo row 01 -->
                    <div class="row">
					 
						<div class="input-field col s4">
						    <i class="material-icons small prefix">account_circle</i>
							<input id="nome" type="text" class="validate">
							<label for="icon_prefix">Nome completo</label>
						</div>
                        
                        <div class="input-field col s4">
                        <i class="material-icons small prefix">phone</i>

                            
						    <!-- Smart Select BD-->
                            <select id="contatos">
                             
                              <option value="0" selected>Número de contatos</option>
                              <option value="1"> 1 numero (s) </option>
                              <option value="2"> 2 numero (s)</option>                                  
                            </select>

						</div>
                        
                        <div id="tel_aux1" class="input-field col s2 hide">
						    <i class="material-icons small prefix">phone</i>
							<input id="fone1" type="text" class="validate phone">
							<label for="icon_prefix">Contato 1</label>
						</div>
                        
                        <div id="tel_aux2" class="input-field col s2 hide">
						    <i class="material-icons small prefix">phone</i>
							<input id="fone2" type="text" class="validate phone">
							<label for="icon_prefix">Contato 2</label>
						</div>
                        
					</div>
                     
                     <!-- Conteudo row 02 -->
                     <div class="row">
					 
						<div class="input-field col s4">
						    <i class="material-icons small prefix">assignment</i>
							<input id="data" type="text" class="validate date">
							<label for="icon_prefix">Data de nascimento</label>
						</div>
                         
                         <div class="input-field col s4">
                        <i class="material-icons small prefix">directions_car</i>

                            
						    <!-- Smart Select BD-->
                            <select id="veiculos">
                             
                              <option value="" selected>Numero de veículos</option>
                              <option value="1"> 1 </option>
                              <option value="2"> 2 </option>                                  
                            </select>

						</div>
                         
                         <div id="veic_auxplaca1" class="input-field col s2 hide">
						    <i class="material-icons small prefix">directions_car</i>
							<input id="placa1" type="text" class="validate">
							<label for="icon_prefix">Placa</label>
						</div>
                        
                        <div id="veic_auxplaca2" class="input-field col s2 hide">
						    <i class="material-icons small prefix">directions_car</i>
							<input id="placa2" type="text" class="validate">
							<label for="icon_prefix">Placa</label>
						</div>
                         
					</div>
                     
                     <!-- Conteudo row 03 -->
                     <div class="row">
					 
						<div class="input-field col s4">
						    <i class="material-icons small prefix">assignment</i>
							<input id="rg" type="text" class="validate rg">
							<label for="icon_prefix">Rg</label>
						</div>
                         
                         <div class="input-field col s4">
						    <i class="material-icons small prefix">location_on</i>
							<input id="endereco" type="text" class="validate">
							<label for="icon_prefix">Endereço</label>
						</div>
                         
                         <div id="veic_auxmodelo1" class="input-field col s2 hide">
						    <i class="material-icons small prefix">directions_car</i>
							<input id="marca1" type="text" class="validate">
							<label for="icon_prefix">Marca</label>
						</div>
                        
                        <div id="veic_auxmodelo2" class="input-field col s2 hide">
						    <i class="material-icons small prefix">directions_car</i>
							<input id="marca2" type="text" class="validate">
							<label for="icon_prefix">Marca</label>
						</div>
					</div>
                            
                    <!-- Conteudo row 03 -->
                     <div class="row">
					 
						<div class="input-field col s8">
						    <i class="material-icons small prefix">assignment</i>
							<input id="cpf" type="text" class="validate cpf">
							<label for="icon_prefix">Cpf</label>
						</div>
                         
                        

                        <div id="veic_auxmarca1" class="input-field col s2 hide">
						    <i class="material-icons small prefix">directions_car</i>
							<input id="modelo1" type="text" class="validate">
							<label for="icon_prefix">Modelo</label>
						</div>
                        
                        <div id="veic_auxmarca2" class="input-field col s2 hide">
						    <i class="material-icons small prefix">directions_car</i>
							<input id="modelo2" type="text" class="validate">
							<label for="icon_prefix">Modelo</label>
						</div>
					</div>
            
                    <!-- Conteudo row 04 -->
                    
                    <div class="row">
                    
                         <div class="input-field col s4">
                            <i class="material-icons small prefix">attach_money</i>
                             
                            <!-- Smart Select BD-->
                            <select id="parcela">
                              <option value="" disabled selected>Modelo bancário</option>
                                
                            <?php foreach($helper_parcela as $linha) :?>
                                
                              <option value="<?php echo $linha->modelo_parcela ?>"> <?php echo $linha->modelo_parcela ?> </option>
                                
                            <?php endforeach; ?>
                            </select>
                            <!-- Smart Select BD--> 
                             
                        </div>
                        
                        <div class="input-field col s4">
                            <i class="material-icons small prefix">home</i>
                             
                             <!-- Smart Select BD-->
                             <select id="unidade">
                              <option value="" disabled selected>Modelo da unidade</option>
                                 
                             <?php foreach($helper_unidade as $linha) :?>
                                
                              <option value="<?php echo $linha->modelo_unidade ?>"> <?php echo $linha->modelo_unidade ?> </option>
                                          
                            <?php endforeach; ?>
                            </select>
                            <!-- Smart Select BD-->
                             
                        </div>
                    
                    </div>
                
                    <div class="row">

                          <a id="btn_cadastrar" class="btn-floating btn-large waves-effect waves-light green"><i class="material-icons">send</i></a>

                          <button type="reset" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">clear</i></button>

                    </div>
                </form>
            </div>
            
            <!-- SWIPE 03 DAS TAB'S -->
            <div id="test-swipe-3" class="col s12"> <br> <br> <br>
            
             <div class="row">
                <div class="input-field col s4 offset-s3">
				     
                    <input type="text" placeholder="Pesquisar" class="validate" id="pesquisa" name="pesquisa">
				   <button type="submit" id="btn_ok" class="btn btn-default col s5">Pesquisar</button><button type="submit" id="btn_rec" class="btn btn-default col s5 offset-s2">Encerrar</button>
				</div><br>
            </div>
                
                <div id="resultado">
                
                    
                
                </div>
                     
                
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