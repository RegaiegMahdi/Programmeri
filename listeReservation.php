<?php
include "../Controller/ReservationC.php";
$ReservationC = new ReservationC();
$list = $ReservationC->listeReservation();
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title> programmeri </title>
 

</head>
<body>

	<section class="List">
		<div class="Tablelist">
			<table class="tableview">
				<tr class="TitleTab">

                <th class="styleth">Date</th>
<th>
    <th>
					<th class="styleth">Id Client</th>
					
					
					<th><a class="toggle-edit"><i class="edit-del-icon uil uil-edit"></i></a></th>
					<th><a class="toggle-add"><i class="edit-del-icon uil uil-book-medical"></i></a></th>
				</tr>
				<?php
        foreach ($list as $Reservation) 
        {
        ?>
					<tr>
                    <td class="styleth"><?= $Reservation['datee']; ?></td>
                    <td>
						</td>
						<td>
                        <td class="styleth"><?= $Reservation['id_Client']; ?></td>
                    
                    
						<td>
						</td>
						<td>
                        <td>
                    
                    <a href="deleteReservation.php?id=<?php echo $Reservation['datee']; ?>">Delete</a>  
                    </td>
						</td>
					</tr>
                    <?php
        }
        ?>	
			</table>
		</div>
		<form  class="form-group" method="POST" action="addReservation.php">
            
<ul>
    <li>
        <h3> Ajouter</h3>
    </li>
    <li>
    <tr>
                <td>
                    <label for="dateeadd">Date :
                    </label>
                </td>
                <td>
                    <input type="date" name="dateeadd" placeholder="entrer date" id="dateeadd"  >
                </td>
                </li>
                <li>
                    <label for="idClientadd">
                        <label>
                            <input type="number" name="idClientadd" placeholder="entrer votre ID" id="idClientadd" 
                            minlength="1" max="10" size="10">
                </li>
                <li>
                <input type="submit" name="Add" value="Submit" class="btn mt-4">
            </tr>
          

		</div>
						
        <div class="InputlistEdit slide-out-right">

        <form  class="form-group" method="POST" action="updateReservation.php">
            
            <ul>
                <li>
                    <h3>Modifier</h3>

                <td>
                    <label for="dateeup">Date :
                    </label>
                </td>
                <td>
                    <input type="date" name="dateeup" placeholder="entrer date" id="dateeadd"  >
                </td>
                <label for="idClientup">
                        <label>
                            <input type="number" name="idClientup" placeholder="entrer votre ID" id="idClientup" 
                            minlength="1" maxlength="10" size="10">
                </li>
                <li>
                </li>
                <li>
                </li>
            <input type="submit" name="Update" value="Submit" class="btn mt-4">
        </form>

    </div>
</section>



</div>

        

   </right>
        </div>
    
</body>

</html>
