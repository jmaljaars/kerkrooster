	<div>
	<?php if($this->error_msg!=''){echo "<div id='fout'>".$this->error_msg."</div>";} ?>
		<form method='POST' action='index.php?route=login/login'>
			<table>
				<tr><td>Username: </td><td><input type="text" name="username" value=""></td></tr>
				<tr><td>Password: </td><td><input type="text" name="password" value=""></td></tr>
				<tr><td colspan="2"><input type="submit" name="Submit" value="Inloggen"></td></tr>
			</table>
		</form>
	</div>
</div>
