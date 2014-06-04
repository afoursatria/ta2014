<?php
/* @var $this SiteController */

$this->pageTitle=Yii::t('main_layout', 	Yii::app()->name);
?>

<h3> Top 5 Species </h3>
<?php 
    foreach ($topSpecies as $species ) {
        echo($species->spe_speciesname)."<br />";
        // echo($species->spe_viewed_count."<br />");
    }
?>

<h3> <?php echo Yii::t('main_data','Top 5 Compound'); ?></h3>
<?php 
    foreach ($topCompound as $compound ) {
        echo($compound->con_contentname)."<br />";
    }
?>

<?php echo Yii::t('main_data', 'Browse Search Category')?>
<br />

<?php echo CHtml::link(Yii::t('main_data','Species'), array('species/search'))?>
<br />
<?php echo CHtml::link(Yii::t('main_data','Compound'), array('contents/search'))?>
<br />
<?php echo CHtml::link(Yii::t('main_data','Local Name'), array('localname/search'))?>
<br />
<?php echo CHtml::link(Yii::t('main_data','Alias Name'), array('aliases/search'))?>
<br />
<?php echo CHtml::link(Yii::t('main_data','Virtue'), array('Virtue/search'))?>
<br />
<br />

<?php
	if(!Yii::app()->user->isGuest)
		echo Yii::t('main_data','You are logged in as ') . CHtml::link(Yii::app()->user->id, array('user/profile/', 'id'=>Yii::app()->user->getState("no")));
	else
		echo CHtml::link(Yii::t('main_layout','Login'), array('login'));
?> 
<br />
<?php 
	if(Yii::app()->user->getState("role") == null)
	echo CHtml::link(Yii::t('user','Register'), array('register')); ?>
<br />

<?php 
  if(Yii::app()->user->getState("role") == null)
  echo CHtml::link(Yii::t('user','Forget Password'), array('resetPassword')); ?>
<br />