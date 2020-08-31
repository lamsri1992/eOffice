<div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h5 class="card-title ">ระบบคลังพัสดุ</h5>
                <span class="card-title ">โรงพยาบาลวัดจันทร์เฉลิมพระเกียรติ ๘๐ พรรษา</span>
            </div>
        </div>
    </div>
    <div class="card-body row">
        <div class="col-md-6">
            <form class="form-horizontal">
                <div class="form-group row">
                    <label class="col-md-10 control-label" for="selectbasic">กราฟแสดงสรุปยอดการเบิก (ตามปีงบประมาณ)</label>
                    <div class="col-md-2">
                        <select name="selectbasic" class="form-control">
                            <option value="2563">2563</option>
                            <option value="2562">2562</option>
                            <option value="2561">2561</option>
                        </select>
                    </div>
                </div>
            </form>
            <canvas id="myChart"></canvas>
        </div>
        <div class="col-md-6">
            <canvas id="myChart"></canvas>
        </div>
    </div>
</div>
<script>
var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['ตุลาคม', 'พฤศจิกายน', 'ธันวาคม', 'มกราคม', 'กุมภาพันธ์', 'มีนาคม'],
        datasets: [{
            label: 'ยอดการเบิก (บาท)',
            data: [12000, 19000, 3000, 5000, 14000, 22000, 35000],
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>