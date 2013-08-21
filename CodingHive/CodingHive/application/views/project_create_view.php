<?php $this->load->helper('date'); ?>
<div class="register">
 <form class="registerProjectResultForm" action="<?php echo base_url(); ?>project/add" method="POST">
  <div class="block" style="display:block">
    <ul class="steps">
      <li class="line first done">&nbsp;</li>
      <li class="step active">1</li>
      <li class="line">&nbsp;<span>Заглавие</span></li>
      <li class="step">2</li>
      <li class="line">&nbsp;<span>Тип</span></li>
      <li class="step">3</li>
      <li class="line">&nbsp;<span>Описание</span></li>
      <li class="step">4</li>
      <li class="line last">&nbsp;<span>Технологии</span></li>
    </ul>
    <div style="padding:20px; clear:both"></div>
   <div  class="form gnd">
    <label>Заглавие</label>
    <input type="text" class="title" name="title" />
  

   <input type="button" class="button gradient" value="next" onclick="register_next_step (this);" />
    </div>
    
    
   
  </div>

  <div class="block">
    <ul class="steps">
      <li class="line first done">&nbsp;</li>
      <li class="step done">1</li>
      <li class="line done">&nbsp;<span>Заглавие</span></li>
      <li class="step active">2</li>
      <li class="line ">&nbsp;<span>Тип</span></li>
      <li class="step">3</li>
      <li class="line">&nbsp;<span>Описание</span></li>
      <li class="step">4</li>
      <li class="line last">&nbsp;<span>Технологии</span></li>
    </ul>

    <div style="padding:20px; clear:both"></div>

     <div  class="form gnd">
      <label for='category'>Категория</label>
      <select id="category" name="category">
        <option value="Web application">Web application</option>
        <option value="Desctop application">Desktop application</option>
        <option value="Mobile application">Mobile application</option>
      </select>
    
   <input type="button" class="button gradient" value="next" onclick="register_next_step (this);" />
    </div>

  </div>
    
  <div class="block">
    <ul class="steps">
      <li class="line first done">&nbsp;</li>
      <li class="step done">1</li>
      <li class="line done">&nbsp;<span>Заглавие</span></li>
      <li class="step done">2</li>
      <li class="line done">&nbsp;<span>Тип</span></li>
      <li class="step active">3</li>
      <li class="line ">&nbsp;<span>Описание</span></li>
      <li class="step">4</li>
      <li class="line last">&nbsp;<span>Технологии</span></li>
    </ul>

    <div style="padding:20px; clear:both"></div>

     <div  class="form gnd">
    <label>Описание</label>
    <textarea placeholder="Описание" id="description" name="description" class="description"></textarea>
    
     <label></label>
   <input type="button" class="button gradient" value="next" onclick="register_next_step (this);" />
    </div>

  </div>


  <div class="block">
    <ul class="steps">
      <li class="line first done">&nbsp;</li>
        <li class="step done">1</li>
        <li class="line done">&nbsp;<span>Заглавие</span></li>
        <li class="step done">2</li>
        <li class="line done">&nbsp;<span>Тип</span></li>
        <li class="step done">3</li>
        <li class="line done">&nbsp;<span>Описание</span></li>
        <li class="step active">4</li>
        <li class="line done last">&nbsp;<span>Технологии</span></li>
    </ul>

    <div style="padding:20px; clear:both"></div>
    <div  class="form gnd">
        <textarea name="techs"></textarea>
        <br />
        <input class="submit" type="submit" value="Създай" />
    </div>

  </div>
  <input type="text" id="author" name="author" class="author" value="<?php echo $this->session->userdata('user_name'); ?>" />
   <input type="text" id="date" name="date" class="date" value='<?php echo mdate("%Y-%m-%d"); ?>' />
   
   </form>

   <!--  <?php $this->load->helper('date'); ?> -->
<!-- <form class="registerProjectResultForm" action="<?php echo base_url(); ?>project/add" method="POST">
    <input type="text"  placeholder="Заглавие" id="title" name="title" class="title" />
    <br />
    <textarea placeholder="Описание" id="description" name="description" class="description"></textarea>
    <br />

    <input type="text" id="category" name="category" class="category" />
    <br />
    <textarea placeholder="Технологии" id="techs" name="techs" class="techs"></textarea>
    <br />
    <input type="text" id="author" name="author" class="author" value="<?php echo $this->session->userdata('user_name'); ?>" />
    <br />
    <input type="text" id="date" name="date" class="date" value="<?php echo mdate("%Y-%m-%d"); ?>" />
    <br />
    <input class="submit" type="submit" value="Създай" />
</form> -->
</div>