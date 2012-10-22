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

$doc->addScript($this->baseurl.'/templates/'.$this->template.'/javascript/jquery-1.8.2.min.js', 'text/javascript');
$doc->addScript($this->baseurl.'/templates/'.$this->template.'/javascript/jquery.cycle.all.js', 'text/javascript');
$doc->addScript($this->baseurl.'/templates/'.$this->template.'/javascript/jquery.easing.1.3.js', 'text/javascript');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
<jdoc:include type="head" />
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script type="text/javascript" src="jquery.cycle.all.js"></script>-->
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
	
</script>

</head>

<body>
    
    	<div id="contenido">
    		<div id="navegacion">
				<jdoc:include type="modules" name="navegacion" />
			</div>
			<div id= "cabecera">

				<div id="logo">
					<jdoc:include type="modules" name="logo_imagen" />
				</div>			

			</div>
			<div id="contenedor">
				<div id="nuestros_clientes">
					<div class="titulo"> <h1>NUESTROS CLIENTES</h1> </div>
					<div id="clientes">
						<jdoc:include type="modules" name="slider_clientes" />
					</div>
				</div>
				<div id="quienes_somos">
					<div class="titulo"> <h1>QUIENES SOMOS </h1></div>
					<div id= "descripcion"> 
						<jdoc:include type="modules" name="descripcion_quienes" />
					</div>

					<div id="imagen_descripcion"> 
						<jdoc:include type="modules" name="descripcion_imagen" />
					</div>
				</div>

				<div id="servicios">
					<div class="titulo"> <h1>SERVICIOS </h1></div>
					<div id= "lista"> 
						<jdoc:include type="modules" name="lista_servicios" />
					</div>

					<div id="imagen_servicios"> 
						<jdoc:include type="modules" name="servicios_imagen" />
					</div>
				</div>

				<div id="contacto">
					<div id="principal">
					<div class="titulo"> <h1>CONTÁCTANOS </h1></div>
						<div id= "contacto_lista"> 
							<jdoc:include type="modules" name="contacto_lista" />
						</div>
						<div id="mensaje">
							<jdoc:include type="modules" name="mensaje" />
						</div>
					</div>
					<div id="comunidades">
						<jdoc:include type="modules" name="comunidades" />
					</div>
				</div>

				<div id="ubicacion">
					<div class="titulo"> <h1>UBICACIÓN </h1></div>
					<div id="mapa">
						<jdoc:include type="modules" name="mapa" />
					</div>
					<div id= "direccion"> 
						<jdoc:include type="modules" name="ldireccion" />
					</div>
				</div>

			<div id="pie">
				<jdoc:include type="modules" name="pie_pagina" />
			</div>

		</div>

		<script type="text/javascript">
		$(document).ready(function() {
			//inicializas el primer slider
			$('.custom').cycle();

			//inicializas el segundo slider, le das algunos efectos
			//$('#identificador2 .contenedor').cycle({ 
			//    fx:     'scrollHorz', 
			//    delay:  -4000 });
		});
	</script>

</body>
</html>
