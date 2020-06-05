<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
		li{
			text-align:'left';
		}

        body{
            height: 100%;
            width: 100%;
            background-color: #00a896;
        }
        .lgn{
        margin: 0;
        padding: 0;
        height: 100vh;
        background: url(<?= base_url('assets/images/indonesia.jpeg')?>);
        background-size: 100% 100%;
        }
        .container{
			width: 100%;
			margin: 0 auto;
            height: 100%;
            border-radius: 5px;
		}
        #login .container #login-row #login-column #login-box {
        margin-top: 120px;
        max-width: 600px;
        height: 320px;
        border: 1px solid #9C9C9C;
        background-color: #EAEAEA;
        }
        #login .container #login-row #login-column #login-box #login-form {
        padding: 20px;
        }
        #login .container #login-row #login-column #login-box #login-form #register-link {
        margin-top: -85px;
        }
        .dropbtn {
			background-color: #FFFFFF;
			padding: 10px;
			border: none;
			cursor: pointer;
			border-radius: 50%;
		}

		.dropbtn:hover, .dropbtn:focus, .fa-gear:hover {
			color: black;
		}

		.dropdown {
			position: relative;
			display: inline-block;
		}

		.dropdown-content {
			display: none;
			position: absolute;
			background-color: #f1f1f1;
			min-width: 160px;
			overflow: auto;
			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			z-index: 1;
		}

		.dropdown-content a {
			color: black;
			padding: 10px 12px;
			text-decoration: none;
			display: block;
		}

		.dropdown a:hover {
			background-color: #00a896;
			color: #FFFFFF;
		}

		.show {
			display: block;
		}
		.fa-gear{
			color: #00a896;
			font-size: 24px;
		}
		.isidrop{
			font-weight: 100;
		}
        .topnav-right{
        margin-right: 100px;
        }
    </style>
    <title><?=$title?></title>
</head>
<body>