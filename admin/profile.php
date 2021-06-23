<?php
include "app/master.php";
?>

<div class="breadcrumb">
	<a href="../admin/dashboard.php">Dashboard</a>
	<a href="#" class="text-decoration-none active" ><?= $auth['name'] ?></a>
</div>


<div class="container details shadow-lg mx-auto p-5 m-5">

    <div class="row my-4">
        <div class="col-md-6 col-sm-12">
            <h2 class="text-bold"><?=  $auth['name'] ?></h2>
            <img src="../storage/images/<?=  $auth['photo'] ?>" alt="" width="100%" height="350px" class="my-2">
            
        </div>
        <div class="col-md-6 col-sm-12 mt-2 pt-5">
            <ul class="list-group mb-3">
                <li class="list-group-item"><b>Email :</b> <?= $auth['email'] ?></li>
                <li class="list-group-item"><b>Phone :</b> <?= $auth['phone'] ?></li>
                <li class="list-group-item"><b>Role :</b> 
                    <?php if($auth['role_id'] == 1) echo "Professor";
                          if($auth['role_id'] == 2) echo "Teacher";
                          if($auth['role_id'] == 3) echo "Student";
                    ?>
                </li>
                <li class="list-group-item"><b>Address :</b> <?= $auth['address'] ?></li>
                <li class="list-group-item"><b>Age :</b> <?= $auth['age'] ?></li>
            </ul>
            <a onclick="alert('Are You Sure ?')" href="../_actions/admin_logout.php?id=<?= $auth['id'] ?>" class="btn btn-danger m-2">Logout</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <p class="text-center text-primary">If you want to add new admin, give permission to students or teachers from their table by editing.</p>
        </div>
    </div>

</div>




<?php
include "app/footer.php";
?>