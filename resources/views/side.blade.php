<div id="sidebar">
    <div class="sidebar__title">
        <div class="sidebar__img">
            <h1>Stock Application</h1>
        </div>
        <i
            onclick="closeSidebar()"
            class="fa fa-times"
            id="sidebarIcon"
            aria-hidden="true"
        ></i>
    </div>

    <div class="sidebar__menu">
        <div class="sidebar__link active_menu_link">
            <i class="fa fa-home"></i>
            <a href="#">Dashboard</a>
        </div>
        <h2>Menu</h2>
        <div class="sidebar__link">
            <i class="fa fa-user-secret" aria-hidden="true"></i>
            <a href="{{ url('fabrication_pf') }}">Fabrication PF</a>
        </div>
        <div class="sidebar__link">
            <i class="fa fa-building-o"></i>
            <a href="{{ url('prevision') }}">Ventes Prévision</a>
        </div>
        <div class="sidebar__link">
            <i class="fa fa-building-o"></i>
            <a href="{{ url('stock_pf') }}">Stock PF</a>
        </div>
        <div class="sidebar__link">
            <i class="fa fa-building-o"></i>
            <a href="{{ url('stock_pfsf') }}">Stock PFSF</a>
        </div>
        <div class="sidebar__link">
            <i class="fa fa-building-o"></i>
            <a href="{{ url('stock_pfvr') }}">Stock PFVR</a>
        </div>
        <div class="sidebar__link">
            <i class="fa fa-building-o"></i>
            <a href="{{ url('stocks_composant') }}">Stock Composant</a>
        </div>
        <div class="sidebar__link">
            <i class="fa fa-building-o"></i>
            <a href="{{ url('bc_composant') }}">BC Composant</a>
        </div>
        <!--
        <div class="sidebar__link">
            <i class="fa fa-wrench"></i>
            <a href="#">Employee Management</a>
        </div>
        <div class="sidebar__link">
            <i class="fa fa-archive"></i>
            <a href="#">Warehouse</a>
        </div>
        <div class="sidebar__link">
            <i class="fa fa-handshake-o"></i>
            <a href="#">Contracts</a>
        </div>
        <h2>LEAVE</h2>
        <div class="sidebar__link">
            <i class="fa fa-question"></i>
            <a href="#">Requests</a>
        </div>
        <div class="sidebar__link">
            <i class="fa fa-sign-out"></i>
            <a href="#">Leave Policy</a>
        </div>
        <div class="sidebar__link">
            <i class="fa fa-calendar-check-o"></i>
            <a href="#">Special Days</a>
        </div>
        <div class="sidebar__link">
            <i class="fa fa-files-o"></i>
            <a href="#">Apply for leave</a>
        </div>
        <h2>PAYROLL</h2>
        <div class="sidebar__link">
            <i class="fa fa-money"></i>
            <a href="#">Payroll</a>
        </div>
        <div class="sidebar__link">
            <i class="fa fa-briefcase"></i>
            <a href="#">Paygrade</a>
        </div>
        <div class="sidebar__logout">
            <i class="fa fa-power-off"></i>
            <a href="#">Log out</a>
        </div>
        !-->
    </div>
</div>

<script>
    // This is for able to see chart. We are using Apex Chart. U can check the documentation of Apex Charts too..
    var options = {
        series: [
            {
                name: "Net Profit",
                data: [44, 55, 57, 56, 61, 58, 63, 60, 66],
            },
            {
                name: "Revenue",
                data: [76, 85, 101, 98, 87, 105, 91, 114, 94],
            },
            {
                name: "Free Cash Flow",
                data: [35, 41, 36, 26, 45, 48, 52, 53, 41],
            },
        ],
        chart: {
            type: "bar",
            height: 250, // make this 250
            sparkline: {
                enabled: true, // make this true
            },
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: "55%",
                endingShape: "rounded",
            },
        },
        dataLabels: {
            enabled: false,
        },
        stroke: {
            show: true,
            width: 2,
            colors: ["transparent"],
        },
        xaxis: {
            categories: ["Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct"],
        },
        yaxis: {
            title: {
                text: "$ (thousands)",
            },
        },
        fill: {
            opacity: 1,
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return "$ " + val + " thousands";
                },
            },
        },
    };

    var chart = new ApexCharts(document.querySelector("#apex1"), options);
    chart.render();

    // Sidebar Toggle Codes;

    var sidebarOpen = false;
    var sidebar = document.getElementById("sidebar");
    var sidebarCloseIcon = document.getElementById("sidebarIcon");

    function toggleSidebar() {
        if (!sidebarOpen) {
            sidebar.classList.add("sidebar_responsive");
            sidebarOpen = true;
        }
    }

    function closeSidebar() {
        if (sidebarOpen) {
            sidebar.classList.remove("sidebar_responsive");
            sidebarOpen = false;
        }
    }

</script>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap");

    .sidebar__title {
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: #f3f4f6;
        margin-bottom: 30px;
        /* color: #E85B6B; */
    }

    .sidebar__img {
        display: flex;
        align-items: center;
    }

    .sidebar__title > div > img {
        width: 75px;
        object-fit: contain;
    }

    .sidebar__title > div > h1 {
        font-size: 18px;
        display: inline;
    }

    .sidebar__title > i {
        font-size: 18px;
        display: none;
    }

    .sidebar__menu > h2 {
        color: #3ea175;
        font-size: 16px;
        margin-top: 15px;
        margin-bottom: 5px;
        padding: 0 10px;
        font-weight: 700;
    }

    .sidebar__link {
        color: #f3f4f6;
        padding: 10px;
        border-radius: 3px;
        margin-bottom: 5px;
    }

    .active_menu_link {
        background: rgba(62, 161, 117, 0.3);
        color: #3ea175;
    }

    .active_menu_link a {
        color: #3ea175 !important;
    }

    .sidebar__link > a {
        text-decoration: none;
        color: #a5aaad;
        font-weight: 700;
    }

    .sidebar__link > i {
        margin-right: 10px;
        font-size: 18px;
    }

    .sidebar__logout {
        margin-top: 20px;
        padding: 10px;
        color: #e65061;
    }

    .sidebar__logout > a {
        text-decoration: none;
        color: #e65061;
        font-weight: 700;
        text-transform: uppercase;
    }

    .sidebar__logout > i {
        margin-right: 10px;
        font-size: 18px;
    }

    .sidebar_responsive {
        display: inline !important;
        z-index: 9999 !important;
        left: 0 !important;
        position: absolute;
    }

</style>
