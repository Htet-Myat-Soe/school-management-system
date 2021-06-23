<?php
include "app/master.php";

?>

<div class="breadcrumb">
	<a href="../admin/dashboard.php">Dashboard</a>
	<a href="../admin/professor.php" class="text-decoration-none">Professor</a>
	<a href="#" class="text-decoration-none active" >Create</a>
</div>

<div class="container details shadow-lg mx-auto p-5 m-5">
    <div class="row">
        <div class="col-md-6 col-sm-12 mx-auto">
            <h2 class="text-center">Add New Professor</h2>
            <form action="../_actions/create_pro.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone" placeholder="Phone" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="major">Major</label>
                    <input type="major" id="major" name="major" placeholder="Major" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea name="address" id="address" cols="41" rows="5" placeholder="Address" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="role_no">Role</label>
                    <input type="text" id="role" name="role" placeholder="Role" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="department">Department</label>
                    <input type="text" id="department" name="department" placeholder="Department" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="salary">Salary</label>
                    <input type="text" id="salary" name="salary" placeholder="Salary" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" id="photo" name="photo" placeholder="Photo" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="birthday">Birthday</label>
                    <input type="date" id="birthday" name="birthday" placeholder="Birthday" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Create</button>
            </form>
        </div>
    </div>
</div>

<?php
include "app/footer.php";
?>
