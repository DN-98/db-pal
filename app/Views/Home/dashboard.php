<html lang="id" class="light">
<?php

use App\Models\MainModel;

if (isset($_GET['cat'])) {
    $cat = $_GET['cat'];
} else $cat = "voltage";

foreach ($today_data as $row)
    $nilai_data[] = $row[ucfirst($cat)];


if(!(isset($nilai_data)))
    $nilai_data = [0,0];

if (isset($_GET["date_filter"])) {
    $date_filter = $_GET["date_filter"];
} else {
    $date_filter = $tgl;
}
    $model = new MainModel();

?>

<script>
    const label_waktu = [<?= $label['waktu'][1] ?>]
    const data_tabel = [<?= $label[$cat][1] ?>]
    const ext_data = "<?= $label[$cat][0] ?>"
</script>


<!-- BEGIN: Content -->
<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
        <!-- BEGIN: General Report -->
        <div class="col-span-12 mt-8">
            <div class="intro-y flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-5">
                    Machine Maintenance Report
                </h2>
                <a href="" class="ml-auto flex text-theme-1 dark:text-theme-10"> <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
            </div>
            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <div class="report-box zoom-in" style="height: 200px;">
                        <div class="box p-5" style="height: 200px;">
                            <div style="position:absolute; top: 150px;" class="text-base text-gray-600 mt-2">Time</div>
                            <div class="flex">
                                <i data-feather="clock" class="report-box__icon text-theme-10"></i>
                                <!-- <div class="ml-auto">
                                    <i data-feather="clock" class="report-box__icon text-theme-10"></i>
                                    <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer" title="33% Higher than last month"> 33% <i data-feather="chevron-up" class="w-4 h-4"></i> </div>
                                </div> -->
                            </div>

                            <div class="text-2xl text-center text-theme-20 font-bold leading-5  mt-3" id="reload1">

                            </div>
                            <div class="text-xl text-center font-bold leading-8 mt-2 mb-3" id="  reload2">
                                <?php
                                echo $hari_indo['D'] . ", " . $hari_indo['d'] . " " . $hari_indo['M'] . " " . $hari_indo['y'] . "<br>";
                                ?>
                                <div id="MyClock" onload="showTime()"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <div class="report-box zoom-in" style="height: 200px;">
                        <div class="box p-5" style="height: 200px;">
                            <div style="position:absolute; top: 150px;" class="text-base text-gray-600 mt-2">Machine Status</div>
                            <div class="flex">
                                <i data-feather="power" class="report-box__icon text-theme-11"></i>
                                <div class="ml-auto">
                                    <!--  <div class="report-box__indicator bg-theme-6 tooltip cursor-pointer" title="2% Lower than last month"> 2% <i data-feather="chevron-down" class="w-4 h-4"></i> </div> -->
                                </div>
                            </div>
                            <div>
                                <img id="machine-on" src="<?= base_url()?>/images/on2.png" style="width:85px;margin:0 auto; display:none;" alt="">
                                <img id="machine-off" src="<?= base_url()?>/images/off2.png" style="width:85px;margin:0 auto; display:none;" alt="">
                                <!-- <?php
                                if (isset($recent_data->Current)) {
                                    if($recent_data->Current != 0)
                                        echo '<img src= "' . base_url() . '/images/on2.png" style="width:85px;margin:0 auto;" />';
                                    else echo '<img src= "' . base_url() . '/images/off2.png" style="width:85px;margin:0 auto;" />';
                                } else {
                                    echo '<img src= "' . base_url() . '/images/off2.png" style="width:85px;margin:0 auto;" />';
                                }
                                ?> -->
                            </div>
                            <!-- <div class="text-3xl font-bold leading-8 mt-6">3.521</div> -->
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <div class="report-box zoom-in" style="height: 200px;">
                        <div class="box p-5" style="height: 200px;">
                            <div style="position:absolute; top: 150px;" class="text-base text-gray-600 mt-2">Today Work</div>
                            <div class="flex">
                                <i data-feather="monitor" class="report-box__icon text-theme-12"></i>
                                <div class="ml-auto">
                                    <!-- <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer" title="12% Higher than last month"> 12% <i data-feather="chevron-up" class="w-4 h-4"></i> </div> -->
                                </div>
                            </div>
                            <div id="today-work" class="text-xl font-bold leading-8 mt-6" onload="show_data_today()" ></div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <div class="report-box zoom-in" style="height: 200px;">
                        <div class="box p-5" style="height: 200px;">
                            <div class="flex">
                                <i data-feather="user" class="report-box__icon text-theme-9"></i>
                                <div class="ml-auto">
                                    <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer" title="Machine has been used <?= $total_work[0] / 500 * 100 . " %"; ?> of limit"> <?= $total_work[0] / 500 * 100 . " %"; ?> <i data-feather="chevron-up" class="w-4 h-4"></i> </div>
                                </div>
                            </div>
                            <div id="gauge" style="height:150px"></div>
                            <div class="text-base text-gray-600 mt-1"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: General Report -->
        <!-- BEGIN: Machine Report -->
        <div class="col-span-12 lg:col-span-12 mt-8">
            <div class="intro-y block sm:flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-5">
                    Machine Report
                </h2>
                <form action="" method="get">
                    <div class="sm:ml-auto mt-3 sm:mt-0 relative text-gray-700 dark:text-gray-300">
                        <i data-feather="calendar" class="w-4 h-4 z-10 absolute my-auto inset-y-0 ml-3 left-0"></i>
                        <input name=date_filter type="text" class="datepicker input w-full sm:w-56 box pl-10" data-single-mode="true" value="<?= $date_filter ?>">
                        <button class="button mr-1 mb-2 bg-theme-1 text-white" type="submit">Filter</button>
                    </div>
                </form>
            </div>
            <div class="intro-y box p-5 mt-12 sm:mt-5">
                <div class="flex flex-col xl:flex-row xl:items-center">
                    <div class="flex">
                        <div>
                            <div class="text-theme-20 dark:text-gray-300 text-lg xl:text-xl font-bold"><?= max($nilai_data) . " " . $label[$cat][0] ?></div>
                            <div class="text-gray-600 dark:text-gray-600">Highest</div>
                        </div>
                        <div class="w-px h-12 border border-r border-dashed border-gray-300 dark:border-dark-5 mx-4 xl:mx-6"></div>
                        <div>
                            <div class="text-gray-600 dark:text-gray-600 text-lg xl:text-xl font-medium"><?= min($nilai_data) . " " . $label[$cat][0] ?></div>
                            <div class="text-gray-600 dark:text-gray-600">Lowest</div>
                        </div>
                    </div>
                    <div class="dropdown xl:ml-auto mt-5 xl:mt-0">
                        <button class="dropdown-toggle button font-normal border dark:border-dark-5 text-white dark:text-gray-300 relative flex items-center text-gray-700">
                            <?php
                            if (isset($_GET['cat']))
                                echo ucfirst($_GET['cat']);
                            else echo "Voltage"; ?>
                            <i data-feather="chevron-down" class="w-4 h-4 ml-2"></i> </button>
                        <div class="dropdown-box w-40">
                            <div class="dropdown-box__content box dark:bg-dark-1 p-2 overflow-y-auto h-32"> <a href="?cat=voltage" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">Voltage</a> <a href="?cat=current" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">Current</a> <a href="?cat=power" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">Power</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="report-chart">
                    <canvas id="report-line-chart" height="160" class="mt-6"></canvas>
                </div>
            </div>
        </div>
        <!-- END: Machine Report -->
        
        </div>
    </div>
</div>
</div>
<!-- END: Content -->
</div>

<!-- BEGIN: JS Assets-->
<script src="<?php base_url() ?>/js/app.js"></script>
<script src="<?php base_url() ?>/js/justgage/raphael-2.1.4.min.js"></script>
<script src="<?php base_url() ?>/js/justgage/justgage.js"></script>
<script src="<?php base_url() ?>/js/justgage/example/justgage.js"></script>
<!-- END: JS Assets-->

<script>
    var total_gauge = new JustGage({
        id: "gauge",
        value: <?= $total_work[0] ?>,
        min: 0,
        max: 500,
        title: "Total Kerja",
        label: "jam"
    });

    function showTime(){
        var date = new Date();
        var h = date.getHours();
        var m = date.getMinutes();
        var s = date.getSeconds();
        var a = "AM";
        if(h == 0){
            h = 12;
        }
        if(h>12){
            a = "PM"
            h = h-12;
        }

        h = (h<10) ? "0" + h : h;
        m = (m<10) ? "0" + m : m;
        s = (s<10) ? "0" + s : s;

        var time = `${h}:${m}:${s} ${a}`;

        document.getElementById("MyClock").innerText = time;
        // var statusMachine = <?=$model->getStatusMachine()?>;
        // if(statusMachine===1) {
        //     document.getElementById("machine-on").style.display = "block";
        // } else document.getElementById("machine-off").style.display = "block";
        show_data_today();
        show_data_total();
        show_status_machine();

        // var todayWork = "<?=$model->getTodayWork();?>";
        // document.getElementById("today-work").innerText = todayWork;
        setTimeout(showTime, 1000);
        
    }
    
    showTime();

    function show_data_today(){
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
        document.getElementById("today-work").innerHTML = this.responseText;
    }
    xhttp.open("GET", "<?= base_url() . "/get-data-today"?>");
    xhttp.send();
    }

    function show_data_total(){
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            var x = parseInt(this.responseText);
            total_gauge.refresh(x);
            document.getElementById("test").innerHTML = this.responseText;
    }
    xhttp.open("GET", "<?= base_url() . "/get-data-total"?>");
    xhttp.send();
    }

    function show_status_machine(){
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            var statusMachine = parseInt(this.responseText);
            if(statusMachine===1) {
                document.getElementById("machine-off").style.display = "none";
                document.getElementById("machine-on").style.display = "block";
            } else {
                document.getElementById("machine-off").style.display = "block";
                document.getElementById("machine-on").style.display = "none";
            }
    }
    xhttp.open("GET", "<?= base_url() . "/get-status-machine"?>");
    xhttp.send();
    }

    // function show_report_line_chart(){
    //     const xhttp = new XMLHttpRequest();
    //     xhttp.onload = function() {
    //         var statusMachine = parseInt(this.responseText);
    //         if(statusMachine===1) {
    //             document.getElementById("machine-off").style.display = "none";
    //             document.getElementById("machine-on").style.display = "block";
    //         } else {
    //             document.getElementById("machine-off").style.display = "block";
    //             document.getElementById("machine-on").style.display = "none";
    //         }
    // }
    // xhttp.open("GET", "<?= base_url() . "/show-report-line-chart"?>")
    // xhttp.send();
    // }

    show_data_today();
    show_data_total();
    show_status_machine();
</script>

</html>