<?php
include "app/master.php";
include "../vendor/autoload.php";

use Libs\Database\MySQL;
use Libs\Database\StudentsTable;
use Libs\Database\TeachersTable;
use Libs\Database\ProfessorsTable;
use Helpers\HTTP;

$table1 = new StudentsTable(new MySQL());
$table2 = new TeachersTable(new MySQL());
$table3 = new ProfessorsTable(new MySQL());

$count_pro = $table3->countOfPro();
$count_tea = $table2->countOfTea();
$count_std = $table1->countOfStd();

$first = $table1->countOfyrs('First Year');
$second = $table1->countOfyrs('Second Year');
$third = $table1->countOfyrs('Third Year');
$fourth = $table1->countOfyrs('Fourth Year');
$fifth = $table1->countOfyrs('Fifth Year');

$professors = $table3->admin();
$teachers = $table2->admin();
$students = $table1->admin();
?>
 
 <div class="container-fluid my-3">
   <div class="row my-3">
     <div class="col-lg-4 col-md-6 col-sm-12 shadow-sm p-3  mx-auto my-2 dash-box">
       <div class="row">
         <div class="col-4">
            <img src="../images/students.png" alt="" width="70px" height="70px">
         </div>
         <div class="col-8">
            <h3>Students</h3>
            <hr>
            <strong><?=count($count_std) ?></strong>
         </div>
       </div>
     </div>
     <div class="col-lg-4 col-md-6 col-sm-12 shadow-sm p-3  mx-auto my-2 dash-box">
       <div class="row">
         <div class="col-4">
            <img src="../images/presentation.png" alt="" width="70px" height="70px">
         </div>
         <div class="col-8">
            <h3>Teachers</h3>
            <hr>
            <strong><?= count($count_tea) ?></strong>
         </div>
       </div>
     </div>
     <div class="col-lg-4 col-md-6 col-sm-12 shadow-sm p-3  mx-auto my-2 dash-box">
       <div class="row">
         <div class="col-4">
            <img src="../images/admin.png" alt="" width="70px" height="70px">
         </div>
         <div class="col-8">
            <h3>Professors</h3>
            <hr>
            <strong><?= count($count_pro) ?></strong>
         </div>
       </div>
     </div>
   </div>
   <div class="row my-3">
    <div class="col-md-12 col-lg-6 mx-auto">
      <div id="columnchart_values" style="width: 100%; height: 400px;"></div>
    </div>
    <div class="col-lg-6 col-md-12 mx-auto">
     <div id="curve_chart" style="width: 100%; height: 400px"></div>
    </div>
   </div>
   <div class="row my-3">
     <div class="col-lg-6 col-md-12 px-3">
      <div class="card">
        <div class="card-header">
          <h3>Admin List</h3>
        </div>
        <div class="card-body">
        <ul class="list-group">
            <?php foreach($professors as $pro): ?>
              <li class="list-group-item">
                <a href="professor_details.php?id=<?= $pro['id'] ?>" class="text-decoration-none d-flex justify-content-between">
                  <img src="../storage/images/<?= $pro['photo'] ?>" alt="" class="rounded-circle" width="70px" height="70px">
                  <b class="my-4"><?= $pro['name'] ?></b>
                  <b class="my-4">Professor</b>
                </a>
              </li>
            <?php endforeach ?>
            <?php foreach($teachers as $tea): ?>
              <li class="list-group-item">
                <a href="teacher_details.php?id=<?= $tea['id'] ?>" class="text-decoration-none d-flex justify-content-between">
                  <img src="../storage/images/<?= $tea['photo'] ?>" alt="" class="rounded-circle" width="70px" height="70px">
                  <b class="my-4"><?= $tea['name'] ?></b>
                  <b class="my-4">Teacher</b>
                </a>
              </li>
            <?php endforeach ?>
            <?php foreach($students as $stu): ?>
              <li class="list-group-item">
                <a href="student_details.php?id=<?= $stu['id'] ?>" class="text-decoration-none d-flex justify-content-between">
                  <img src="../storage/images/<?= $stu['photo'] ?>" alt="" class="rounded-circle" width="70px" height="70px">
                  <b class="my-4"><?= $stu['name'] ?></b>
                  <b class="my-4">Student</b>
                </a>
              </li>
            <?php endforeach ?>
          </ul>
        </div>
      </div>
     </div>
     <div class="col-lg-6 col-md-12 pr-3">
        <div id="chart_div" style="width: 700px; height: 500px;"></div>
     </div>
   </div>
 </div>

 <?php include "app/footer.php"; ?>

 <script>
        google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart1);
        google.charts.setOnLoadCallback(drawChart2);

    function drawChart1() {
      var data = google.visualization.arrayToDataTable([
        ["Year", "Count", { role: "style" } ],
        ["First", <?=count($first) ?>, "blue"],
        ["Second", <?=count($second) ?>, "red"],
        ["Third", <?=count($third) ?>, "green"],
        ["Fouth", <?=count($fourth) ?>, "color: #e5e4e2"],
        ["Fifth", <?=count($fifth) ?>, "color: #000"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Students amount of each Years Chart",
        // width: 700,
        // height: 500,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }

      function drawChart2() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Credit Rate', 'Expenses'],
          ['2018',  250,      240],
          ['2019',  250,      180],
          ['2020',  250,       220],
          ['2021',  250,      250]
        ]);

        var options = {
          title: 'Achivement Rate',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }

      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Month', 'English', 'Calculus', 'Programming', 'SE', 'Ai', 'Average'],
          ['2021/06',  165,      938,         522,             998,           450,      614.6],
          ['2021/07',  135,      1120,        599,             1268,          288,      682],
          ['2021/08',  157,      1167,        587,             807,           397,      623],
          ['2021/09',  139,      110,        615,             968,           215,      609.4],
        ]);

        var options = {
          title : 'Examination in Second Semester',
          vAxis: {title: 'Rate'},
          hAxis: {title: 'Month'},
          seriesType: 'bars',
          series: {5: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }


    </script>
