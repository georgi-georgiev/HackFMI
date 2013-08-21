<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8" />
	<title>CodingHive</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>styles/main.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>styles/normalize.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>styles/intro.css" />
	
	<script type="text/javascript" src="<?php echo base_url();?>scripts/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>scripts/jquery-ui-1.8.17.custom.min.js"></script>
        
	<script src="<?php echo base_url(); ?>scripts/minimizer.js"></script>
	<script src="<?php echo base_url(); ?>scripts/jquery.blockUI.js"></script>
	<script src="<?php echo base_url(); ?>scripts/block.js"></script>
</head>
<body>
	<div id="wrapper">
		<a id="biglogo" href="<?php echo base_url(); ?>intro"><img src="<?php echo base_url(); ?>images/codinghive-biglogo.png" alt="CodingHive logo" width="514" height="250" /></a>
		<h1 class="intro-heading">Какво е <span class="coding-hive">CodingHive</span> ?</h1>
		<p class="intro-text">
			Внимавайте вие, читатели и слушатели, роде български, които обичате и имате присърце своя род и своето българско отечество и желаете да разберете и знаете известното за своя български род и за ващите бащи, прадеди и царе, патриарси и светии как изпърво са живели и прекарвали. За вас е потребно и полезно да знаете известното за делата на вашите бащи, както знаят всички други племена и народи своя род и език, имат история и всеки грамотен от тях знае, разказва и се гордее със своя род и език.
		</p>
                
                    <?php
                    if(validation_errors() != null)
                    {
                    ?>
                        <div id="errors">
                        <?php echo validation_errors(); ?>
                        </div>
                    <?php
                    }
                    
                    if(isset($error))
                    {
                    ?>
                        <div id="errors">
                        <?php echo $error; ?>
                        </div>
                    <?php
                    }
                    ?>
		<div class="clearfix">
			<a id="register-button" href="#"></a>
			<a id="login-button" href="#"></a>
		</div>
                    
		<div id="register-form">
                    <form action="<?php echo base_url(); ?>user/registration" method="POST">
                            <input type="text" name="username" placeholder="Потребител" id="username" />
                            <span id="usr_verify" class="verify"></span>
                            <br />
                            <input type="password" placeholder="Парола" name="password" id="password" />
                            <span id="password_verify" class="verify"></span>
                            <br />
                            <input type="password" placeholder="Парола отново" name="passwordCorrect" id="passwordCorrect" />
                            <span id="passwordCorrect_verify" class="verify"></span>
                            <br />
                            <input type="text" placeholder="Емайл" name="email" id="email" />
                            <span id="email_verify" class="verify"></span>
                            <br />
                            <input type="submit" value=" " />
                    </form>
		</div>

		<div id="login-form">
			<form action="<?php echo base_url(); ?>user/login" method="POST">
				<input type="text" placeholder="Потребител" name="username" id="username" />
				<br />
				<input type="password" placeholder="Парола" name="password" id="password" />
				<br />
				<div id="submit-bg">
					<input type="submit" value=" " />
				</div>
			</form>
		</div>

	</div>
</body>
</html>