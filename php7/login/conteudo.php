<?PHP include('menu_conteudo.php'); ?>
<?PHP
#session_start();
if(isset($_SESSION['login_sessao']))
	{
		?>

        <html>
    <head>
        <style>
            #cabecalho{
                color: grey;
                text-align: center;
                background: white;
                font-size: 70px;
                padding-bottom: 30px;
                font-family: serif; 
            }
            #menu{
                margin-bottom: 2px;
                color: gold;
                font-weight: bolder;
                word-spacing: 30px;
                padding: 10px;

            }
            #link{
                color: black;
                text-decoration: none;
            }
            a{
                color: black;
            }
        </style>      
    </head>
    <body>
        <div id="cabecalho">
            <a id="logout" href="logout.php" style="background-color: gainsboro;padding: 5px;font-size: medium;float: right">Logout</a>
                        <img src="smarthome.jpg" height="200" width="600"/>  
        </div>
        <hr id="linha" width="100%">
        <div id="menu">
            <center>
                <a id="link" href="http://localhost:8095/arduino_final/php7/historico_total.php" target="iframe">HISTÓRICO</a>
                <a id="link" href="http://localhost:8095/arduino_final/php7/graficos_menu.html" target="iframe">GRÁFICOS</a>
                <a id="link" href="http://192.168.0.108" target="iframe">SENSOR</a>
                
                </center>
        </div>
        <hr id="linha" width="100%">
        <div>
            <iframe name="iframe" style="border: 0;"  width="100%" height="100%"></iframe>
        </div>
    </body>
</html>
       
        
		<?PHP
	}
else
	{
		?>
        <div class="borda1 padding20">
        	<img src="imagens/lock.png" width="200">
            <br>
            <br>
        	Esta é uma área restrita, por favor, <a href="login.php"><strong>efetue login</strong></a>.
        </div>
		<?PHP
	}
?>
