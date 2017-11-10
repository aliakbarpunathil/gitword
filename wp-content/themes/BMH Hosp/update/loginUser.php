
<?php
echo "hello";
if(is_user_logged_in())
	{
	header('Location: index.php');
	}
else
	{
	header('Location: login.php');
	}
	
	?>