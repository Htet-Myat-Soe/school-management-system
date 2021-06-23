<?php
    include "app/master.php";
    include "../vendor/autoload.php";
    use Libs\Database\MySQL;
    use Libs\Database\PdfTable;

    $table = new PdfTable(new MySQL());
    

    $limit = isset($_POST['limit']) ? $_POST['limit'] : 10;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $start = ($page - 1) * $limit;
    $pages = $table->paginate($start,$limit);
    $all = $table->getAllPdf($start,$limit);
    if($page > 1) $previous = $page - 1;
    else $previous = 1;
    if($page == $pages) $next = $page;
    else $next = $page + 1;


    $name =isset( $_POST['name']) ? $_POST['name'] : "";

    $data = [
    "name" => $name,
    ];

    $pdf = $table->filter($data);

?>
    <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-between">
                    <h2 class="text-bolder">PDF List <span class="badge badge-success"><?= count($table->countOfPdf()   ) ?></span></h2>
                    <div class="btn-group">
                        <a href="#" type="button" data-toggle="modal" data-target="#filter" class="add-new mx-2"><i class="fas fa-filter"></i></a>
                        <!-- The Modal -->
                        <div class="modal fade" id="filter">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Pdf Filter</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                   <form action="#" method="post">
                                   <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">Search</button>
                                   </form>
                                </div>
                            </div>
                        </div>
                        </div>
                        <a href="../admin/create_pdf.php" class="add-new mx-2"><i class="fas fa-plus"></i></a>
                    </div>
                </div>
                <?php if(isset($_GET['created_success'])): ?>
                    <div class="col-12 mt-4">
                        <div class="alert alert-success">
                            PDF Created Successfully !

                            <button data-dismiss="alert" class="close">x</button>
                        </div>
                    </div>
                <?php endif ?>
                
                <?php if(isset($_GET['created_fail'])): ?>
                    <div class="col-12 mt-4">
                        <div class="alert alert-danger">
                            PDF Create Fail , Try Again !

                            <button data-dismiss="alert" class="close">x</button>
                        </div>
                    </div>
                <?php endif ?>
                <?php if(isset($_GET['updated_success'])): ?>
                    <div class="col-12 mt-4">
                        <div class="alert alert-success">
                            PDF Updated Successfully !

                            <button data-dismiss="alert" class="close">x</button>
                        </div>
                    </div>
                <?php endif ?>
                
                <?php if(isset($_GET['updated_fail'])): ?>
                    <div class="col-12 mt-4">
                        <div class="alert alert-danger">
                            PDF Update Fail , Try Again !

                            <button data-dismiss="alert" class="close">x</button>
                        </div>
                    </div>
                <?php endif ?>
                <?php if(isset($_GET['deleted_success'])): ?>
                    <div class="col-12 mt-4">
                        <div class="alert alert-success">
                            PDF Deleted Successfully !

                            <button data-dismiss="alert" class="close">x</button>
                        </div>
                    </div>
                <?php endif ?>
                
                <?php if(isset($_GET['deleted_fail'])): ?>
                    <div class="col-12 mt-4">
                        <div class="alert alert-danger">
                            PDF Deleted Fail , Try Again !

                            <button data-dismiss="alert" class="close">x</button>
                        </div>
                    </div>
                <?php endif ?>
                
                <div class="col-12 my-5">
                    <table class="table table-dark table-striped table-hover text-center data-table">
                        <thead>
                            <tr>
                                <th>PHOTO</th>
                                <th>NAME</th>
                                <th>DESCRIPTION</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php if(!empty($pdf)): ?>
                                <tr>
                                    <td><img src="../storage/images/<?= $pdf->photo ?>" alt="" width="100px" height="130px"></td>
                                    <td><?= $pdf->name ?></td>
                                    <td><?= $pdf->description ?></td>
                                    <td class="d-flex py-5">                                   
                                        <a class="btn-new mx-2" href="../admin/update_pdf.php?id=<?= $pdf->id ?>"><i class="text-primary fas fa-edit"></i></a>
                
                                        <a  onclick="alert('Are You Sure ?')" class="btn-new mx-2" href="../_actions/delete_pdf.php?id=<?= $pdf->id ?>"><i class="text-primary fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endif ?>
                           <?php if(empty($pdf)): ?>
                            <?php foreach($all as $p): ?>
                                <tr>
                                    <td><img src="../storage/images/<?= $p->photo ?>" alt="" width="100px" height="130px"></td>
                                    <td><?= $p->name ?></td>
                                    <td><?= $p->description ?></td>
                                    <td class="d-flex py-5">                                   
                                        <a class="btn-new mx-2" href="../admin/update_pdf.php?id=<?= $p->id ?>"><i class="text-primary fas fa-edit"></i></a>
                
                                        <a  onclick="alert('Are You Sure ?')" class="btn-new mx-2" href="../_actions/delete_pdf.php?id=<?= $p->id ?>"><i class="text-primary fas fa-trash"></i></a>
                                    </td>
                                </tr>

                                <?php endforeach ?>
                            <?php endif ?>                         
                        </tbody>
                    </table>

                </div>

                <div class="col-12">
                    <div class="d-flex justify-content-end">
                    <ul class="pagination mr-auto">
                        <li class="page-item"><a class="page-link bg-dark" href="../admin/pdf.php?page=<?= $previous ?>">Previous</a></li>
                        <?php for($i = 1; $i <= $pages ;$i++): ?>
                        <li class="page-item"><a class="page-link bg-dark" href="../admin/pdf.php?page=<?= $i ?>"><?= $i ?></a></li>
                        <?php endfor ?>
                        <li class="page-item"><a class="page-link bg-dark" href="../admin/pdf.php?page=<?= $next ?>">Next</a></li>
                    </ul> 
                    
                    <p class="mr-3 text-dark text-bold mt-2"><?php echo $limit; ?> Rows Limit</p>
                    <form action="../admin/pdf.php" method="post" >
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


<?php
    include "app/footer.php";
?>