<div class="card-body">
    <form id="filter" action="?menu=Worktime-Report" method="post">
        <h5><i class="fa fa-search"></i> Filter Report</h5>
        <div class="form-row">
            <div class="col-md-4">
                <label>เลือกเดือน</label>
                <select name="wmonth" class="custom-select" required>
                    <option value="" selected>เลือกเดือน</option>
                    <option value="01">- มกราคม</option>
                    <option value="02">- กุมภาพันธ์</option>
                    <option value="03">- มีนาคม</option>
                    <option value="04">- เมษายน</option>
                    <option value="05">- พฤษภาคม</option>
                    <option value="06">- มิถุนายน</option>
                    <option value="07">- กรกฏาคม</option>
                    <option value="08">- สิงหาคม</option>
                    <option value="09">- กันยายน</option>
                    <option value="10">- ตุลาคม</option>
                    <option value="11">- พฤศจิกายน</option>
                    <option value="12">- ธันวาคม</option>
                </select>
            </div>
            <div class="col-md-4">
                <label>เลือกฝ่าย/กลุ่มงาน</label>
                <select name="wdept" class="custom-select" required>
                    <option value="0" selected>เลือกทั้งหมด</option>
                    <?php foreach ($fetchDept as $ds){ echo "<option value='".$ds['dept_id']."'> - ".$ds['dept_name']."</option>";} ?>
                </select>
            </div>
            <div class="col-md-3">
                <label>เลือกประเภทบุคลากร</label>
                <select name="wtype" class="custom-select" required>
                    <option value="0" selected>เลือกทั้งหมด</option>
                    <?php foreach ($fetchJob as $js){
						echo "<option value='".$js['emp_job_id']."'> - ".$js['emp_job_name']."</option>";}
					?>
                </select>
            </div>
            <div class="col-md-1">
                <label></label>
                <button type="submit" class="btn btn-block btn-default"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </form>
</div>