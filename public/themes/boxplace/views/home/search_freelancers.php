<?php
defined('FIR') OR exit();
/**
 * The template for displaying Home page menu
 */
?>


	 

     <!-- ==============================================
	 Header Section
	 =============================================== -->
	 <header class="how-header" style="background: linear-gradient( rgba(34,34,34,0.6), rgba(34,34,34,0.6) ), url('<?=$this->siteUrl().'/'.UPLOADS_PATH?>/admin/<?=e($this->theme_details('bg_image_two'))?>') no-repeat center center fixed;">
      <div class="container">
       <div class="row">
	   
        <div class="col-lg-8 col-lg-offset-2">
         <div class="post-heading">
		  <h3><?=$this->freelancer_name_plural()?> <?=$this->lang('in_this_category')?> :- <?=e($data["search_freelancers"])?>.</h3>
         </div><!-- /.post-heading -->
        </div><!-- /.col-lg-8 -->
		
       </div><!-- /.row -->
	  </div><!-- /.container -->
     </header><!-- /header --> 
	 
	 
	 <!-- ==============================================
	 Latest Jobs Section
	 =============================================== -->
     <section class="latest-jobs">
      <div class="container">
	  
	   <div class="row">
		<div class="col-lg-12">
		
         <div class="jobs-headline">
		  <h3><?=$this->freelancer_name_plural()?> - (<?=e($data["c_search_freelancers"])?>)</h3>
		 </div>	
		</div><!--/ .col-lg-12 -->
	   </div><!--/ .row -->
	   
		<?php if($data['has_freelancers'] === false): ?> 
		  
		  <div class="prop-info text-center">
		     <img src="<?=$this->siteUrl().'/'.$this->themePath().'/'.$this->theme()?>/assets/img/graphic.png" class="img-responsive" alt="Image" />
			 <h3><?=$this->lang('no_freelancers')?> <?=$this->freelancer_name_plural()?>.</h3>
          </div><!-- /.prop-info -->	
		  
		<?php elseif($data['has_freelancers'] === true): ?> 
		
		   <?php
          /*
            Start with variables to help with row creation;
          */
            $startRow = true;
            $postCounter = 0;
		    $messageList = '';
		    $x = 1;

			foreach($data['freelancers_pagination'] as $row) {
				
				$arc=explode(',',$row["categories"]);
				foreach ($arc as $k => $v) {
				if($data['search_freelancers'] == $v) {     
			 
          
				/*
				  Check whether we need to add the start of a new row.
				  If true, echo a div with the "row" class and set the startRow variable to false 
				  If false, do nothing. 
				*/
				if ($startRow) {
				  echo '<!-- START OF INTERNAL ROW --><div class="row">';
				  $startRow = false;
				}
				/* Add one to the counter because a new post is being added to your page.  */ 
				  $postCounter += 1; 
			?>  

	   
			<div class="col-lg-6"> 
			 <div class="freelancer-box">
			  <div class="freelancer-box-img">
			   <div class="freelancer-box-img-inner">
				 <a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/portfolio/<?=e($row["userid"])?>/<?=e($row["slug"])?>">
				 <img class="img-responsive img-circle" src="<?=$this->siteUrl().'/'.UPLOADS_PATH?>/admin/users/<?=e($row['imagelocation'])?>" alt="Profile Picture"></a>
			   </div>
			  </div><!--/ .freelancer-box-img -->	
			  <div class="freelancer-box-details">
			   <div class="freelancer-box-description">
				<a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/portfolio/<?=e($row["userid"])?>/<?=e($row["slug"])?>">
				<h3 class="<?=($row["verified"] == '1' ? ' verified' : '')?>"><?=e($row["name"])?></h3></a>
				<h4> <?=e($row["title"])?></h4>
				  
				<?php foreach($data['freelancers_ratings'] as $key=>$name){
					if($row['userid'] == $key){ ?>
                    <div class="star-rating" data-rating="<?=$name[1]?>">
					 <?=$name[0]?>
					</div>
				<?php } } ?>
				
				
				<div class="freelancer-box-tags">
				<?php
				 $arr=explode(',',$row["skills"]);
				 $arrr = array_slice($arr,0,2);
				foreach ($arrr as $key => $value) {
				  echo '<span>'. e($value) .' </span> &nbsp;'; 
				}
				?>	
				 +<?php echo count($arr); ?> <?=$this->lang('more')?>
				</div><!--/ .freelancer-box-tags -->
			   </div>
			  </div><!--/ .freelancer-box-details -->
			 </div><!--/ .freelancer-box -->		
			</div><!--/ .col-lg-6 --> 
			
		   <?php
				/*
				Check whether the counter has hit 3 posts.  
				If true, close the "row" div.  Also reset the $startRow variable so that before the next post, a new "row" div is being created. Finally, reset the counter to track the next set of three posts.
				If false, do nothing. 
				*/ 
				if ($postCounter == 2) {
					echo '</div><br/><!-- END OF INTERNAL ROW -->';
					$startRow = true;
					$postCounter = 0;
				}
				
				} }	

			} 
            
            if ($data['is_divisible_by_2'] === false) {
                echo '</div><!-- END ROW -->';
            }
			
			?>	
		
		<?php endif; ?>  	   
	   
	  </div><!--/ .container -->
     </section>		 
 	 