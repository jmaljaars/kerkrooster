<table class='arceren' width='100%'>
<tr class='theader'>
	<td width="20%">datum</td>
	<td width="40%">naam</td>
	<td width="15%">aanvang</td>
	<td width="25%" colspan="2">kleur</td>
</tr>
<?php foreach($this->result->rows as $row){ ?>
<tr>
	<td><?php echo $row['fdatum']; //geformatteerde datum ?></td>
	<td><?php echo $row['naam']; ?></td>
	<td><?php echo $row['aanvangstijd']; //geformatteerde tijd ?> uur</td>
	<td><?php echo $row['kleur']; ?></td>
	<td><form method='post' action='index.php?route=zondag/details'>
	<input title=" Klik hier voor details " border=0 alt="Details" name="cmdDetails" id="cmdDetails"
	src="./themes/<?php echo THEME; ?>/images/loep.png" type=image><input type='hidden' name='zondag_id' value='<?php echo $row['zondag_id']; ?>'></form></td>
</tr>
<?php } ?>
</table>
