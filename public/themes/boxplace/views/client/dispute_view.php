<?php
defined('FIR') OR exit();
/**
 * The template for displaying Example Create page
 */
?>
		

	 
	 <!-- ==============================================
	 Dashboard Section
	 =============================================== -->
     <section class="dashboard">
      <div class="container">
	   <div class="row">
		<div class="col-lg-12">
		
         <div class="headline">
		  <h3><?=$this->lang('dispute_conversations_about_this_project')?></h3>
		  <h4><?=e($data['project']['title'])?></h4>
		  <a href="<?=$this->siteUrl()?>/<?=$this->client_url()?>/disputes"><?=$this->lang('go_back')?></a>
		 </div>		
		
		<?php if($data['conversation']["action"] === "0"): ?>
	     <div class="chat-box">
		   <textarea id="md" class="form-control no-border" rows="3" placeholder="Type something..."></textarea>
		  <div class="box-footer clearfix" id="message_btn_<?=e($data['user']['id'])?>">
			<a onclick="post_dispute(<?=e($data['user']['id'])?>, <?=e($data['user']['userid'])?>, <?=e($data['conversation']['id'])?>)" class="kafe-btn kafe-btn-mint"><?=$this->lang('send_message')?></a>
		  </div>
		 </div>	
		<?php endif; ?>	
	    
		 <div id="messages-list<?=e($data['user']['id'])?>">
		    <div id="message-list<?=e($data['user']['id'])?>"></div>
		
		   <?php foreach($data['conversation_reply_pagination'] as $row) { ?>  
			  

			 <div class="proposal-box" id="tr<?=e($row["id"])?>">
			  <div class="proposal-img">
			   <div class="proposal-img-inner">
			 <?php if(e($row["is_admin"]) === "1"): ?>  
				 <a>
				  <img class="img-responsive img-circle" src="<?=$this->siteUrl().'/'.UPLOADS_PATH?>/admin/<?=e($data['admin']['imagelocation'])?>" alt="Profile Picture">
				 </a>
				<h4><?=$this->lang('admin')?></h4>
			 <?php else: ?>  
				<?php foreach($data['users'] as $r1){
				 if($r1['userid'] == $row['user_sending']){ 
				  if($r1['user_type'] == 1):?>
					 <a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/portfolio/<?=e($r1["userid"])?>/<?=e($r1["slug"])?>">
					  <img class="img-responsive img-circle" src="<?=$this->siteUrl().'/'.UPLOADS_PATH?>/admin/users/<?=e($r1['imagelocation'])?>" alt="Profile Picture">
					 </a>
				<h4><?=$this->freelancer_name()?></h4>
				 <?php elseif($r1['user_type'] == 2):?>
					 <a href="<?=$this->siteUrl()?>/<?=$this->clients_url()?>/projects/<?=e($r1["userid"])?>/<?=e($r1["slug"])?>">
					  <img class="img-responsive img-circle" src="<?=$this->siteUrl().'/'.UPLOADS_PATH?>/admin/users/<?=e($r1['imagelocation'])?>" alt="Profile Picture">
					 </a>
				<h4><?=$this->client_name()?></h4>
				 <?php endif; ?>
				<?php } }?> 
			 <?php endif; ?>  
			   </div>
			  </div><!--/ .freelancer-box-img -->	
			  <div class="proposal-details">
			   <div class="proposal-description">
			 <?php if(e($row["is_admin"]) === "1"): ?> 
					<a><h3><?=e($data['admin']['name'])?></h3></a>
			 <?php else: ?> 
			   
				<?php foreach($data['users'] as $r1){
				 if($r1['userid'] == $row['user_sending']){ 
				  if($r1['user_type'] == 1):?>
					<a href="<?=$this->siteUrl()?>/<?=$this->freelancers_url()?>/portfolio/<?=e($r1["userid"])?>/<?=e($r1["slug"])?>">
					<h3 class="<?=($r1["verified"] == '1' ? ' verified' : '')?>"><?=e($r1["name"])?></h3></a>
				 <?php elseif($r1['user_type'] == 2):?>
					<a href="<?=$this->siteUrl()?>/<?=$this->clients_url()?>/projects/<?=e($r1["userid"])?>/<?=e($r1["slug"])?>">
					<h3 class="<?=($r1["verified"] == '1' ? ' verified' : '')?>"><?=e($r1["name"])?></h3></a>
				 <?php endif; ?>
				<?php } }?> 
				
			 <?php endif; ?>  
				
				<?php foreach($data['conversation_reply_timeago'] as $key=>$name){
					if($row['id'] == $key){ ?>
					<h5> <?=e($name)?></h5>
				<?php } } ?>
				
				<p><?=e($row["reply"])?> </p>
				
			   </div>
			  </div><!--/ .freelancer-box-details -->
		
		<?php if($data['conversation']["action"] === "0"): ?>
			   <?php foreach($data['users'] as $r1){
				 if($r1['userid'] == $row['user_sending']){ 
				  if($r1["user_type"] == 2): ?>
				  <div class="proposal-bid">
				   <div class="proposal-bid-inner">
					 <a id="delete_dispute" data-id="<?=e($row["id"])?>" class="kafe-btn kafe-btn-red-small"><i class="fa fa-trash"></i> <?=$this->lang('delete')?></a>
				   </div>
				  </div><!--/ .proposal-bid -->
			   <?php endif; ?>
			  <?php } }?> 
		<?php endif; ?>
			 </div><!--/ .proposal-box -->	
				
			  <?php } ?>	
			
			<?=$data['pagination']?>		
			
         </div>				 
		
		</div><!--/ .col-lg-12 -->
	   </div><!--/ .row -->
		
	  </div><!--/ .container -->
     </section>	  