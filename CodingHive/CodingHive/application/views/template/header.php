<html>
<head>
<meta charset="utf-8" />
    <title>CodingHive</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>styles/main.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>styles/normalize.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>styles/style.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>styles/home.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>styles/userview.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>styles/messageview.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>styles/registerProject.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>styles/projectview.css" />


    <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/DataTables/media/css/demo_table.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/DataTables/media/css/jquery.dataTables.css" />

    <script type="text/javascript" src="<?php echo base_url();?>scripts/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>scripts/jquery-ui-1.8.17.custom.min.js"></script>
    <script src="<?php echo base_url(); ?>scripts/jquery.blockUI.js"></script>
    <script src="<?php echo base_url(); ?>scripts/block.js"></script>
    <script src="<?php echo base_url(); ?>scripts/settings.js"></script>
    <script src="<?php echo base_url(); ?>scripts/projectsSearch.js"></script>
    <script src="<?php echo base_url(); ?>scripts/allProjects.js"></script>
    <script src="<?php echo base_url(); ?>scripts/selected-link.js"></script>
    <script src="<?php echo base_url(); ?>plugins/DataTables/media/js/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>scripts/registerProject.js"></script>

</head>
<body>
<div id="wrapper">
    <header id="myheader" class="clearfix">
        <a id="small-logo" href="<?php echo base_url(); ?>home"><img src="<?php echo base_url(); ?>images/small-logo.png" alt="CodingHive logo" width="273" height="133" /></a>
                <nav>
                    <ul id="menu" >
                            <li><a href="<?php echo base_url(); ?>home" <?php if($content=="home_view"){ echo "class=\"selected\"";} ?>>Начало</a></li>
                            <li><a href="<?php echo base_url(); ?>project"<?php if($content=="my_projects_view"){ echo "class=\"selected\"";}?>>Мои Проекти</a></li>
                            <li><a href="<?php echo base_url(); ?>messages" <?php if($content=="messages_view"){ echo "class=\"selected\"";}?>>Съобщения</a></li>
                                <a href="#" id="showSettings" ><?php echo $this->session->userdata('user_name'); ?></a>
                    </ul>
                    <div class="clearfix">&nbsp;</div>
                    <ul id="settings">
                        <li><a href="<?php echo base_url(); ?>user/view/<?php echo $this->session->userdata('user_name'); ?>">Профил</a></li>
                        <li><a href="<?php echo base_url(); ?>user/logout">Изход</a></li>
                    </ul>
                </nav>
    </header>
    <div id="content-wrapper">