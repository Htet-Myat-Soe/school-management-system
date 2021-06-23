<?php
    include "app/master.php";
    include "../vendor/autoload.php";
    use Libs\Database\MySQL;
    use Libs\Database\TeachersTable;

    $table = new TeachersTable(new MySQL());
    $limit = isset($_POST['limit']) ? $_POST['limit'] : 10;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $start = ($page - 1) * $limit;
    $pages = $table->paginate($start,$limit);
    $all = $table->getAllTeacher($start,$limit);
    if($page > 1) $previous = $page - 1;
    else $previous = 1;
    if($page == $pages) $next = $page;
    else $next = $page + 1;

?>

<div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-between">
                    <h2 class="text-bolder">Teachers List <span class="badge badge-success"><?= count($table->countOfTea()   ) ?></span></h2>
                    <div class="btn-group">
                        <a href="#" class="add-new mx-2"><i class="fas fa-filter"></i></a>
                        <a href="../admin/create_teacher.php" class="add-new mx-2"><i class="fas fa-plus"></i></a>
                        <a href="#" class="add-new mx-2"><i class="fas fa-file-export"></i></a>
                        <a href="#" class="add-new mx-2"><i class="fas fa-file-import"></i></a>
                    </div>
                </div>
                <?php if(isset($_GET['created_success'])): ?>
                    <div class="col-12 mt-4">
                        <div class="alert alert-success">
                            User Created Successfully !

                            <button data-dismiss="alert" class="close">x</button>
                        </div>
                    </div>
                <?php endif ?>
                
                <?php if(isset($_GET['created_fail'])): ?>
                    <div class="col-12 mt-4">
                        <div class="alert alert-danger">
                            User Create Fail , Try Again !

                            <button data-dismiss="alert" class="close">x</button>
                        </div>
                    </div>
                <?php endif ?>
                <?php if(isset($_GET['updated_success'])): ?>
                    <div class="col-12 mt-4">
                        <div class="alert alert-success">
                            User Updated Successfully !

                            <button data-dismiss="alert" class="close">x</button>
                        </div>
                    </div>
                <?php endif ?>
                
                <?php if(isset($_GET['updated_fail'])): ?>
                    <div class="col-12 mt-4">
                        <div class="alert alert-danger">
                            User Update Fail , Try Again !

                            <button data-dismiss="alert" class="close">x</button>
                        </div>
                    </div>
                <?php endif ?>
                <?php if(isset($_GET['deleted_success'])): ?>
                    <div class="col-12 mt-4">
                        <div class="alert alert-success">
                            User Deleted Successfully !

                            <button data-dismiss="alert" class="close">x</button>
                        </div>
                    </div>
                <?php endif ?>
                
                <?php if(isset($_GET['deleted_fail'])): ?>
                    <div class="col-12 mt-4">
                        <div class="alert alert-danger">
                            User Delete Fail , Try Again !

                            <button data-dismiss="alert" class="close">x</button>
                        </div>
                    </div>
                <?php endif ?>

                <?php if(isset($_GET['photo_err'])): ?>
                    <div class="col-12 mt-4">
                        <div class="alert alert-danger">
                            User Photo have Error , Try Again !

                            <button data-dismiss="alert" class="close">x</button>
                        </div>
                    </div>
                <?php endif ?>

                <?php if(isset($_GET['type_err'])): ?>
                    <div class="col-12 mt-4">
                        <div class="alert alert-danger">
                            Photo Type have error , Try Again !

                            <button data-dismiss="alert" class="close">x</button>
                        </div>
                    </div>
                <?php endif ?>
                
                <div class="col-12 my-5">
                    <table class="table table-dark table-striped table-hover text-center data-table">
                        <thead>
                            <tr>
                                <th>Role No</th>
                                <th>PHOTO</th>
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>PHONE</th>
                                <th>DEPARTMENT</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($all as $teacher): ?>
                            <tr>
                                <td><?= $teacher->role_no ?></td>
                                <td><img src="../storage/images/<?= $teacher->photo ?>" alt="" width="100px" height="100px"></td>
                                <td><?= $teacher->name ?></td>
                                <td><?= $teacher->email ?></td>
                                <td><?= $teacher->phone ?></td>
                                <td><?= $teacher->department ?></td>
                                <td class="d-flex py-5">
                                    <a href="../admin/teacher_details.php?id=<?= $teacher->id ?>" class="btn-new mx-2"><i class="fas fa-info"></i></a>
                                    
                                    <a class="btn-new mx-2" href="../admin/update_teacher.php?id=<?= $teacher->id ?>"><i class="text-primary fas fa-edit"></i></a>
            
                                    <a  onclick="alert('Are You Sure ?')" class="btn-new mx-2" href="../_actions/delete_teacher.php?id=<?= $teacher->id ?>"><i class="text-primary fas fa-trash"></i></a>
                                </td>
                            </tr>

                            <?php endforeach ?>
                        </tbody>
                    </table>

                </div>

                <div class="col-12">
                    <div class="d-flex justify-content-end">
                    <ul class="pagination mr-auto">
                        <li class="page-item"><a class="page-link bg-dark" href="../admin/teacher.php?page=<?= $previous ?>">Previous</a></li>
                        <?php for($i = 1; $i <= $pages ;$i++): ?>
                        <li class="page-item"><a class="page-link bg-dark" href="../admin/teacher.php?page=<?= $i ?>"><?= $i ?></a></li>
                        <?php endfor ?>
                        <li class="page-item"><a class="page-link bg-dark" href="../admin/teacher.php?page=<?= $next ?>">Next</a></li>
                    </ul> 
                    
                    <p class="mr-3 text-dark text-bold mt-2"><?php echo $limit; ?> Rows Limit</p>
                    <form action="../admin/teacher.php" method="post" >
                        <div class="form-group">
                            <select class="form-control" id="limit" name="limit">
                            <option>Limit Record</option>
                            <?php foreach([10,50,100,500,1000] as $limit): ?>
                                <option value="<?= $limit ?>"><?= $limit ?></option>
                            <?php endforeach ?>
                            </select>
                        </div> 
                    </form>
                    
                    </div>
                </div>
            </div>
        </div>


 <?php include "app/footer.php"; ?>