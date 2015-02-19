	<?php if(isset($this->msg)){ ?>
	<div class="msg"><?php echo $this->msg; ?></div>
	<?php } ?>
<table class='arceren' width='100%'>
<tr class='theader'>
	<td width="40%">naam</td>
	<td width="15%">datum</td>
	<td width="15%">aanvang</td>
	<td width="15%">kleur</td>
	<td width="15%" colspan='2'>actie</td>
</tr>
<?php foreach($this->result->rows as $row){ ?>
<tr>
	<td><?php echo $row['naam']; ?></td>
	<td><?php echo $row['fdatum']; //geformatteerde datum ?></td>
	<td><?php echo $row['aanvangstijd']; //geformatteerde tijd ?> uur</td>
	<td><?php echo $row['kleur']; ?></td>
	<td><form method='post' action='index.php?route=zondag/delete'>
	<input title=" Dienst verwijderen " border=0 alt="Dienst verwijderen" name="cmdDelete" id="cmdDelete"
	src="./themes/<?php echo THEME; ?>/images/del.gif" type=image><input type='hidden' name='zondag_id' value='<?php echo $row['zondag_id']; ?>'></form></td>
	<td><a href='index.php?route=zondag/edit&zondag_id=<?php echo $row['zondag_id']; ?>'><img src="./themes/<?php echo THEME; ?>/images/edit.gif" alt='Dienst bewerken'></a>
	&nbsp;&nbsp;&nbsp;<a href='index.php?route=zondag/plannen&zondag_id=<?php echo $row['zondag_id']; ?>'><img src="./themes/<?php echo THEME; ?>/images/calendar.gif" alt='Planning bewerken'></a></td>
</tr>
<?php } ?>
</table>
<a href='index.php?route=zondag/add'><img src="./themes/<?php echo THEME; ?>/images/plus.gif" alt"Dienst toevoegen"></a> Item toevoegen