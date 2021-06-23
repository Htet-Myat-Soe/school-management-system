<?php
include "app/master.php";
include "../vendor/autoload.php";
    use Libs\Database\MySQL;
    use Libs\Database\PdfTable;

    $table = new PdfTable(new MySQL());

    $id = $_GET['id'];
    $details = $table->getById($id);

?>

<div class="breadcrumb">
	<a href="../admin/dashboard.php">Dashboard</a>
	<a href="../admin/pdf.php" class="text-decoration-none">Pdf</a>
	<a href="#" class="text-decoration-none active" >Update</a>
</div>

<div class="container details shadow-lg mx-auto p-5 m-5">
    <div class="row">
        <div class="col-md-6 col-sm-12 mx-auto">
            <h2 class="text-center">Update Pdf</h2>
            <form action="../_actions/edit_pdf.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" id="" value="<?= $details->id ?>">    
            <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Name" value="<?= $details->name ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="41" rows="5" placeholder="Description" class="form-control"><?= $details->description ?></textarea>
                </div>
                <div class="form-group">
                    <label for="pdf">Pdf File</label>
                    <input type="file" accept="pdf/*" id="pdf" name="pdf" placeholder="Pdf Books" value="<?= $details->file ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" id="photo" name="photo" placeholder="Photo" value="<?= $details->photo ?>" class="form-control" required>
                </div>
                <img src="../storage/images/<?= $details->photo ?>" width="100px" height="130px" alt=""><br><br>
                <button type="submit" class="btn btn-primary mb-2">Update</button>
            </form>
        </div>
    </div>
</div>

<?php
include "app/footer.php";
?>
