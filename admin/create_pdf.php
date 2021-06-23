<?php
include "app/master.php";

?>

<div class="breadcrumb">
	<a href="../admin/dashboard.php">Dashboard</a>
	<a href="../admin/pdf.php" class="text-decoration-none">Pdf</a>
	<a href="#" class="text-decoration-none active" >Create</a>
</div>

<div class="container details shadow-lg mx-auto p-5 m-5">
    <div class="row">
        <div class="col-md-6 col-sm-12 mx-auto">
            <h2 class="text-center">Add New Pdf</h2>
            <form action="../_actions/create_pdf.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="41" rows="5" placeholder="Description" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="pdf">Pdf File</label>
                    <input type="file" accept="pdf/*" id="pdf" name="pdf" placeholder="Pdf Books" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" id="photo" name="photo" placeholder="Photo" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Create</button>
            </form>
        </div>
    </div>
</div>

<?php
include "app/footer.php";
?>
