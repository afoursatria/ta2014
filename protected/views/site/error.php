<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<h2>Error <?php echo $code; ?></h2>

<div class="error">
	<div class="text-center">
		<h1>woops</h1>
		<?php echo CHtml::encode($message); ?>
	</div>
</div>