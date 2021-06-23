<?php
include "app/master.php";
include "../vendor/autoload.php";
    use Libs\Database\MySQL;
    use Libs\Database\ProfessorsTable;

    $table = new ProfessorsTable(new MySQL());

    $id = $_GET['id'];
    $details = $table->getById($id);
?>

<div class="breadcrumb">
	<a href="../admin/dashboard.php">Dashboard</a>
	<a href="../admin/professor.php" class="text-decoration-none">Professors</a>
	<a href="#" class="text-decoration-none active" >Update</a>
</div>

<div class="container details shadow-lg mx-auto p-5 m-5">
    <div class="row">
        <div class="col-md-6 col-sm-12 mx-auto">
            <h2 class="text-center">Update Details</h2>
            <form action="../_actions/edit_professor.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $details->id ?>">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Name" class="form-control"  value="<?= $details->name ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Email" class="form-control"  value="<?= $details->email ?>" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone" placeholder="Phone" class="form-control"  value="<?= $details->phone ?>" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" class="form-control"  value="<?= $details->password ?>" required>
                </div>
                <div class="form-group">
                    <label for="major">Major</label>
                    <input type="major" id="major" name="major" placeholder="Major" class="form-control"  value="<?= $details->major ?>" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea name="address" id="address" cols="41" rows="5" placeholder="Address" class="form-control"><?= $details->address ?></textarea>
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <input type="text" id="role" name="role" placeholder="Role" class="form-control"  value="<?= $details->role ?>" required>
                </div>
                <div class="form-group">
                    <label for="department">Department</label>
                    <input type="text" id="department" name="department" placeholder="Department" class="form-control"  value="<?= $details->department ?>" required>
                </div>
                <div class="form-group">
                    <label for="salary">Salary</label>
                    <input type="text" id="salary" name="salary" placeholder="Salary" class="form-control"  value="<?= $details->salary ?>" required>
                </div>
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" id="photo" name="photo" placeholder="Photo" class="form-control" required>
                    <img src="../storage/images/<?= $details->photo ?>" width="150px" height="100px" class="mt-4" alt="">

                </div>
                <div class="form-group">
                    <label for="birthday">Birthday</label>
                    <input type="date" id="birthday" name="birthday" placeholder="Birthday" class="form-control" value="<?= $details->birthday ?>"  required>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Update</button>            </form>
        </div>
    </div>
</div>

<?php
include "app/footer.php";
?>
