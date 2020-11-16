<?php
$thai_month_arr=array(
    "0"=>"",
    "1"=>"มกราคม",
    "2"=>"กุมภาพันธ์",
    "3"=>"มีนาคม",
    "4"=>"เมษายน",
    "5"=>"พฤษภาคม",
    "6"=>"มิถุนายน", 
    "7"=>"กรกฎาคม",
    "8"=>"สิงหาคม",
    "9"=>"กันยายน",
    "10"=>"ตุลาคม",
    "11"=>"พฤศจิกายน",
    "12"=>"ธันวาคม"                 
);
?>
<div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h5 class="card-title"><i class="far fa-file-alt"></i> รายงานบันทึกลงเวลาเข้างาน</h5>
            </div>
        </div>
    </div>
    <div class="card-body">
        <?php include ('components/breadcrumb.php'); ?>
        <form method="post">
            เลือกเดือน
            <select id="month_check" class="select-single" name="month_check">
                <?php for($i=1;$i<=12;$i++){ ?>
                <option value="<?=sprintf("%02d",$i)?>"
                    <?=((isset($_POST['month_check']) && $_POST['month_check']==sprintf("%02d",$i)) || (!isset($_POST['month_check']) && date("m")==sprintf("%02d",$i)))?" selected":""?>>
                    <?=$thai_month_arr[$i]?>
                </option>
                <?php } ?>
            </select>
            ปี
            <select id="year_check" class="select-single" name="year_check">
                <?php $data_year=intval(date("Y",strtotime("-2 year")));?>
                <?php for($i=0;$i<=5;$i++){ ?>
                <option value="<?=$data_year+$i?>"
                    <?=((isset($_POST['year_check']) && $_POST['year_check']==intval($data_year+$i)) || (!isset($_POST['year_check']) && date("Y")==intval($data_year+$i)))?" selected":""?>>
                    <?=intval($data_year+$i)+543?>
                </option>
                <?php } ?>
            </select>
            <button id="showData" name="showData" class="btn btn-sm btn-dark" type="submit"><i
                    class="fa fa-search"></i></button>
        </form>
        <div class="table-responsive">
            <?php
                $date_data_check=$_POST['year_check']."-".$_POST['month_check']."-";
                $num_month_day=date("t",strtotime($_POST['year_check']."-".$_POST['month_check']."-01"));
                $use_month_check = $date_data_check;        
                $start_date_check = $date_data_check."01";
                $end_date_check = $date_data_check.$num_month_day;

                $sql = "SELECT *,DATE_FORMAT(work_time,'%Y-%m-%d') as date_s 
                        FROM tb_worktime
                        LEFT JOIN tb_employee ON tb_worktime.emp_barcode = tb_employee.emp_barcode
                        WHERE tb_worktime.work_time >= '".$start_date_check."' AND tb_worktime.work_time <= '".$end_date_check."' ORDER BY tb_employee.emp_barcode ASC";
                // echo $sql;
                $result = $mysqli->query($sql);
                if($result){
                    while($row = $result->fetch_assoc()){
                        if(isset($data_arr[$row['emp_name']][$row['date_s']])){
                            $data_arr[$row['emp_name']][$row['date_s']]+=1;
                        }else{
                            $data_arr[$row['emp_name']][$row['date_s']]=1;
                        }
                    }
                }
            ?>
            <table id="reportTable" class="compact table table-bordered nowrap table-striped"
                style="width:100%;font-size:14px;">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="">ชื่อ-สกุล</th>
                        <?php for($i=1;$i<=$num_month_day;$i++){?>
                        <?php 
                        $days = date('w', strtotime("".$_POST['year_check']."-".$_POST['month_check']."-".$i.""));
                            if($days == 0 or $days == 6){
                                $bg = "red";
                                $fg = "white";
                            }else{
                                $bg = "";
                                $fg = "";
                            }
                        ?>
                        <th class="text-center" style="background-color:<?=$bg;?>;color:<?=$fg;?>;">
                            <?=$i;?>
                        </th>
                        <?php } ?>
                    </tr>
                </thead>
                <?php
                    if($data_arr){
                        $num = 0;
                        $total_data = count($data_arr);
                            foreach($data_arr as $k_item=>$v_data){
                            $num++;
                    ?>
                <tr>
                    <td class="text-center"><?=$num;?></td>
                    <td><?=$k_item?></td>
                    <?php for($i=0;$i<$num_month_day;$i++){ ?>
                    <td class="text-center">
                        <?php
                            $key_date = date("Y-m-d",strtotime($start_date_check." +$i day"));
                            if(isset($v_data["$key_date"])){
                                if($v_data["$key_date"]==1){
                                    echo "<i class='fa fa-check text-success'></i>";
                                }else{
                                    echo "<i class='far fa-clock text-danger'></i>";
                                }
                            }
                        ?>
                    </td>
                    <?php } ?>
                </tr>
                <?php } } ?>
            </table>
            <i class='fa fa-check text-success'></i> : เข้างานปกติ / เวรเช้า <br>
            <i class='far fa-clock text-danger'></i> : ขึ้นเวร / OT (เวรบ่าย , เวรดึก)
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.select-single').select2({
            width: '10%'
        });
    });
</script>