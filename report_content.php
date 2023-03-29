<?php
require_once "DB.php";
$db = new DBHelper();
$i = 1;

$hospId = $_GET['hospId'];


$rpt = $db->getRows("hlr_equiptReport,hlr_report_status,hlr_equipments,hlr_hospitals",
array(
    "select"=>("hlr_equiptReport.hospId,hlr_equipments.name,statusName"),
       
    "table_combination"=>array(
        "hlr_equiptReport.hospId" => "hlr_hospitals.hospId",
        "hlr_equiptReport.equipId" => "hlr_equipments.equipmentId",
        "hlr_equiptReport.statusId" => "hlr_report_status.statusId",

    ),
    "where"=>array("hlr_equiptReport.hospId"=>$hospId)
    )
);

?>
<div class="card-body" id="reportContent">
<table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
    <th>sn</th>
    <th>Equipment Name</th>
    <th>Status Report</th>
    
    </tr>
    </thead>
    <tbody>
        <tr>
            <?php
            if (!empty($rpt)) {
                foreach ($rpt as $u) { ?>

                    <td><?= $i++; ?></td>
                    <td><?= $u["name"]; ?></td>
                    <td><?= $u["statusName"]; ?></td>
                
        
                </tr>
        <?php
                }
            }else{?>
                <td colspan="4"><center>This Hospital has no report</center></td>
                <?php
            }
            ?>
    </tbody>

</table>
</div>