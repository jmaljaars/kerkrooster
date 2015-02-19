	<div>
	<SCRIPT language=javascript type="text/javascript"><!--
var form = "";
var submitted = false;
var error = false;

function check_input(field_name, field_size, message) {
  if (form.elements[field_name] && (form.elements[field_name].type != "hidden")) {
    var field_value = form.elements[field_name].value;

    if (field_value.length < field_size) {
      error_message = error_message + "* " + message + "\n";
      error = true;
    }
  }
}
function check_form(form_name) {
  if (submitted == true) {
    alert("Dit formulier is al verstuurd. Drukt u aub op OK en wacht tot het proces is afgerond.");
    return false;
  }

  error = false;
  form = form_name;
  error_message = "Er zijn fouten opgetreden tijdens het verwerken van uw formulier!\n\n";


  check_input("zondagnaam", 3, "Naam van de zondag moet minimaal 3 letters hebben.");
  check_input("datum", 8, "Datum invoeren als: d-m-jjjj.");
  check_input("aanvangstijd", 4, "Tijd invoeren als HH:MM.");
  check_input("kleur", 3, "Kleur is minimaal 3 tekens.");

  if (error == true) {
    alert(error_message);
    return false;
  } else {
    submitted = true;
    return true;
  }
}
//--></SCRIPT>
	
	<h1>Planning medewerkers</h1>
	<h3>Planning bewerken voor: <?php echo $this->result->row['naam']; ?></h3>
	<p>Datum: <?php echo $this->result->row['datum']; ?> - Tijd: <?php echo $this->result->row['aanvangstijd']; ?>uur - Kleur: <?php echo $this->result->row['kleur']; ?></p>
	<?php if($this->error_msg!=''){echo "<div id='fout'>".$this->error_msg."</div>";} ?>
		<form method='POST' name='add_planning' action='index.php?route=zondag/plannen' onsubmit="return check_form(add_planning);">
			<table border="1" width="75%"><tbody>
				<tr><td>Taak  dienst</td><td>Medewerker</td><td>Opmerkingen</td></tr>
                <?php 
                //Als zondag niet voorkomt in events dan standaard rubrieken weergeven (taken zonder toegekende namen)
                //taken uit configuratie halen
                
                //Als zondag wel voorkomt (dus al een keer taken gevuld) dan die taken weergeven:
                //foreach($this->result->rows as $row){ ?>
				
				<tr><td>Liturgische kleur: </td><td><select name="kleur">
				<?php $kleur=array("groen", "paars", "wit", "rood"); $i=0; $sel=""; 
				while ($i<4) {
				    if($this->result->row['kleur']==$kleur[$i]) {$sel="selected";}else{$sel="";}
				    echo '<option value="'.$kleur[$i].'" '.$sel.'>'.$kleur[$i].'</option>';
	            $i++;
	            }
				?></select></td><td><input type="submit" name="Submit" value="Wijzigen">
				<input type="hidden" name="zondag_id" value="<?php echo $this->result->row['zondag_id']; ?>"></td></tr>
			</tbody></table>
		</form>
	</div><p>&nbsp;</p>
	<a href='./index.php?route=zondag/details'><img src='./themes/default/images/details.png'></a>
</div>
