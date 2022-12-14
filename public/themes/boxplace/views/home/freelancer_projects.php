<?php
defined('FIR') OR exit();
/**
 * The template for displaying Home page menu
 */
?>

	 
	 <!-- ==============================================
	 Header Section
	 =============================================== -->	
     <section class="profile-banner" style="background: linear-gradient( rgba(34,34,34,0.6), rgba(34,34,34,0.6) ), url('<?=$this->siteUrl().'/'.UPLOADS_PATH?>/admin/users/<?=e($data['user']['bg_imagelocation'])?>') no-repeat center center fixed;">
      <div class="container">
       <div class="banner-content text-center">
	    <a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/portfolio/<?=e($data['user']["userid"])?>/<?=e($data['user']["slug"])?>">
		  <img src="<?=$this->siteUrl().'/'.UPLOADS_PATH?>/admin/users/<?=e($data['user']['imagelocation'])?>" class="img-responsive img-circle"/>
		</a>
        <h1 class="<?=($data['user']["verified"] == '1' ? ' verified' : '')?>"><?=e($data['user']["name"])?></h1>
        <h2><?=e($data['user']["title"])?></h2>
        <h3><i class="fa fa-map-marker"></i> <?=e($data['user']["country"])?></h3>
		<div class="button-wrapper">
          <a class="kafe-btn kafe-btn-red" href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/invite/<?=e($data['user']["userid"])?>/<?=e($data['user']["slug"])?>">
		  <i class="fa fa-envelope-o"></i> <?=$this->lang('invite_to_project')?> </a>
		</div>  
       </div><!--/. banner-content -->
      </div><!-- /.container -->
     </section>

	 <!-- ==============================================
	 Navbar-box Section
	 =============================================== -->
     <section class="navbar-box text-center">
      <ul id="">
       <li><a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/portfolio/<?=e($data['user']["userid"])?>/<?=e($data['user']["slug"])?>"> <?=$this->lang('portfolio')?>  
	     <em class="hidden-xs hidden-sm">(<?=e($data['total_portfolio'])?>)</em></a></li>
       <li><a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/about/<?=e($data['user']["userid"])?>/<?=e($data['user']["slug"])?>"> <?=$this->lang('about')?> </a></li>
       <li class="active"><a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/projects/<?=e($data['user']["userid"])?>/<?=e($data['user']["slug"])?>"><?=$this->lang('projects')?> 
	     <em class="hidden-xs hidden-sm">(<?=e($data['total_projects'])?>)</em></a></li>
       <li><a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/ratings/<?=e($data['user']["userid"])?>/<?=e($data['user']["slug"])?>"><?=$this->lang('ratings')?> 
	     <em class="hidden-xs hidden-sm">(<?=e($data['total_ratings'])?>)</em></a></li>
      </ul>
     </section>		 
	 
	 
	 
	 <!-- ==============================================
	 Dashboard Section
	 =============================================== -->
     <section class="freelancer-content">
      <div class="container">
	  
	   <div class="row">
		<div class="col-lg-12">
		
         <div class="headline">
		  <h3><?=$this->lang('projects')?> :- (<?=e($data['total_projects'])?>)</h3>
		 </div>	
		</div><!--/ .col-lg-12 -->
	   </div><!--/ .row -->
	   
       <div class="row">
	    <div class="col-lg-12">
		 
		<?php if($data['has_projects'] === false): ?> 
		  
		  <div class="prop-info text-center">
		     <img src="<?=$this->siteUrl().'/'.$this->themePath().'/'.$this->theme()?>/assets/img/graphic.png" class="img-responsive" alt="Image" />
			 <h3><?=$this->lang('no_projects_display')?>.</h3>
          </div><!-- /.prop-info -->	
		  
		<?php elseif($data['has_projects'] === true): ?> 
		
		   <?php
			foreach($data['freelancer_projects'] as $row) { 
			?>  
			  
			  
			 <a href="<?=$this->siteUrl()?>/project/<?=e($row["projectid"])?>/<?=e($row["slug"])?>" class="job-box">
			  <div class="job-box-details">
			   <div class="job-box-description">
				<h3 class="job-box-title"><?=e($row["title"])?></h3>
				<ul class="job-box-icons">
				 <li><i class="fe fe-difference"></i><?=e($row["category"])?> </li>
				<?php foreach($data['projects_timeago'] as $key=>$name){
					if($row['projectid'] == $key){ ?>
					 <li><i class="fe fe-clock"></i> <?=e($name)?></li>
				<?php } } ?>
				<?php foreach($data['projects_proposals'] as $key=>$name){
					if($row['projectid'] == $key){ ?>
					 <li><i class="fe fe-user-plus"></i> <?=e($name)?> <?=$this->lang('proposals')?></li>
				<?php } } ?>
				</ul>
				<div class="job-box-tags">
					<?php
					 $arr=explode(',',$row["skills"]);
					 $arrr = array_slice($arr,0,2);
					foreach ($arrr as $key => $value) {
					  echo '<span>'. e($value) .' </span> &nbsp;'; 
					}
					?>	
					 +<?php echo count($arr); ?> <?=$this->lang('more')?>
				</div>
			   </div>
			  </div><!--/ .job-box-details -->
			  <div class="job-box-bid">
			   <div class="job-box-bid-inner">
				<div class="job-box-offers">
				 <h4><?=e($this->currency)?><?=e($row["budget"])?></h4>
				 <span><?=$this->lang('budget')?></span>
				</div>
				<?php if(e($row["complete"]) === "1"): ?>
			      <h5><?=$this->lang('completed')?></h5>
				<?php elseif(e($row["complete"]) === "0"): ?>
			      <h5><?=$this->lang('currently_working_on')?></h5>
				<?php endif; ?>		
			   </div>
			  </div><!--/ .job-box-bid -->	
			 </a><!--/ .job-box -->	
			
		   <?php } ?>
		
			  
		<?php endif; ?>  
		

		
		</div>
	   
       </div><!--/. row -->
		
	  </div><!--/ .container -->
     </section>	 	 