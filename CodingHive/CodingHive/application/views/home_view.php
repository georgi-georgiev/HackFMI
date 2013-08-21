<div id="list" class="clearfix">
    <div class='searchWrapper'>
        <div class='searchFor searchCriteria projectCriteria'>
            <div class="searchForLabel">
                <img class='searchDropdownArrow' src='<?php echo base_url(); ?>/images/search_dropdown_arrow.png'/>
            </div>

        </div>
    </div>
    <table id="allProjectsTable">
        <thead>
        <tr>
            <th class="projectName">Информация</th>
            <th class="projectType">Тип</th>
            <th class="projectTechs">Технологии</th>
            <th class="projectPeopleSkills">Статус</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if(isset($query))
        {
					foreach ($query->result() as $row):
        ?>
        <tr>
            <td>
                <a class="projectTitle" href="<?php echo base_url();?>project/view/<?php echo $row->id; ?>"><?php echo $row->title; ?></a>
                <p class = "projectDescription"><?php echo $row->description; ?>
                </p>
                <p class = "projectAuthor">От:
                    <a class="projectAuthor" href="<?php echo base_url();?>user/view/<?php echo $row->author; ?>"><?php echo $row->author; ?></a>
                    <span class="date"><?php echo $row->date; ?></span>
                </p>
            </td>
            <td>
                <p><?php echo $row->category; ?></p>
            </td>
            <td>
                <p><?php echo $row->techs; ?></p>
            </td>
            <td>
                <p><?php if($row->status==0) {echo "В Процес на разработка";}else{echo "Завършен";} ?></p>
            </td>

        </tr>
        <?php
			endforeach;
        }
		?>
        </tbody>
    </table>
</div>