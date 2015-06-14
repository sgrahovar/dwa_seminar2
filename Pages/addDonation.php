<div id="addDonation">
		<script src="SDK/tinymce/tinymce.min.js"></script>
		<script>
		tinymce.init({
			selector:'textarea',
			skin : 'charcoal',
			plugins: "table",
			menubar: "file edit table",
			toolbar: 'undo redo | bold italic underline strikethrough superscript subscript removeformat | alignleft aligncenter alignright | bullist numlist outdent indent',
			entity_encoding: 'raw'
		});
		</script>


	<div id="col-sm-8 border">
		<form method="post" action="">

<div role="tabpanel">

	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><?php echo $words['jezik1'];?></a></li>
		<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><?php echo $words['jezik2'];?></a></li>
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="home">
			<div class="form-group">
				<label for="title"><?php echo $words['naslov']; ?></label>
				<input type="text" class="form-control" id="title" name="title_hr" required>
			</div>

			<div class="form-group">
				<label for="textarea"><?php echo $words['tekst']; ?></label>
				<textarea class="form-control" id="textarea" name="donationText_hr"></textarea>
			</div>
		</div>
		<div role="tabpanel" class="tab-pane" id="profile">
			<div class="form-group">
				<label for="title"><?php echo $words['naslov']; ?></label>
				<input type="text" class="form-control" id="title" name="title_en" required>
			</div>

			<div class="form-group">
				<label for="textarea"><?php echo $words['tekst']; ?></label>
				<textarea class="form-control" id="textarea" name="donationText_en"></textarea>
			</div>
		</div>
	</div>

</div>

			<div class="form-inline">
				<label for="donationAmount"><?php echo $words['kolikoDonirati']; ?></label>
				<input type="text" class="form-control" id="donationAmount" name="donationAmount" required>				
			</div>
			<div class="form-inline" style="margin-top: 20px;">
				<label for="donationDate"><?php echo $words['kadaZavrsavaDonacija']; ?></label>
				<input type="text" class="form-control" id="donationDate" data-zdp_direction="1" name="donationDate" required>
			</div>

			<div class="form-inline" style="margin-top: 20px;">
				<label for="category"><?php echo $words['kategorija']; ?></label>
				<select class="form-control" id="category" name="category">
					<?php
						try
						{
							$c = new ConnectionToDb();
							$connection = $c->getInstance();

							$query = $connection->prepare("SELECT * FROM donation_tags");
							$query->execute();
							$result = $query->fetchAll(PDO::FETCH_ASSOC);
							
							foreach($result as $row)
							{
								echo '<option value="'. $row['ID'] .'">' . $row['Tag_'.$language] . '</option>';
							}
						}
						catch(PDOExepction $e) {
							echo 'ERROR: ' . $e->getMessage();
						}
						$c = null;	
					?>
				</select>
			</div>

			<div class="form-inline" style="margin-top: 20px;">
				<div class="form-group" style="margin-left: 10%;">
					<input type="submit" class="btn btn-default" value="<?php echo $words['posalji']; ?>" name="submitForm">	
				</div>
			</div>

		</form>
	</div>




</div>

<?php

if(isset($_POST['submitForm']))
{	

	$donation = new Donation();

	$donation->setUserId($_SESSION['User']['ID']);

	$donationData = array(
		'title_hr' => $_POST['title_hr'],
		'text_hr' => $_POST['donationText_hr'],
		'title_en' => $_POST['title_en'],
		'text_en' => $_POST['donationText_en'],
		'amount' => $_POST['donationAmount'],
		'date' => $_POST['donationDate'],
		'category' => $_POST['category']
	);

	$donation->addDonation($donationData);

	;

//	header('Location: index.php');

//	echo '<p style="color: white; font-weight: bold">Success</p>';

//	echo '<p style="color: white; font-weight: bold">User ID: '. $donation->getUserId() .'</p>';

//	print_r($donationData);
}

?>