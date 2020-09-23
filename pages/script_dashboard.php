<script>
var calendarEl = document.getElementById('calendar');
var calendar = new FullCalendar.Calendar(calendarEl, {
    plugins: ['dayGrid', 'timeGrid', 'list', 'interaction'],
    header: {
        left: 'today',
        center: 'title',
        right: 'prev,next'
    },
    buttonText: {
        today: 'วันนี้'
    },
    locale: 'th',
    hiddenDays: [0, 6],
    navLinks: true,
    eventLimit: true,
    events: [<?php foreach($events as $event) :
        $s = $event['emp_name'];
        $t = explode(" ", $s);
        if ($event['leave_type'] == 'sick') {
            $lt = 'ลาป่วย';
        } else if ($event['leave_type'] == 'busy') {
            $lt = 'ลากิจ';
        } else if ($event['leave_type'] == 'vacation') {
            $lt = 'ลาพักผ่อน';
        } else {
            $lt = 'ลาคลอด/ดูแลภรรยา';
        }
        $start = explode(" ", $event['leave_start']);
        $end = explode(" ", $event['leave_end']);
        if ($start[1] == '00:00:00') {
            $start = $start[0];
        } else {
            $start = $event['leave_start'];
        }
        if ($end[1] == '00:00:00') {
            $end = $end[0];
        } else {
            $end = $event['leave_end'];
        } ?> {
            id: '<?=$event['leave_id '];?>',
            title: '<?=$t[0]." : ".$lt;?>',
            start: '<?=$start;?>',
            end: '<?=$end;?>',
            color: 'green',
            textColor: 'white',
        }, <?php endforeach; ?>
    ],
});
calendar.render();

// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '"Kanit"';
Chart.defaults.global.defaultFontColor = '#292b2c';
var ctx = document.getElementById('leaveChart');
var leaveChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['ลากิจ', 'ลาป่วย', 'ลาพักผ่อน', 'ลาคลอด'],
        datasets: [{
            label: 'สถิติการลา (ประจำวัน)',
            data: [<?=$chart['count_busy']?>, <?=$chart['count_sick']?>, <?=$chart['count_vacation']?>, <?=$chart['count_mate']?>],
            backgroundColor: 'orange',
            borderColor: 'orange',
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

var ctx = document.getElementById('workChart');
var workChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['เข้าสาย', 'เข้าปกติ/เวรเช้า','เวรบ่าย','เวรดึก'],
        datasets: [{
            label: 'สถิติการเข้างาน (ประจำวัน)',
            data: [<?=$count_late?>, <?=$tchart['count_normal']?>, <?=$tchart['count_early']?>, <?=$tchart['count_night']?>],
            backgroundColor: 'green',
            borderColor: 'green',
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

$(function() {
    $('[data-toggle="tooltip"]').tooltip()
})
</script>