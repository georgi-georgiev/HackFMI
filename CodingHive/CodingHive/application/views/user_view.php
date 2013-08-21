<div id="column-wrapper" class="clearfix">
    <div class="right-column">
        <span> Работи върху </span>
        <?php
        
            foreach($query2->result() as $row2):
            	
        ?>
			<a href="<?php echo base_url(); ?>project/view/<?php echo $row2->id; ?>">
			<div class="project">
				<div class="mini-avatar">
				</div>
				<span> <?php echo $row2->title; ?> </span>
				<div style="clear:right"></div>
			</div>
			</a>
        <?php
        	endforeach;
    	?>
	</div>
<?php
foreach($query->result() as $row):
?>
		<div class="left-column">
			<div class="avatar"></div>
			<span class="tag">Име: </span><span class="info"><?php echo $row->firstname." ".$row->lastname; ?></span></br>
			<span class="tag">E-mail: </span><span class="info"><?php echo $row->email; ?></span></br>
			<span class="tag">Занимания: </span><span class="info"><?php echo $row->occupation; ?></span></br>
			<div style="clear:left"></div>
			<div class="button-holder">
				<?php if($row->username!=$this->session->userdata('user_name')){?>
				<div class="button" id="facebook"></div>
				<div class="button" id="twitter"></div>
				<div class="button" id="linkedin"></div>
				<div class="right-button" id="addto"></div>
				<a href="<?php base_url(); ?>messages/send"><div class="right-button" id="message"></div></a>
				<?php } ?>
			<div style="clear:left"></div>
			</div>
			<div class="breakline"></div>
			<div class="information">
				<span>Описание</span>
				<p><?php echo $row->description; ?></p>
			</div>
		</div>
		
		<div style="clear:left"></div>
		<div class="left-column">
			<div class="information">
				<span>Технологии</span>
				<?php
				if(isset($row->techs)){
				$techs = explode(",", $row->techs); ?>
				<?php foreach ($techs as $tech){ ?>
				<div>
					<div class="technology"><span><?php echo $tech ?></span></div>
					<div class="progressbar">
					<div class="progress" id="differentprogress"></div>
					</div>
				</div>
				<?php
					}
				}
				?>
			</div>
		</div>
<?php
endforeach;
?>
</div>