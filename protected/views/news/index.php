<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>
<?php
/* @var $this NewsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
    'News',
);

$this->menu=array(
    array('label'=>'Create News', 'url'=>array('create')),
    array('label'=>'Manage News', 'url'=>array('admin')),
);
?>

<!-- Berita terini -->
<h3> <?php echo Yii::t('main_data','Recent News') ;?></h3>
<?php 
    foreach ($beritaTerbaru as $berita ) {
        if (count(explode(' ', $berita->news_title)) > 7){
            echo CHtml::link(implode(' ', array_slice(explode(' ', $berita->news_title), 0, 7))."..."."<br />",  array('news/view', 'id'=>$berita->news_id));
        }
        else
            echo CHtml::link($berita->news_title."<br />",  array('news/view', 'id'=>$berita->news_id));
    }
?>

<!-- Acara terini -->
<h3> <?php echo Yii::t('main_data','Recent Event') ;?></h3>
<?php 
    foreach ($acaraTerbaru as $acara ) {
        if (count(explode(' ', $acara->news_title)) > 7){
            echo CHtml::link(implode(' ', array_slice(explode(' ', $acara->news_title), 0, 7))."..."."<br />",  array('news/view', 'id'=>$acara->news_id));
        }
        else
            echo CHtml::link($acara->news_title."<br />",  array('news/view', 'id'=>$acara->news_id));
    }
?>

<!-- Pengumuman terini -->
<h3> <?php echo Yii::t('main_data','Recent Announcement') ;?></h3>
<?php 
    foreach ($pengumumanTerbaru as $pengumuman ) {
        if (count(explode(' ', $pengumuman->news_title)) > 7){
            echo CHtml::link(implode(' ', array_slice(explode(' ', $pengumuman->news_title), 0, 7))."..."."<br />",  array('news/view', 'id'=>$pengumuman->news_id));
        }
        else
            echo CHtml::link($pengumuman->news_title."<br />",  array('news/view', 'id'=>$pengumuman->news_id));
    }
?>

<!-- Acara terini -->
<h3> <?php echo Yii::t('main_data','Recent Publication') ;?></h3>
<?php 
    foreach ($publikasiTerbaru as $publikasi ) {
        if (count(explode(' ', $publikasi->news_title)) > 7){
            echo CHtml::link(implode(' ', array_slice(explode(' ', $publikasi->news_title), 0, 7))."..."."<br />",  array('news/view', 'id'=>$publikasi->news_id));
        }
        else
            echo CHtml::link($publikasi->news_title."<br />",  array('news/view', 'id'=>$publikasi->news_id));
    }
?>


<h1>News</h1>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
)); ?>
