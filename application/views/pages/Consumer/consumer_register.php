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
	}


	#log
	{
		padding-left: 10px;
		font-size: 30px;
		color: white;
		text-align: left;
        margin-bottom: 30px;
	}

	.form-group{
        width: 500px;
    }
    .form-control{
        margin-bottom: 10px;
    }
    #button
	{
		background-color: #0458C0; 
		border-color: #ffff;
		color: white;
		width: 410px;
		height: 50px;
		border-radius: 25px;
		font-weight: bold;	

	}

    #button:hover {
        background-color: #fff;
        color: black;
    }
    .drop-down{
        padding: 17px 11px;
        color: #333;
        background-color: #fff;
        border: 1px solid #dddd;
        cursor: pointer;
    }
    
    .d-flex{
        padding-left: 20px;
    }
	
</style>

<body style="background-color: white">
	<?= form_open('consumer_register')?>
		<div id="box" class="border-0 row mx-auto py-0">

       
			<div class="col" style=" background-color: #ffff; height: 100%; background-repeat: no-repeat; background-size: 420px 500px;">
				<img src="<?php echo base_url();?>assets/img/design.jpg" alt="" style="background-color: #ffff; height: 100%; width: 110%;">
			</div>
			<div class="col" style="background-color: #0458C0; height: 100%;">
				<div id="login_box"><br>
                    <form method="post">
                        <div id="log"><i>Register:</i></div> 
                                <div class="d-flex">
                                    <div class="form-floating" style="width: 300px;">
                                        <input type="text" name="fname" class="form-control rounded-4" id="floatingInput" placeholder="Firstname" value="<?= set_value('fname');?>" required>
                                        <label for="floatingset_valueInput">First Name</label>
                                    </div>
                                    <div class="form-floating" style="width: 100px; margin-left: 10px;">
                                        <input type="text" name="mname" class="form-control rounded-4" id="floatingInput" placeholder="Middle Initial" value="<?= set_value('mname');?>">
                                        <label for="floatingInput">M.I</label>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="form-floating" style="width: 300px;">
                                        <input type="text" name="lname" class="form-control rounded-4" id="floatingInput" placeholder="Last Name" value="<?= set_value('lname');?>" required>
                                        <label for="floatingInput">Last Name</label>
                                    </div>
                                    <div class="form-floating" style="width: 100px; margin-left: 10px;">
                                        <input type="text" name="name_ex" class="form-control rounded-4" id="floatingInput" placeholder="Name Extension" value="<?= set_value('name_ex');?>">
                                        <label for="floatingInput">Name Ex</label>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="form-floating" style="width: 100px;">
                                        <select name="purok" class="drop-down rounded-4" value="<?= set_value('purok');?>" required>
                                            <option selected disabled>Purok</option>
                                            <option value="1">Purok 1</option>
                                            <option value="2">Purok 2</option>
                                            <option value="3">Purok 3</option>
                                            <option value="4">Purok 4</option>
                                            <option value="5">Purok 5</option>
                                            <option value="6">Purok 6</option>
                                        </select>
                                    </div>
                                    <div class="form-floating" style="width: 300px; margin-left: 10px;">
                                        <input type="text" name="baranggay" class="form-control rounded-4" id="floatingInput" placeholder="" value="San Roque, Mabini,Bohol" readonly>
                                        <label for="floatingInput">Baranggay:</label>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="form-floating mb-2" style="width: 410px;">
                                        <input type="text" name="contact" class="form-control rounded-4" id="floatingInput" placeholder="Contact Number" value="<?= set_value('contact');?>" required>
                                        <label for="floatingInput">Contact Number</label>
                                    </div>
                                </div>
                                <?php if($this->session->flashdata('user_exist')) :?>
            <?= '<p style="width: 400px; color: red;">'.$this->session->flashdata('user_exist').'</p>'?>
        <?php endif;?>
        <?php if($this->session->flashdata('contact_exist')) :?>
            <?= '<p style="width: 400px; color: red;">'.$this->session->flashdata('contact_exist').'</p>'?>
        <?php endif;?>
                                <div class="d-flex">
                                    <button type="submit" name="submit" id="button">Register</button>
                                </div>
                            </div>
                        </div>
                    </form>
				</div>
			</div>
		</div>
</body>
</html>
