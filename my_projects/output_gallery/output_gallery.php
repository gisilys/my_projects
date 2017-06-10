
<link href="assets/output_gallery1/dist/lightbox.css" rel="stylesheet" type="text/css">

<?php //starts information display:
	$db = new Db;
	if (isset($_GET['kambario_id'])){
		$gautas_id = $_GET['kambario_id'];
		$sql = "SELECT * FROM kambariai K RIGHT JOIN istaigos I ON K.istaigos_id=I.id WHERE K.kambario_id='$gautas_id'";
		$result = $db->query($sql);
		while($row_room = $result->fetch_object()) { 
			$kambario_pavadinimas_darb = $row_room->pavadinimas_darb;
			
			//gallery display (one main photo):
			$sql = "SELECT * FROM kambario_nuotraukos WHERE kambario_id='$gautas_id'";
			$result = $db->query($sql);
			$x = 0;
			while($row_photo = $result->fetch_object()) { 
				if ($x == 0){
					echo' 
						<div id="block4">
							<a href="http://www.gsiworks.puslapiai.lt/finalhotel_main/uploads/'.$row_photo->pavadinimas.'" class="lightbox" title="">
							   <img src="http://www.gsiworks.puslapiai.lt/finalhotel_main/uploads/'.$row_photo->pavadinimas.'" width="500"/></a>
							</a>
						</div>';
					$x++;
				}
			}
?>



<div id="block5">
	<div id="block2">
		<?php 
			echo'Property: '.$row_room->pavadinimas.'<br><br>
				Amount of beds:'.
				$row_room->vietu_sk.'<Br><br>
				Price: '.$row_room->kaina.' Eur<Br>
				<!--<a href="content_new_booking.php?id='.$_GET['kambario_id'].'">Book it now</a>-->
				<!--<form action="content_new_booking.php?id='.$_GET['kambario_id'].'" method="GET">
					<input type="submit" name="submit" value="Book it now!" style="margin: 0; width: 90%;">
				</form>-->
				
					<a id="custom_link" style="margin-left: 0; text-decoration: none; display: inline-block; width: 70%;" href="content_new_booking.php?room_id='.$_GET['kambario_id'].'">Book this room!</a>
				
				';
		?>
	</div>
	<?php
		echo '<h3>'.$row_room->pavadinimas_kl.'</h3><br>';
		echo $row_room->aprasymas;
		}
	?>
	
</div>


	<div id="block3">
		<?php
			//gallery display (one main photo):
			$sql = "SELECT * FROM kambario_nuotraukos WHERE kambario_id='$gautas_id'";
			$result = $db->query($sql);
			$x = 1;
			while($row_photo = $result->fetch_object()) { 
				if ($x != 1){
					echo' 
						
							<a href="http://www.gsiworks.puslapiai.lt/finalhotel_main/uploads/'.$row_photo->pavadinimas.'" class="lightbox" title="">
							   <img src="http://www.gsiworks.puslapiai.lt/finalhotel_main/uploads/'.$row_photo->pavadinimas.'" height="100"/></a>
							</a>';	
				}
				$x=0;
			}
		?>
	</div>








<?php 
	}else{
		echo '<div style="padding-left: 50px;"><h2>No room photos</h2></div>';
	}
?>
<script src="assets/output_gallery1/dist/lightbox.js"></script>
<script>
lightbox('.lightbox', {
    captions: true,
    captionsSelector: 'self',
    captionAttribute: 'title',
    nav: 'auto',
    navText: [
        '&lsaquo;',
        '&rsaquo;'
    ],
    close: true,
    closeText: '&times;',
    counter: true,
    keyboard: true,
    zoom: true,
    zoomText: '&plus;',
    docClose: false,
    swipeClose: true,
    scroll: false
});
</script>
