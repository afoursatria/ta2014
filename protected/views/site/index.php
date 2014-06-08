<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>
<?php
/* @var $this SiteController */

$this->pageTitle=Yii::t('main_layout', 	Yii::app()->name);
?>


<div class = "row">
    <div class="col-xs-3">
        <div class="spesies clearfix">
            <div class="element element-10"></div>
            <p class="text _text text-72">5 Spesies Paling Sering Dicari&nbsp;</p>
            <div class="element element-12"></div>
            <ul class="top-search">
                <?php 
                    foreach ($topSpecies as $species ) {
                        echo "<li class='top-list'>".($species->spe_speciesname)."<br /></li>";
                       // echo($species->spe_viewed_count."<br />");
                    }
                ?>
            </ul>
            <!-- <div class="element element-12"></div>
            <p class="text _text text-79">Zephyranthes Tubispatha</p>
            <div class="element element-13"></div>
            <p class="text _text text-85">Cloxinia Maculata</p>
            <div class="element element-14"></div>
            <p class="text _text text-91">Cloxinia Maculata</p>
            <div class="element element-15"></div>
            <p class="text _text text-96">Cloxinia Maculata</p>
            <div class="element element-17"></div>
            <p class="text _text text-99">Cloxinia Maculata</p>
            <div class="element element-18"></div> -->
        </div> <!--spesies-->
        <!--senyawa paling dicari-->
        <div class="senyawa clearfix">
                <div class="element element-19"></div>
                <p class="text _text text-112">5 Senyawa Paling Sering Dicari&nbsp;</p>
                <div class="element element-20"></div>
                 <ul class="top-search">
                      <?php 
                          foreach ($topCompound as $compound ) {
                              echo "<li class='top-list'>".($compound->con_contentname)."<br /></li>";
                          }
                      ?>
                </ul>
                <!-- <p class="text _text text-118">Zephyranthes Tubispatha</p>
                <div class="element element-23"></div>
                <p class="text _text text-121">Cloxinia Maculata</p>
                <div class="element element-25"></div>
                <p class="text _text text-125">Cloxinia Maculata</p>
                <div class="element element-27"></div>
                <p class="text _text text-130">Cloxinia Maculata</p>
                <div class="element element-30"></div>
                <p class="text _text text-133">Cloxinia Maculata</p>
                <div class="element element-33"></div> -->
        </div><!--senyawa-->
    </div><!--col-xs-4-->
    <div class = "col-xs-9">
        <div id = "search-field">
      <!--     <?php echo CHtml::link(Yii::t('main_data','Species'), array('species/search'))?>
<br />
<?php echo CHtml::link(Yii::t('main_data','Compound'), array('contents/search'))?>
<br />
<?php echo CHtml::link(Yii::t('main_data','Local Name'), array('localname/search'))?>
<br />
<?php echo CHtml::link(Yii::t('main_data','Alias Name'), array('aliases/search'))?>
<br />
<?php echo CHtml::link(Yii::t('main_data','Virtue'), array('Virtue/search'))?>
<br />
<br /> -->
       <?php 
    CHtml::beginForm(CHtml::normalizeUrl(array('site/index')), 'get', array('id'=>'filter-form'));
    echo CHtml::textField('speNameKey', (isset($_GET['speNameKey'])) ? $_GET['speNameKey'] : '', array('id'=>'speNameKey'));
    // echo CHtml::submitButton('Search', array('name'=>'','id'=>'green','class'=>'button','url'=>('species/search')));
    ?>
      <?php echo CHtml::link(Yii::t('main_data','Search'), array('species/search')); ?>
    <?php
    CHtml::endForm();
?>
</div>
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/1.jpg">
      <div class="carousel-caption">
        ...
      </div>
    </div>
     <div class="item">
      <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/2.jpg">
      <div class="carousel-caption">
        ...
      </div>
    </div>
     <div class="item">
      <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/3.jpg">
      <div class="carousel-caption">
        ...
      </div>
    </div>
    ...
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>
 
        <?php 
        // $this->widget('zii.widgets.CListView', array(
        // 'dataProvider'=>$dataProvider,
        // 'itemView'=>'//species/_view',
        // 'id'=> 'specieslistview',
        // )); 
?>
    </div>
</div><!--row-->

