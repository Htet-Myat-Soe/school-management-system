<?php
include "app/master.php";
include "../vendor/autoload.php";
    use Libs\Database\MySQL;
    use Libs\Database\TeachersTable;

    $table = new TeachersTable(new MySQL());

    $id = $_GET['id'];
    $details = $table->getById($id);
?>

<div class="breadcrumb">
	<a href="../admin/dashboard.php">Dashboard</a>
	<a href="../admin/teacher.php" class="text-decoration-none">Teachers</a>
	<a href="#" class="text-decoration-none active" ><?= $details->name ?></a>
</div>


<div class="container details shadow-lg mx-auto p-5 m-5">

    <div class="row">
        <div class="col-md-6 col-sm-12">
            <h2 class="text-bold"><?= $details->name ?></h2>
            <img src="../storage/images/<?= $details->photo ?>" alt="" width="100%" height="350px" class="my-5">
            <a href="../admin/update_teacher.php?id=<?= $details->id ?>" class="btn btn-success m-2">Edit</a>
            <a onclick="alert('Are You Sure ?')" href="../_actions/delete_teacher.php?id=<?= $details->id ?>" class="btn btn-danger m-2">Delete</a>
        </div>
        <div class="col-md-6 col-sm-12 mt-5">
            <ul class="list-group">
                <li class="list-group-item"><b>Role No :</b> <?= $details->role_no ?></li>
                <li class="list-group-item"><b>Email :</b> <?= $details->email ?></li>
                <li class="list-group-item"><b>Phone :</b> <?= $details->phone ?></li>
                <li class="list-group-item"><b>Department :</b> <?= $details->department ?></li>
                <li class="list-group-item"><b>Salary :</b> <?= $details->salary ?></li>
                <li class="list-group-item"><b>Major :</b> <?= $details->major ?></li>
                <li class="list-group-item"><b>Address :</b> <?= $details->address ?></li>
                <li class="list-group-item"><b>Age :</b> <?= $details->age ?></li>
                <li class="list-group-item"><b>Birthday :</b> <?= $details->birthday ?></li>
                <li class="list-group-item"><b>Permission :</b> <?= $details->permission ?></li>
            </ul>
        </div>
    </div>

</div>




<?php
include "app/footer.php";
?>