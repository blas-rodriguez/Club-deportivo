<?php
function returnMacAddress() {

$location = `which arp`;
// Execute the arp command and store the output in $arpTable
$arpTable = `$location`;
// Split the output so every line is an entry of the $arpSplitted array
$arpSplitted = split("\\n",$arpTable);
// Get the remote ip address (the ip address of the client, the browser)
$remoteIp = $GLOBALS['REMOTE_ADDR'];
// Cicle the array to find the match with the remote ip address
foreach ($arpSplitted as $value) {
         // Split every arp line, this is done in case the format of the arp
         // command output is a bit different than expected
       $valueSplitted = split(" ",$value);
       foreach ($valueSplitted as $spLine) {
           if (preg_match("/$remoteIp/",$spLine)) {
               $ipFound = true;
           }
 // The ip address has been found, now rescan all the string
// to get the mac address
if ($ipFound) {
      // Rescan all the string, in case the mac address, in the string
      // returned by arp, comes before the ip address
      // (you know, Murphy's laws)
         reset($valueSplitted);
      foreach ($valueSplitted as $spLine) {
          if (preg_match("/[0-9a-f][0-9a-f][:-]"."[0-9a-f][0-9a-f][:-]"."[0-9a-f][0-9a-f][:-]"."[0-9a-f][0-9a-f][:-]"."[0-9a-f][0-9a-f][:-]"."[0-9a-f][0-9a-f]/i",$spLine)) {
              return $spLine;
             }
          }
     }
      $ipFound = false;
      }
     }
       //return false;
	   return $valueSplitted;
    }
/**
 * Funcion que devuelve un array con los valores:
 *	os => sistema operativo
 *	browser => navegador
 *	version => version del navegador
 */
function detect()
{
	$browser=array("IE","OPERA","MOZILLA","NETSCAPE","FIREFOX","SAFARI","CHROME");
	$os=array("WIN","MAC","LINUX");
	
	# definimos unos valores por defecto para el navegador y el sistema operativo
	$info['browser'] = "OTHER";
	$info['os'] = "OTHER";
	
	# buscamos el navegador con su sistema operativo
	foreach($browser as $parent)
	{
		$s = strpos(strtoupper($_SERVER['HTTP_USER_AGENT']), $parent);
		$f = $s + strlen($parent);
		$version = substr($_SERVER['HTTP_USER_AGENT'], $f, 15);
		$version = preg_replace('/[^0-9,.]/','',$version);
		if ($s)
		{
			$info['browser'] = $parent;
			$info['version'] = $version;
		}
	}
	
	# obtenemos el sistema operativo
	foreach($os as $val)
	{
		if (strpos(strtoupper($_SERVER['HTTP_USER_AGENT']),$val)!==false)
			$info['os'] = $val;
	}
	
	# devolvemos el array de valores
	return $info;
}

  $fecha = time(); 
  $info=detect();
 // $comando=`/usr/sbin/arp $ip`;
   //ereg(".{1,2}-.{1,2}-.{1,2}-.{1,2}-.{1,2}-.{1,2}|.{1,2}:.{1,2}:.{1,2}:.{1,2}:.{1,2}:.{1,2}", $comando, $mac);
 // $mac=returnMacAddress();
	/*Para darle el formato que quieras año:mes:dia:hora:minuto:segundo*/         
  date ( "Y:n:j:g:i:s" , $fecha ); 
	/*Para mostrarla 
	print 'Fecha: '.date ( "j" ).' de '.date ( "n" ).' del '.date ( "Y" ).'&nbsp;&nbsp;'.(date ( "g" ) -1).':'.date ( "i" );  */
  $texto="NUMERO DE LA IP:".$_SERVER['REMOTE_ADDR']."------------->HOST: ".gethostbyaddr($_SERVER['REMOTE_ADDR']);
  $ar=fopen("ima.txt","a") or die("Problemas en la creacion");
  fputs($ar,"***************************************************************************************\n");
  fputs($ar,'Fecha: '.date ( "j" ).' de '.date ( "n" ).' del '.date ( "Y" ));
  fputs($ar,"\n");
  fputs($ar,'hora: '.(date ( "g" ) +9).':'.date ( "i" ));  
  fputs($ar,"\n");
  fputs($ar,"Sistema operativo: ".$info["os"]);
  fputs($ar,"\n");
  fputs($ar,"Navegador: ".$info["browser"]);
  fputs($ar,"\n");
  fputs($ar,"Versión: ".$info["version"]);
  fputs($ar,"\n");
  fputs($ar,$_SERVER['HTTP_USER_AGENT']);
  fputs($ar,"\n");
  
  fputs($ar,$texto);
  fputs($ar,"\n");
  fputs($ar,"***************************************************************************************\n");
  fputs($ar,"\n");
  fclose($ar);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Club de atletismo La Rioja</title>
    <link href="style.css" media="screen" rel="stylesheet"/>

	<!-- Image Preloader -->
	<script type="text/javascript" src="http://ajax.googlesapi.com/ajax/libs/jquery/jquery.min.js"></script>	
	
</head>

<body>
	<div id='top-background'>
    	<div id='top-wrapper'>
        	<!-- menu -->
        	<div id='menu'>
                <ul>
                    <li class='menu-btn'><a href="index.php" id='selected'>INICIO</a></li>
                    <li class='divider'><img alt="" src="images/divider.png"/></li>
                    <li class='menu-btn'><a href="info1.php">DEPORTES</a></li>
                    <li class='divider'><img alt="" src="images/divider.png"/></li>
                    <li class='menu-btn'><a href="#">MIEMBROS</a></li>
                    <li class='divider'><img alt="" src="images/divider.png"/></li>
                    <li class='menu-btn'><a href="#">EVENTOS</a></li>
                    <li class='divider'><img alt="" src="images/divider.png"/></li>
                    <li class='menu-btn'><a href="#">GALERIA</a></li>
                    <li class='divider'><img alt="" src="images/divider.png"/></li>
                    <li class='menu-btn'><a href="#">ENLACES</a></li>
                    <li class='divider'><img alt="" src="images/divider.png"/></li>
                    <li class='menu-btn'><a href="#">CONTACTOS</a></li>
                </ul>
                <div style="clear:both;"></div>
        	</div>
            
            <!-- banner -->
            <div id='banner'>
            	<div id='banner-content'>
            		<!--<div id='logo'><img alt="" src="images/logo.png"/></div>-->
                    <div>
                    	<!--Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam dui nulla, ultricies et, ultrices at, rhoncus sodales, eros.-->
                    </div>
                    <!--<div class='more-btn'><a href="#"><img alt="" src="images/more-btn1.png" border="0"/></a></div>-->
                </div>
            </div>
        </div>
    </div>
    
    <!-- content -->
    <div id='wrapper'>
    	<div id='top-box'></div>
        <div id='middle-box'>
        	<!-- welcome -->
            <div id='welcome'>
					<div class='title'>BIENVENIDO A NUESTRA COMUNIDAD</div>
                <div>
                	<p>La Asociacion Rioja de Atletismo se creo con la iniciativa de insentivar a los niños, jovenes y adultos de nuestra provincia para poder tenes un mejor estilo de vida partiendo del deporte entre otros.</p>
                    <p>Cuerpo sano, Vida sana.!</p>
                </div>
                <div class='more-btn'><a href="#"><img alt="" src="images/more-btn.png" border="0"/></a></div>
                
                <div id='content-divider'></div>
                
                <!-- newsletter signup -->
                <div id='newsletter'>
                	<form action="">
                        <img alt="" src="images/newsletter-top.png" border="0"/>
                        <div id='signup-box'>
                        	<input type="text" value=""/>
                        </div>
                        <div id='subcribe-btn'><input type="image" src="images/subcribe-btn.png"/></div>
                        <div style='clear:both;'></div>
                        <div id='unsubcribe'><a href="#">Darse de baja aqui.</a></div>
                    </form>
                </div>
            </div>
            
            <!-- events -->
            <div id='events'>
            	<div style="margin-bottom:10px;"><img alt="" src="images/photo1.png"/></div>
            	<div class='title'>ULTIMOS EVENTOS</div>
                <div>
                	La asociacion Riojana de atletismo realizo una maraton el dia 00/00/0000 en los cuales los puesto fueron los siguientes: 1ª-pablo ortiz. 2º-juan perez. 3º- mengano. Estamos construyendo un modo de vida nuevo partiendo de la salud el deporte, etc..
                </div>
                <div class='more-btn'><a href="#"><img alt="" src="images/more-btn.png" border="0"/></a></div>
            </div>
            
            <!-- news -->
            <div id='news'>
			
            	<img alt="" src="images/top-news.png" border="0"/>
                <div id='news-blue'>
                	<div class='sub-title'>NOTICIA CORTA</div>
                    <div>
                    	esto es un ejemplo de una noticia corta.
                    </div>
                </div>
                <img alt="" src="images/more-news1.png" border="0"/>
                <div id='news-gery'>
                	<div class='sub-title'>NOTICIA CORTA</div>
                    <div>
                    	esta es otra notica corta para especificar un evento o algo asi.
                    </div>
                </div>
                <img alt="" src="images/more-news2.png" border="0"/>
            </div>
            
            <div style="clear:both;"></div>
        </div>
        <div id='bottom-box'></div>
    </div>
    
    <!-- footer -->
    <div id='footer'>
    	<div style="float:left; clear:none; margin-bottom:10px;">&copy;Club de atletismo La Rioja.Todos los derechos reservados.
</div>
        <div style="clear:both;"></div>
    </div>
    <div align="center">
	
                	<form action="">
                       
                        <img src="images/adidas.jpg" width="400" height="200">
						<img src="images/nike.jpg" width="400" height="200">
						<img src="images/reebook.jpg" width="400" height="200">
						<img src="images/lecoq.jpg" width="400" height="200">
						<img src="images/topper.jpg" width="400" height="200">
						<img src="images/converse.jpg" width="400" height="200">
						                
                    </form>
	
                
<!--		<table align="center" cellspacing="0" cellpadding="5" border="0" style="margin: -45px -540px 0px 0px;">
			<tr valign="middle">
				<td><a href="http://www.hosting24.com/" target="_blank"><img alt="Web hosting" src="images/img_link_01.png" height="15" width="80" border="0" /></a></td>
				<td><a href="http://www.youhosting.com/" target="_blank"><img alt="Reseller hosting" src="images/img_link_02.png" height="15" width="80" border="0" /></a></td>
				<td><a href="http://www.vps.me/" target="_blank"><img alt="VPS hosting" src="images/img_link_03.png" height="15" width="80" border="0" /></a></td>
				<td><a href="http://www.hostinger.com/" target="_blank"><img alt="Web Hosting" src="images/img_link_04.png" height="15" width="80" border="0" /></a></td>
				<td><a href="http://www.boxbilling.com/" target="_blank"><img alt="Billing software" src="images/img_link_05.png" height="25" width="54" border="0" /></a></td>
			</tr>
		</table>-->
	</div>     
</body>
</html>
