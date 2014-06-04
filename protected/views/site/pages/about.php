<?php
/* @var $this SiteController 
	 $dataProvider CActiveDataProvider
*/

$this->pageTitle=Yii::app()->name . ' - About';
$this->breadcrumbs=array(
	'About',
);
?>
<h1>About</h1>
<?php 
	// $this->widget('bootstrap.widgets.TbThumbnails', array(
 //    'dataProvider'=>$listDataProvider,
 //    'template'=>"{items}\n{pager}",
 //    'itemView'=>'_thumb',
	// )); 
?>
<!-- <p>This is a "static" page. You may change the content of this page
by updating the file <code><?php echo __FILE__; ?></code>.</p> -->
<div class = "row">
	<li class="col-xs-3 text-center">
		<div class="row">
	    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/annisa.jpeg" alt="" class="img-dev">
		</div>
		<div class="row">
			<ul>
				<li>Nama</li>
				<li>Email</li>
				<li>Institusi</li>
				<li>Position</li>
			</ul>
		</div>
	</li>
	<li class="col-xs-3 text-center">
		<div class="row">
	    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/afour.jpeg" alt="" class="img-dev">
		</div>
		<div class="row">
			<ul>
				<li>Nama</li>
				<li>Email</li>
				<li>Institusi</li>
				<li>Position</li>
			</ul>
		</div>
	</li>
	<li class="col-xs-3 text-center">
		<div class="row">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/ari.jpeg" alt="" class="img-dev">
		</div>
		<div class="row">
			<ul>
				<li>Nama</li>
				<li>Email</li>
				<li>Institusi</li>
				<li>Position</li>
			</ul>
		</div>
	</li>
	<li class="col-xs-3 text-center">
		<div class="row">
	    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/arry.jpg" alt="" class="img-dev">
		</div>
		<div class="row">
			<ul>
				<li>Nama</li>
				<li>Email</li>
				<li>Institusi</li>
				<li>Position</li>
			</ul>
		</div>
	</li>
	<li class="col-xs-3 text-center">
		<div class="row">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/heru.jpg" alt="" class="img-dev">
		</div>
		<div class="row">
			<ul>
				<li>Nama</li>
				<li>Email</li>
				<li>Institusi</li>
				<li>Position</li>
			</ul>
		</div>
	</li>
	<li class="col-xs-3 text-center">
		<div class="row">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/hilman.jpg" alt="" class="img-dev">
		</div>
		<div class="row">
			<ul>
				<li>Nama</li>
				<li>Email</li>
				<li>Institusi</li>
				<li>Position</li>
			</ul>
		</div>
	</li>
</div><!--row-->