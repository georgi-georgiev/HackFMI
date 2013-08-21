<div id="column-wrapper" class="clearfix">
    <div class="right-column">
        <span> Работят </span>
            <?php
            foreach($query2->result() as $row2):
            ?>
            <a href="<?php echo base_url(); ?>user/view/<?php echo $row2->id; ?>">
            <div class="project">
                <div class="mini-avatar">
                </div>
                <span> <?php echo $row2->username; ?> </span>
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
            <span class="tag">Име: </span><span class="info"><?php echo $row->title; ?></span></br>
            <span class="tag">Тип: </span><span class="info"><?php echo $row->category; ?></span></br>
            <span class="tag">Създаден на: </span><span class="info"><?php echo $row->date; ?></span></br>
            <span class="tag">Създаден от: <?php echo $row->author; ?></span>
            <?php if($row->author!=$this->session->userdata('user_name')){ ?>
            <form id="apply" class="clearfix" action="<?php echo base_url(); ?>messages/send" method="POST">
                <input type="hidden" name="to_user" value="<?php echo $row->author; ?>" /><br />
                <input type="hidden" name="from_user_id" value="<?php echo $this->session->userdata('user_id'); ?>" /><br />
                <input type="hidden" name="from_user_name" value="<?php echo $this->session->userdata('user_name'); ?>" /><br />
                <input type="hidden" name="project_id" value="<?php echo $row->id; ?>" />
                <input type="submit" name="submit" value="Заяви участие в проект" />
            </form>
            <div style="clear:right"></div>
            <?php } ?>
            <div style="clear:left"></div>
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
                <p><?php echo $row->techs; ?></p>
            </div>
        </div>

<?php
endforeach;
?>
</div>