<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<!-- Favicon-->
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico" />
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link href="http://fonts.googleapis.com/css?family=Source+Sans Pro:400,400|News+Cycle:400,400|Fauna+One:400" rel="stylesheet" type="text/css">
  	<link rel="stylesheet" href="css/standardize.css">
  	<link rel="stylesheet" href="css/beranda-grid.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body class="body beranda clearfix">

<?php 
    $this->widget('application.components.LangBox');
?>
<div id="page">

	<div id="header" class="clearfix">
		<img class="image image-10" src = "<?php echo Yii::app()->request->baseUrl; ?>/images/makara-ui-farmasi.png">
		<div id="logo"><p class="web-title"><?php echo Yii::t('main_layout',Yii::app()->name); ?></p></div>
	
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
				
				// array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>Yii::t('main_layout', 'Logout').' ('.Yii::app()->user->id.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	<!-- mainmenu -->
	</div><!-- header -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
	<div class="container container-3 clearfix">
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
