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
			background: #fcf7e4;
			border-radius:7px;
			margin:10px;
			padding: 10px;
			max-width: 200px;
		}
	</style>
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
      <a class="navbar-brand" href="#">#HashtagManager</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Your Hashtags <span class="sr-only">(current)</span></a></li>
        <li><a href="#">About</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>



	<div class="container">
		<h1>#HashtagManager</h1>
		<div class="panel panel-default">
			<div class="panel-body" id="example">
			Register
			<form action="./">
				<div class="form-group">
					<label for="exampleInputEmail1">Email address</label>
					<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email">
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>
			</div>
			<div class="panel-footer">Your Open Source Hashtag Manager</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	<script src="HashtagItem.jsx" type="text/babel"></script>
</body>
</html>