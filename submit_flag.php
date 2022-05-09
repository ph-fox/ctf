<?php
session_start();

if(isset($_SESSION['user_complete'])){
    header('location: solvers.txt');
}

function userf(){
		echo '
		<style>.subf{display:none;}</style>
		<div>
			<h1>Enter your username/cn</h1>
			<form method="post">
				<input type="text" name="username" placeholder="Enter username" autocomplete="off" autofocus>
				<input type="submit" name="submit" value="Add to solvers.txt">
				<h3 class="err">Err! username cannot be blank!</h3>
			</form>
		</div>
		';
}

if(isset($_POST['username'])){
    $_SESSION['user_complete'] = "$user:done!!";
	$user = $_POST['username'];
	if(!empty($user)){
		$userl = fopen('user.txt', 'a');
		fwrite($userl, "$user\n");
		#==========================#
		$content = file_get_contents('user.txt');
		$lines = explode("\n", $content);
		$num = 0;
		$solver2 = fopen('solvers.txt','w');
		$head_cont = "CTF CHALL BY: Anikin Luke\nSolvers:\n";
		fwrite($solver2, $head_cont);
		$solver = fopen('solvers.txt','a');
		foreach($lines as $usr){
			$num++;
			$content = "$num.) $usr\n";
			fwrite($solver, $content);

		}
        header('location: solvers.txt');
	}else{
		echo "<style>.err{visibility:visible!important;}</style>";
		userf();
	}
}
if(isset($_POST['flag'])){
	$flag = $_POST['flag'];
	if($flag == 'phflag{aHR0cF9oMzRkM3J6}'){
		#$_SESSION['correct'] = $flag;
		#header('location: usern.php');
		userf();
	}else{
		echo "<style>.err{visibility:visible!important;}</style>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Check the flag</title>
</head>
<body>
	<div class="subf">
		<h1>Submit Flag</h1>
		<form method="post">
			<input type="text" name="flag" placeholder="Enter flag" autocomplete="off" autofocus>
			<input type="submit" name="submit" value="Submit flag">
			<h3 class="err">Err!,incorrect flag!</h3>
		</form>
	</div>
</body>
<style type="text/css">
	.err{
		visibility: hidden;
		color: orangered;
		font-size: 18px;
/*		text-shadow: 1px 1px 0px white, -1px -1px 0px white;*/
	}
	*{user-select: none;color: white;font-family: monospace;}
	body{
		background-color: #303030;
		margin: 0;
		justify-content: center;
		display: flex;
		align-items: center;
		height: 100vh;
	}
	div{
		background-color: #606060;
		width: 350px;
		height: 30vh;
		text-align: center;
	}
	input[type=text]{
		background-color: transparent;
		text-decoration: none;
		color: white;
		border-radius: 10px;
		padding: 5px;
		width: 80%;
		font-size: 18px;
		margin-bottom: 10px;
		outline: none;
	}
	input[type=submit]{
		color: white;
		background-color: transparent;
		border: 1px solid white;
		border-radius: 20px;
		font-size: 18px;
	}
	input[type=submit]:hover{color:lime;border: 1px solid yellow}
	input[type=submit]:active{color: black;font-weight: bold; background-color: yellow; border: 1px solid yellow;}
</style>
</html>
