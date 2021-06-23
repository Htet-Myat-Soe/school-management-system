<?php
include "app/master.php";

?>

<div class="breadcrumb">
	<a href="../admin/dashboard.php">Dashboard</a>
	<a href="../admin/student.php" class="text-decoration-none">Students</a>
	<a href="#" class="text-decoration-none active" >Create</a>
</div>

<div class="container details shadow-lg mx-auto p-5 m-5">
    <div class="row">
        <div class="col-md-6 col-sm-12 mx-auto">
            <h2 class="text-center">Add New Student</h2>
            <form action="../_actions/create_student.php" method="post" enctype="multipart/form-data">
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
                    <label for="address">Address</label>
                    <textarea name="address" id="address" cols="41" rows="5" placeholder="Address" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="role_no">Role No</label>
                    <input type="text" id="role_no" name="role_no" placeholder="Role No" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" id="photo" name="photo" placeholder="Photo" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="birthday">Birthday</label>
                    <input type="date" id="birthday" name="birthday" placeholder="Birthday" class="form-control" required>
                </div>
                <div class="form-group">
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="permission" value="1">Permission
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Create</button>
            </form>
        </div>
    </div>
</div>

<?php
include "app/footer.php";
?>
