<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
	<style type="text/css">
		body{
			font-family: HelveticaNeue-Light, "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
			color:#333333;
		}
		.result-container textarea{
			width:100%;
		}
		.result-container .col-xs-6{
			padding:0px;
		}
		.container ul{
			list-style-type: none;
			padding:0px;
		}
		textarea{
			width:100%;
    		-webkit-box-sizing: border-box;
       		-moz-box-sizing: border-box;
            box-sizing: border-box;
		}
		.container li{
			cursor:pointer;
			line-height: 1.4em;
			font-size:16px;
			background: #fcf7e4;
			border-radius:7px;
			margin:10px;
			padding: 20px;
			max-width: 200px;
		}
		.hm-chevron{
			/*color:'#c0c0c0'*/
			margin-top:-5px;
			background-color: #ddd;
			color:white;
			padding-top:7px;
			text-align: center;
			width:28px;
			height:28px;
			border-radius: 50%;
		}
	</style>

	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.3.1/react.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.3.1/react-dom.js"></script>
	<script src="https://unpkg.com/babel-core@5.8.38/browser.min.js"></script>
</head>
<body>



<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="./">#HashtagManager [Beta]</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <?PHP if($GLOBALS["loggedIn"]){ ?>
        <li class="active"><a href="./">Your Hashtags <span class="sr-only">(current)</span></a></li>
        <li><a href="./?site=about">About</a></li>
        <?PHP } ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>



	<div class="container">