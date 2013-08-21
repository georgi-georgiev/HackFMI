<?php
if(isset($query))
{
foreach($query->result() as $row): ?>
<div class="contentbox">
	<span><a href="userview.html"><b><?php echo $row->from_user_name; ?></b></a> ви предложи да участва в <a href="projectview.html"><b><?php echo $row->project_id; ?></b></a></span>
	<div id="project">
		<div class="avatar"></div>
		<span class="tag">Име: </span><span class="info"><?php echo $row->project_id; ?></span></br>
		<span class="tag">Тип: </span><span class="info">Web Application</span></br>
		<span class="tag">Създаден на: </span><span class="info">12.04.2013</span></br>
		<span class="tag">Създаден от: <?php echo $row->from_user_name; ?></span>
		<div style="clear:left"></div>

		<div class="information">Уникален проект за съи Напишете шаблонен клас Set, който представя множество. Елементите на множеството се записват в масив с динамично заделена големина. Реализирайте голямата четворка за класа. Напишете член функциите:</div>
		<div class="technologies">
			PHP, HTML, CSS, JavaScript
		</div>
		
	</div>
	<div style="clear:right"></div>
	<div id="team">
		<span>Участват</span>
					<a href="userview.html">
	<div class="project">
		<div class="mini-avatar">
		</div>
		<span> <?php echo $row->from_user_name; ?> </span>
		<div style="clear:right"></div>
	</div>
	</a>
	</div>
	<div style="clear:left"></div>
	<div id="actions">
		<div class="clearspace">
		</div>
		<a href="<?php echo base_url(); ?>project/add_user/<?php echo $row->from_user_id; ?>
			/<?php echo $row->project_id; ?>">
		<div id="confirm">
		Потвърди
		</div>
		</a>
		<div id="refuse">
			Откажи
		</div>
	</div>
</div>
<?php
endforeach;
}
?>
<div id="error">
Нямате съобщения
</div>