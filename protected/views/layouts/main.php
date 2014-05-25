<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<!-- Favicon-->
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico" />
	
	<!-- blueprint CSS framework -->
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" /> -->
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" /> -->
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />-->
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" /> -->
	<!-- Register CSS-->
	<!-- <link rel="stylesheet" href="css/standardize.css"> -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" />
	<!-- <link rel="stylesheet" href="css/beranda-grid.css"> -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css" />
	<!-- Register JS -->
	<script type="text/javascript" src = "<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src = "<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
	<link rel="script" type="text/js" href=" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body class="body beranda clearfix">
	<div id="page">
		<div id="header" class="clearfix">
			<div id ="topside-nav">
				<div id = "user-stuff">
					<?php
					if(!Yii::app()->user->isGuest)
						echo Yii::t('main_data','You are logged in as ') . CHtml::link(Yii::app()->user->id, array('user/profile/', 'id'=>Yii::app()->user->getState("no")));
					else
						echo CHtml::link(Yii::t('main_layout','Login'), array('login'));
					?> 
					<?php 
					if(Yii::app()->user->getState("role") == null)
						echo CHtml::link(Yii::t('user','Register'), array('register')); ?>
				</div><!--user staff-->
				<!-- <p id ="p-bahasa">Pilih bahasa: </p> -->
				<?php 
					//$this->widget('application.components.LangBox');
				?>
				<?php echo CHtml::form('','post',array('id'=>'formId')); ?>
					<?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
						'htmlOptions' => array('select' => '$currentlang','id'=>'_lang'),
					'type'=>'', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
					'buttons'=>array(
					    array('label'=>'Change Language', 
					    	'encodeLabel'=>false,
					    	'items'=>array(
					        array('label'=> CHtml::image('images/u88.png','ba',array("width"=>"20px" ,"height"=>"15px")).' English', 'url'=>'#'),
					        '---',
					        array('label'=> CHtml::image('images/u86.png','ba',array("width"=>"20px" ,"height"=>"15px")).' Bahasa', 'url'=>'#'),
					    )),
					),
					)); 
					?> 
				<?php echo CHtml::endForm(); ?> 
			</div> <!--topside-nav-->
			
			<img class="image image-10" src = "<?php echo Yii::app()->request->baseUrl; ?>/images/makara-ui-farmasi.png">
			<p class="web-title"><?php echo Yii::t('main_layout',Yii::app()->name); ?></p>
			<?php $this->widget('zii.widgets.CMenu',array(
				'htmlOptions'=>array('id'=>'mainmenu'),
				'submenuHtmlOptions'=>array('class'=>'p'),
				'items'=>array(
					array('label'=>Yii::t('main_layout', 'Home'), 'url'=>array('/site/index'),'itemCssClass'=>'text text-40'),
					array('label'=>Yii::t('main_layout', 'Insert Data'), 'url'=>array('/user/insertData'), 'visible'=>!Yii::app()->user->isGuest), 
					array('label'=>Yii::t('main_layout', 'User Management'), 'url'=>array('/user/admin'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->getState("role")==1), 
				// array('label'=>'List of Species', 'url'=>array('/species/index')),
				// array('label'=>'List of Compound', 'url'=>array('/contents/index')),
					array('label'=>Yii::t('main_layout', 'News & Event'), 'url'=>array('/news/index')),
					array('label'=>'FAQs', 'url'=>array('/faqs/')),
					array('label'=>Yii::t('main_layout', 'Contact'), 'url'=>array('/site/contact')),	
					array('label'=>Yii::t('main_layout', 'About'), 'url'=>array('/site/page','view'=>'about')),	
				// array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
					array('label'=>Yii::t('main_layout', 'Logout').' ('.Yii::app()->user->id.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
					),
					)
				); 
			?>
			<!-- mainmenu -->
		</div><!-- header -->
		
		<div class="container container-3 clearfix">
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
			)); ?><!-- breadcrumbs -->
		<?php endif?>
			<?php echo $content; ?>
		
		</div>
		<div class="clear"></div>
		<div id="footer">
			Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
			All Rights Reserved.<br/>
			<?php echo Yii::powered(); ?>
		</div><!-- footer -->
	</div><!-- page -->
</body>
</html>
