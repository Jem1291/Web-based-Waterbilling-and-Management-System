<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SRWASA Management</title>
    <link rel="stylesheet" href="<?= base_url() ?>/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url() ?>/css/style.css" /> 
    <link href="sticky-footer-navbar.css" rel="stylesheet">
</head>
<style type="text/css">

	*{
		margin: 0px;
		padding: 0px;
		box-sizing: border-box;
		font-family: arial;

	}
	#box
	{
		height: 80vh; 
		width: 70%; 
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%,-50%);
		text-align: center;
		display: inline-flex;
		box-shadow: 6px 6px 52px 4px rgba(4,88,192,1);
		-webkit-box-shadow: 6px 6px 52px 4px rgba(4,88,192,1);
		-moz-box-shadow: 6px 6px 52px 4px rgba(4,88,192,1);
	}

	#login_box
	{
		border: 1px;
		width: 465px;
		height: 600px;
		text-align: center;
		font-weight: bold;
	}

	#username
	{
		height: 40px;
		width: 300px;
		font-size: 14px;
		border: none;
		
	}

	#password
	{
		height: 40px;
		width: 300px;
		font-size: 14px;
		border: none;
		
	}

	#log
	{
		padding-left: 20px;
		font-size: 40px;
		color: white;
		text-align: left;
	}

	#log1
	{
		
		font-size: 20px;
		text-align: left;
		padding-left: 20px;
		text-align: center;
	}


	#button
	{
		background-color: #0458C0; 
		border-color: #ffff;
		color: white;
		width: 120px;
		height: 50px;
		border-radius: 25px;
		font-weight: bold;	
		margin-left: 200px;

	}
	#button1
	{
		background-color: #0458C0; 
		border-color: #ffff;
		color: white;
		width: 120px;
		height: 50px;
		border-radius: 25px;
		font-weight: bold;	
		margin-left: 0px;

	}
	.bi{
		color: blue;
	}

	
</style>

<body style="background-color: white">
	<main>
	<?= form_open('login')?>
	<?php if($this->session->flashdata('logged_in_failed')) :?>
            <?= '<p class="alert alert-danger">'.$this->session->flashdata('logged_in_failed').'</p>'?>
        <?php endif;?>
		<div id="box" class="border-0 row mx-auto py-0">
			<div class="col" style=" background-color: #ffff; height: 100%; background-repeat: no-repeat; background-size: 420px 500px;">
				<img src="<?php echo base_url();?>assets/img/design.jpg" alt="" style="background-color: #ffff; height: 100%; width: 110%;">
			</div>
			<div class="col" style="background-color: #0458C0; height: 100%;">
				<div id="login_box"><br><br><br><br>
				<form method="post">
					<div id="log"><i>Welcome!</i></div><br><br>
						<div id="log1">
						<input type="text" id="username" name="username" placeholder="Username" required style="border-radius: 20px; padding: 20px; margin: 10px"><br>
						<input type="password" id="password" name="password" placeholder="Password" required style="border-radius: 20px; padding: 20px;"><br><br>
						</div>
						<input type="submit" name="submit" id="button" value="Login">
						<div class="link" style="text-align: left; padding-left: 10px; color:#fff; font-weight: lighter;">
							<p>Not a client? <a href="consumer_register" style="color: #351CBB;">Click here!</a></p>
						</div>
					</div>
				</form>
				
			</div>
		</div>

	</main>
</body>
</html>
