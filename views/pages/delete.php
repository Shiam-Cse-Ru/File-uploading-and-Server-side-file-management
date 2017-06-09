<?php 

	if(isset($_GET['id'])){
		$id = $_GET['id'];
		
    $query=Model::DeleteAlbum($id);
    if ($query) {

	echo "<script>
	alert('are you sure you want delete it?');
	window.location.href='?controller=pages&action=my_album';
	</script>
	";
	}

	else{
		header('location:?controller=pages&action=my_album');
	}

}


 ?>