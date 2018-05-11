<html>
    <head>
	
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
	
        <!--Estilo.css-->
<style> 
    
*{
  -webkit-box-sizing:border-box;
  -moz-box-sizing:border-box;
  box-sizing:border-box;
}
body{
  background: #7794FF;
  font-family:Arial;
  font-size:12px;
  color:#C4BCB0;
}
input[type="text"],
input[type="password"]{
  background:#EAE6E1;
  border:0;
  font-weight:bold;
  padding:10px;
  border-radius:3px;
  width:100%;
  margin:5px 0;
  outline:medium none;
  color:#838383;
}
input[type="checkbox"]{
  -webkit-appearance:none;
  width:10px;
  height:10px;
  position:relative;
  outline:medium none;
  margin-right:10px;
}
input[type="checkbox"]::before{
  width:9px;
  height:9px;
  content:"";
  display:block;
  border:3px solid #C4BCB0;
  border-radius: 9px;
  position:absolute;
}
input[type="checkbox"]:checked::after{
  width:5px;
  height:5px;
  content:"";
  display:block;
  background: #C4BCB0;
  border-radius: 5px;
  position:absolute;
  left:5px;
  top:5px;
}
input[type="submit"]{
  display:block;
  padding:10px;
  background:#2247CC;
  border:0;
  border-radius:3px;
  font-weight:bold;
  width:100%;
  color:#fff;
  cursor:pointer;
  -webkit-transition:all 0.3s;
  -moz-transition:all 0.3s;
  transition:all 0.3s;
}
input[type="submit"]:hover{
  background:#2247CC;
}
.main-form{
  width:350px;
  margin: 100px auto;
  padding:50px;
  border: 1px solid rgba(0,0,0,0.1);
  -webkit-box-shadow:0 1px 2px 2px 1px rgba(0,0,0,0.2);
  background:#fff;
}
.logo{
  background:#2247CC;
  width:40px;
  height:40px;
  display:block;
  margin:0 auto 30px;
  border-top-left-radius:20px;
  border-top-right-radius:20px;
  border-bottom-left-radius:20px;
  position:relative;
  -webkit-transform: rotate(45deg);
  -moz-transform: rotate(45deg);
  transform: rotate(45deg);
}
.logo::before{
  width:14px;
  height:14px;
  display:block;
  border:5px solid #F7F5F2;
  content:"";
  position:absolute;
  border-radius:14px;
  top:8px;
  left:8px;
}
.main-form > label{
  display:block;
  margin:10px 0 15px;
  line-height:15px;
  cursor:pointer;
}
.main-form > div{
  margin-top:20px;
}
a{
  color:#C4BCB0;
  text-decoration:none;
}
.main-form > a{
  font-size:11px;
  display:block;
  text-align:center;
  margin:10px 0;
}
.main-form > div >a:first-child{
  font-weight:bold;
}
.main-form > div >a:nth-child(2){
  border:1px solid #151E7F;
  display:inline-block;
  border-radius:3px;
  color:#2247CC;
  font-weight:bold;
  padding:7px 15px;
  margin-left:28px;
  -webkit-transition:all 0.3s;
  -moz-transition:all 0.3s;
  transition:all 0.3s;
}
.main-form > div >a:nth-child(2):hover{
  background:#2247CC;
  color:#fff;
}
    
    
</style>        

    </head>
    
    <body>
        		
		<script>
			$(document).ready(function(){
                $("#checkbox").prop("disabled", true);
				$("#btn_entrar").click(function(event){
					event.preventDefault();
					
					var email = $("#email").val();
					var senha = $("#senha").val();
					
					$.post("<?=base_url("/Login/valida");?>",{
							v_email:email,
							v_senha:senha
					},function(dados){
						
						if(dados == "OK")
						{
							
							window.location.href ="<?=base_url("/Home");?>";
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
			});
			</script>
        <form action="<?php echo base_url("Login/valida");?>" method="post">
            
        <div class="main-form">
            
            <i class="logo"></i>
            
                <input name="email" type="text" placeholder="E-mail" id="email">
                <input name="senha" type="password" placeholder="Senha" id="senha">
            
                  <label>
                    <input id="checkbox" type="checkbox" checked> Dados obrigatórios ! 
                  </label>
            
                <input type="submit" id="btn_entrar" value="Entrar">
                   <!-- <a href="#" title="">Esqueceu sua senha ?!</a> -->
          <div>
            <a title="">Adquira nosso produto!</a>
            <a id="teste" href="<?php echo base_url("Login/contato");?>" title="">Contato</a>
          </div>
            
            
            
        </div>
        
        </form>
        
        
        
        
        
        <script>
            
           $(document).ready(function(){
	           
               swal({title: 'Error!', text: 'Do you want to continue', type: 'error', confirmButtonText: 'Cool'});
                                 
               $('#teste').click(function{ 
                
                      swal('Deu certo!', 'Ele chamou a função!', 'sucsses');
               });
               
           });
            
        </script>
        
    </body>
</html>