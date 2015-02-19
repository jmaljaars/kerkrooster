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
  <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>
	
	<h1>Bewerken zondag/dienst</h1>
	<?php if($this->error_msg!=''){echo "<div id='fout'>".$this->error_msg."</div>";} ?>
		<form method='POST' name='add_zondagform' action='index.php?route=zondag/edit' onsubmit="return check_form(add_zondagform);">
			<table>
				<tr><td>Zondagnaam: </td><td><input type="text" name="zondagnaam" value="<?php echo $this->result->row['naam']; ?>"></td></tr>
				<tr><td>Datum: </td><td><input type="text" id="datepicker" name="datum" value="<?php echo $this->result->row['datum']; ?>"></td></tr>
				<tr><td>Aanvangstijd: </td><td><input type="text" name="aanvangstijd" value="<?php echo $this->result->row['aanvangstijd']; ?>"></td></tr>
				<tr><td>Liturgische kleur: </td><td><select name="kleur">
				<?php $kleur=array("groen", "paars", "wit", "rood"); $i=0; $sel=""; 
				while ($i<4) {
				    if($this->result->row['kleur']==$kleur[$i]) {$sel="selected";}else{$sel="";}
				    echo '<option value="'.$kleur[$i].'" '.$sel.'>'.$kleur[$i].'</option>';
	            $i++;
	            }
				?></select></td></tr>
								<tr><td colspan="2"><input type="submit" name="Submit" value="Wijzigen">
				<input type="hidden" name="zondag_id" value="<?php echo $this->result->row['zondag_id']; ?>"></td></tr>
			</table>
		</form>
	</div><p>&nbsp;</p>
	<a href='./index.php?route=zondag/details'><img src='./themes/default/images/details.png'></a>
</div>
