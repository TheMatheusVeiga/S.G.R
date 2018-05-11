<html>
    <head>
	
    <?php include("includes/cdns.php");?>
        
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
  width:70%;
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

.legal
    {
        background-color: #2247CC;
    }
    
</style>        

    </head>
    
    <body>
        		
		<script>
			$(document).ready(function(){
               
			});
        </script>
        
        <div class="main-form">
            <i class="logo"></i>
            
            <label class="center"> S.G.R </label>
            <label class="center"> Sistema de Gerencimento Residencial </label>
            
    <div class="row">
                
                <div class="col s12 m4">
                      <div class="card legal">
                          
                        <div class="center promo promo-example">
                            
                             <i class="material-icons large white-text">flash_on</i> <br>
                       
                          <span class="card-title centered white-text">Eficiência</span>
                            
                        </div>
                          
                        <div class="card-content white-text">
                          <p>Melhor opção de ferramenta de auxílio administrativo para gerenciamento e controle de fluxo tendo resultados notáveis e positivos em sua área de atuação.</p>
                        </div>
                                                    
                      </div>
                </div>
        
                <div class="col s12 m4">
                      <div class="card legal">
                          
                        <div class="center promo promo-example">
                            
                             <i class="material-icons large white-text">alarm</i> <br>
                       
                          <span class="card-title centered white-text">Preticidade</span>
                            
                        </div>
                          
                        <div class="card-content white-text">
                          <p>Ferramenta de auxílio total à sessão administrativa condômina que visa facilitar os processos de oganização, perfilaçã e gerenciamento de um complexo residencial.</p>
                        </div>
                                                    
                      </div>
                </div>
        
        <div class="col s12 m4 ">
                      <div class="card legal">
                          
                        <div class="center promo promo-example">
                            
                             <i class="material-icons large white-text">power_settings_new</i> <br>
                       
                          <span class="card-title centered white-text">Simplicidade</span>
                            
                        </div>
                          
                        <div class="card-content white-text">
                          <p>Sistema de simples operação por parte de usuário, possuindo uma linearidade e uma singularidade em seu designe e em sua mecânica.</p>
                        </div>
                                                    
                      </div>
                </div>
                
      </div>
            
            <br>
            <br>
            <br>
            
            <h2 class="center"> Contatos </h2>
            <br>
            <br>
            
            <h4> Ana Raquel Moratelli Ramos </h4> <h6>(12)98124-1273 </h6><h6> ana.raquelr@hotmail.com</h6>
            <h4> Matheus Uchoas Veiga </h4> <h6>(12)99627-3816 </h6> <h6> matheuzuchoas@gmail.com </h6>
            
            <br>
            
            <a class="btn-floating btn-large waves-effect waves-light red modal-trigger" href="<?php echo base_url("Login/index");?>"><i class="material-icons">keyboard_backspace</i></a>
            
        </div>
        
    </body>
</html>