<?php
    include "app/master.php";
    include "../vendor/autoload.php";
    use Libs\Database\MySQL;
    use Libs\Database\StudentsTable;

    $table = new StudentsTable(new MySQL());
    

    $limit = isset($_POST['limit']) ? $_POST['limit'] : 10;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $start = ($page - 1) * $limit;
    $pages = $table->paginate($start,$limit);
    // $all = $table->getAllStudent($start,$limit);
    if($page > 1) $previous = $page - 1;
    else $previous = 1;
    if($page == $pages) $next = $page;
    else $next = $page + 1;

    

    $name =isset( $_POST['name']) ? $_POST['name'] : "";
    $role_no =isset( $_POST['role_no']) ? $_POST['role_no'] : "";
    $major = isset( $_POST['major']) ? $_POST['major'] : "";
    $year = isset( $_POST['year']) ? $_POST['year'] : "";
    $permission = isset($_POST['permission']) ? $_POST['permission'] : 0;
   
        $data = [
            "name" => $name,
            "role_no" => $role_no,
            "major" => $major,
            "year" => $year,
            "permission" => $permission,
        ];
    
    $std = $table->filter($data,$start,$limit);
    

?>

<div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-between">
                    <h2 class="text-bolder">Students List <span class="badge badge-success"><?= count($table->countOfStd()   ) ?></span></h2>
                    <div class="btn-group">
                        <a href="#" type="button" data-toggle="modal" data-target="#filter" class="add-new mx-2"><i class="fas fa-filter"></i></a>
                        <!-- The Modal -->
                        <div class="modal fade" id="filter">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Students Filter</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                   <form action="#" method="post">
                                   <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="role_no">Role No</label>
                                        <input type="text" name="role_no" class="form-control" id="role_no" placeholder="Role No">
                                    </div>
                                    <p>Major</p>
                                    <div class="form-group">
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="major">CS
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="major">CT
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="year">Select list:</label>
                                        <select class="form-control" id="year" name="year">
                                        <option value="">Select Year</option>
                                            <option value="First Year">First Year</option>
                                            <option value="Second Year">Second Year</option>
                                            <option value="Third Year">Third Year</option>
                                            <option value="Fourth Year">Fourth Year</option>
                                            <option value="Fifth Year">Fifth Year</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="permission" value="1">Permission
                                            </label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">Search</button>
                                   </form>
                                </div>
                            </div>
                        </div>
                        </div>
                        <a href="../admin/create_student.php" class="add-new mx-2"><i class="fas fa-plus"></i></a>
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
                
                <div class="col-12 my-5">
                    <table class="table table-dark table-striped table-hover text-center data-table">
                        <thead>
                            <tr>
                                <th>Role No</th>
                                <th>PHOTO</th>
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>PHONE</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php foreach($std as $student): ?>
                                    <tr>
                                        <td><?= $student->role_no ?></td>
                                        <td><img src="../storage/images/<?= $student->photo ?>" alt="" width="100px" height="100px"></td>
                                        <td><?= $student->name ?></td>
                                        <td><?= $student->email ?></td>
                                        <td><?= $student->phone ?></td>
                                        <td class="d-flex py-5">
                                            <a href="../admin/student_details.php?id=<?= $student->id ?>" class="btn-new mx-2"><i class="fas fa-info"></i></a>
                                            
                                            <a class="btn-new mx-2" href="../admin/update_student.php?id=<?= $student->id ?>"><i class="text-primary fas fa-edit"></i></a>
                    
                                            <a  onclick="alert('Are You Sure ?')" class="btn-new mx-2" href="../_actions/delete_student.php?id=<?= $student->id ?>"><i class="text-primary fas fa-trash"></i></a>
                                        </td>
                                    </tr>

                                <?php endforeach ?>

                        </tbody>
                    </table>

                </div>

                <div class="col-12">
                    <div class="d-flex justify-content-end">
                    <ul class="pagination mr-auto">
                        <li class="page-item"><a class="page-link bg-dark" href="../admin/student.php?page=<?= $previous ?>">Previous</a></li>
                        <?php for($i = 1; $i <= $pages ;$i++): ?>
                        <li class="page-item"><a class="page-link bg-dark" href="../admin/student.php?page=<?= $i ?>"><?= $i ?></a></li>
                        <?php endfor ?>
                        <li class="page-item"><a class="page-link bg-dark" href="../admin/student.php?page=<?= $next ?>">Next</a></li>
                    </ul> 
                    
                    <p class="mr-3 text-dark text-bold mt-2"><?php echo $limit; ?> Rows Limit</p>
                    <form action="../admin/student.php" method="post" >
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