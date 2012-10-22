<?php
/**
 * @package                Joomla.Site
 * @subpackage	Templates.beez_20
 * @copyright        Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license                GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

jimport('joomla.filesystem.file');

// check modules
$showRightColumn	= ($this->countModules('position-3') or $this->countModules('position-6') or $this->countModules('position-8'));
$showbottom			= ($this->countModules('position-9') or $this->countModules('position-10') or $this->countModules('position-11'));
$showleft			= ($this->countModules('position-4') or $this->countModules('position-7') or $this->countModules('position-5'));

if ($showRightColumn==0 and $showleft==0) {
	$showno = 0;
}

JHtml::_('behavior.framework', true);

// get params
$color				= $this->params->get('templatecolor');
$logo				= $this->params->get('logo');
$navposition		= $this->params->get('navposition');
$app				= JFactory::getApplication();
$doc				= JFactory::getDocument();
$templateparams		= $app->getTemplate(true)->params;

//$doc->addStyleSheet($this->baseurl.'/templates/system/css/system.css');
//$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/position.css', $type = 'text/css', $media = 'screen,projection');
//$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/layout.css', $type = 'text/css', $media = 'screen,projection');
//$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/print.css', $type = 'text/css', $media = 'print');
$doc->addStyleSheet($this->baseurl.'/templates/beez_20/css/template.css');

$files = JHtml::_('stylesheet', 'templates/'.$this->template.'/css/general.css', null, false, true);
if ($files):
	if (!is_array($files)):
		$files = array($files);
	endif;
	foreach($files as $file):
		$doc->addStyleSheet($file);
	endforeach;
endif;

$doc->addStyleSheet('templates/'.$this->template.'/css/'.htmlspecialchars($color).'.css');
if ($this->direction == 'rtl') {
	$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/template_rtl.css');
	if (file_exists(JPATH_SITE . '/templates/' . $this->template . '/css/' . $color . '_rtl.css')) {
		$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/'.htmlspecialchars($color).'_rtl.css');
	}
}

$doc->addScript($this->baseurl.'/templates/'.$this->template.'/javascript/jquery.cycle.all.js', 'text/javascript');
$doc->addScript($this->baseurl.'/templates/'.$this->template.'/javascript/jquery-1.8.2.min.js', 'text/javascript');
$doc->addScript($this->baseurl.'/templates/'.$this->template.'/javascript/jquery.easing.1.3.js', 'text/javascript');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
<jdoc:include type="head" />

<!--[if lte IE 6]>
<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/ieonly.css" rel="stylesheet" type="text/css" />
<?php if ($color=="personal") : ?>
<style type="text/css">
#line {
	width:98% ;
}
.logoheader {
	height:200px;
}
#header ul.menu {
	display:block !important;
	width:98.2% ;
}
</style>
<?php endif; ?>
<![endif]-->

<!--[if IE 7]>
<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/ie7only.css" rel="stylesheet" type="text/css" />
<![endif]-->

<script type="text/javascript">
	var big ='<?php echo (int)$this->params->get('wrapperLarge');?>%';
	var small='<?php echo (int)$this->params->get('wrapperSmall'); ?>%';
	var altopen='<?php echo JText::_('TPL_BEEZ2_ALTOPEN', true); ?>';
	var altclose='<?php echo JText::_('TPL_BEEZ2_ALTCLOSE', true); ?>';
	var bildauf='<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/plus.png';
	var bildzu='<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/minus.png';
	var rightopen='<?php echo JText::_('TPL_BEEZ2_TEXTRIGHTOPEN', true); ?>';
	var rightclose='<?php echo JText::_('TPL_BEEZ2_TEXTRIGHTCLOSE', true); ?>';
	var fontSizeTitle='<?php echo JText::_('TPL_BEEZ2_FONTSIZE', true); ?>';
	var bigger='<?php echo JText::_('TPL_BEEZ2_BIGGER', true); ?>';
	var reset='<?php echo JText::_('TPL_BEEZ2_RESET', true); ?>';
	var smaller='<?php echo JText::_('TPL_BEEZ2_SMALLER', true); ?>';
	var biggerTitle='<?php echo JText::_('TPL_BEEZ2_INCREASE_SIZE', true); ?>';
	var resetTitle='<?php echo JText::_('TPL_BEEZ2_REVERT_STYLES_TO_DEFAULT', true); ?>';
	var smallerTitle='<?php echo JText::_('TPL_BEEZ2_DECREASE_SIZE', true); ?>';
	$(document).ready(function() {
		$('#clientes').cycle({ 
			    fx:     'scrollHorz', 
			    delay:  -4000 });
		
	});
</script>

</head>

<body>
    
    	<div id="contenido">
    		<div id="navegacion">
				<jdoc:include type="modules" name="navegacion" />
			</div>
			<div id= "cabecera">

				<div id="logo">
					<div style="background: Salmon; width: 550px; height: 60px;"></div>
				</div>			

			</div>
			<div id="contenedor">
				<div id="nuestros_clientes">
					<div class="titulo"> <h1>NUESTROS CLIENTES</h1> </div>
					<div id="clientes">
						<div style="background: red; width: 500px; height: 300px;"></div>
						<div style="background: blue; width: 500px; height: 300px;"></div>
						<div style="background: black; width: 500px; height: 300px;"></div>
					</div>
				</div>
				<div id="quienes_somos">
					<div class="titulo"> <h1>QUIENES SOMOS </h1></div>
					<div id= "descripcion"> 
						<P>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</P>
					</div>

					<div id="imagen_descripcion"> 
						<div style="background: LightGreen; width: 250px; height: 200px;"></div>
					</div>
				</div>

				<div id="servicios">
					<div class="titulo"> <h1>SERVICIOS </h1></div>
					<div id= "lista"> 
						<ul>
							<li><strong>Generación de proyectos creativos.</strong>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
							</li>
							<li><strong>Diseño Gráfico. </strong>"Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat." 
							</li>
							<li><strong>Administración de proyectos</strong>"Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
							</li>
							<li><strong>Administración de Comunidades.</strong>"Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur."</li>

						</ul>
					</div>

					<div id="imagen_servicios"> 
						<div style="background: red; width: 250px; height: 100px;"></div>
						<div style="background: blue; width: 250px; height: 100px;"></div>
						<div style="background: black; width: 250px; height: 100px;"></div>
						<div style="background: green; width: 250px; height: 100px;"></div>
					</div>
				</div>

				<div id="contacto">
					<div id="principal">
					<div class="titulo"> <h1>CONTÁCTANOS </h1></div>
						<div id= "contacto_lista"> 
							<ul>
								<li>
									<p>Nombre</p>
									<input type="text" name="Nombre">
								</li>
								<li>
									<p>Empresa</p>
									<input type="text" name="Empresa">
								</li>
								<li>
									<p>Correo Electrónico</p>
									<input type="email" name="Correo">
								</li>
							</ul>
						</div>
						<div id="mensaje">
							<p>Mensaje</p>
							<input type="text" name="Mensaje">
							<input type="submit" value="Enviar">
						</div>
					</div>
					<div id="comunidades">
						<ul>
							<li>
								correo@algo.algomas
							</li>

							<li> 
								<a hred="#" title ="@tiwtter">
										<img src="templates/beez_20/images/twitter_icon.png">
								</a>
							</li>

							<li> 
								<a hred="#" title ="facebook">
										<img src="templates/beez_20/images/facebook.png">
								</a>
							</li>
						</ul>
					</div>
				</div>

				<div id="ubicacion">
					<div class="titulo"> <h1>UBICACIÓN </h1></div>
					<div id="mapa">
						<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com.mx/maps?f=q&amp;source=s_q&amp;hl=es&amp;geocode=&amp;q=Universidad+Latina+de+Am%C3%A9rica,+Morelia&amp;aq=1&amp;oq=universidad+la&amp;sll=19.703964,-101.208571&amp;sspn=0.188437,0.316887&amp;ie=UTF8&amp;hq=Universidad+Latina+de+Am%C3%A9rica,+Morelia&amp;t=m&amp;ll=19.697851,-101.235689&amp;spn=0.006295,0.006295&amp;output=embed"></iframe><br /><small><a href="http://maps.google.com.mx/maps?f=q&amp;source=embed&amp;hl=es&amp;geocode=&amp;q=Universidad+Latina+de+Am%C3%A9rica,+Morelia&amp;aq=1&amp;oq=universidad+la&amp;sll=19.703964,-101.208571&amp;sspn=0.188437,0.316887&amp;ie=UTF8&amp;hq=Universidad+Latina+de+Am%C3%A9rica,+Morelia&amp;t=m&amp;ll=19.697851,-101.235689&amp;spn=0.006295,0.006295" style="color:#0000FF;text-align:left">Ver mapa más grande</a></small>
					</div>
					<div id= "direccion"> 
						<P>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</P>
					</div>
				</div>

			<div id="pie">
				<jdoc:include type="modules" name="pie_pagina" />
			</div>

			

			</script>

		</div>

</body>
</html>
