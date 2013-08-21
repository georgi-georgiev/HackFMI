<div>
<?php
if(isset($query))
{
foreach ($query->result() as $row):
if($row->to_user==$this->session->userdata('user_name'))
{
?>
<div style="background: #fff; margin-bottom: 10px; padding: 5px;">
Потребител <?php echo $row->from_user_name; ?> ви изпрати съобщение
<div style="float: right;">
<a href="<?php echo base_url(); ?>messages/view/<?php echo $row->id; ?>">Прочети</a> | 
<a href="<?php echo base_url(); ?>messages/delete/<?php echo $row->id; ?>">Изтрии</a> 
</div>
</div>
<?php

}
else
{
	?>
	Нямате съобщения
	<?php
}
endforeach;
}
?>
<div id="error">
Нямате съобщения
</div>