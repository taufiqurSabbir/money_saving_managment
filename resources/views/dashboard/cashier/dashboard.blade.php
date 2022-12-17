@extends('dashboard.layouts.usermaster')

@section('user_name',$user_data->name)
@section('phone',$user_data->phone)
@section('profile_image',$user_data->profile_picture)

@section('collapsed1','');
@section('sidebar_name1','Dashboard')
@section('link1',route('admin.dashboard'))
@section('icon1','bi bi-grid')

@section('page_title','Dashboard')

@section('collapsed2','collapsed');
@section('sidebar_name2','All Users')
@section('link2',route('all.user'))
@section('icon2','bi bi-person-check')

@section('collapsed3','collapsed');
@section('sidebar_name3','Add Years')
@section('link3','Dashboard')
@section('icon3','bi bi-calendar-check')

@section('collapsed4','collapsed');
@section('sidebar_name4','Transaction')
@section('link4','Dashboard')
@section('icon4','bi bi-cash-coin')

@section('collapsed5','collapsed');
@section('sidebar_name5','Notice')
@section('link5','Dashboard')
@section('icon5','bi bi-bell')

@section('collapsed6','collapsed');
@section('sidebar_name6','Asset')
@section('link6','Dashboard')
@section('icon6','bi bi-plus-circle')

@section('collapsed7','collapsed');
@section('sidebar_name7','Expense')
@section('link7','Dashboard')
@section('icon7','bi bi-dash-circle')

@section('collapsed8','collapsed');
@section('sidebar_name8','Member Cancel Request')
@section('link8','Dashboard')
@section('icon8','bi bi-person-dash')

@section('collapsed9','collapsed');
@section('sidebar_name9','Logout')
@section('link9','Dashboard')
@section('icon9','bi bi-box-arrow-left')



@section('content')
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
            <div class="row">

                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">


                        <div class="card-body">
                            <h5 class="card-title">Total Collected <span></span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-cash-coin"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>9000৳</h6>

                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->

                <!-- Revenue Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card revenue-card">


                        <div class="card-body">
                            <h5 class="card-title">Total User</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-person"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>10</h6>


                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Revenue Card -->


                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card due">


                        <div class="card-body">
                            <h5 class="card-title">Amount Due</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-question-octagon"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>10</h6>


                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Revenue Card -->

                <!-- Customers Card -->
                <div class="col-xxl-4 col-xl-12">

                    <div class="card info-card asset">


                        <div class="card-body">
                            <h5 class="card-title">Asset</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-shield-fill-plus"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>3</h6>


                                </div>
                            </div>

                        </div>
                    </div>

                </div><!-- End Customers Card -->

                <div class="col-xxl-4 col-xl-12">

                    <div class="card info-card expense">


                        <div class="card-body">
                            <h5 class="card-title">Expense</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-patch-minus-fill"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>3</h6>


                                </div>
                            </div>

                        </div>
                    </div>

                </div><!-- End Customers Card -->


                <div class="col-xxl-4 col-xl-12">

                    <div class="card info-card loan">


                        <div class="card-body">
                            <h5 class="card-title">Loan Request</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-bank"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>3</h6>


                                </div>
                            </div>

                        </div>
                    </div>

                </div><!-- End Customers Card -->

                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title">Total Collection</h5>

                            <!-- Line Chart -->
                            <div id="save_report"></div>

                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    new ApexCharts(document.querySelector("#save_report"), {
                                        series: [{
                                            name: 'Inflation',
                                            data: [2.3, 3.1, 4.0, 10.1, 4.0, 3.6, 3.2, 2.3, 1.4, 0.8, 0.5, 0.2]
                                        }],
                                        chart: {
                                            height: 350,
                                            type: 'bar',
                                        },
                                        plotOptions: {
                                            bar: {
                                                borderRadius: 10,
                                                dataLabels: {
                                                    position: 'top', // top, center, bottom
                                                },
                                            }
                                        },

                                        dataLabels: {
                                            enabled: true,
                                            formatter: function (val) {
                                                return val + "%";
                                            },
                                            offsetY: -20,
                                            style: {
                                                fontSize: '12px',
                                                colors: ["#304758"]
                                            }
                                        },
                                        xaxis: {
                                            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                                            position: 'top',
                                            axisBorder: {
                                                show: false
                                            },
                                            axisTicks: {
                                                show: false
                                            },
                                            crosshairs: {
                                                fill: {
                                                    type: 'gradient',
                                                    gradient: {
                                                        colorFrom: '#D8E3F0',
                                                        colorTo: '#BED1E6',
                                                        stops: [0, 100],
                                                        opacityFrom: 0.4,
                                                        opacityTo: 0.5,
                                                    }
                                                }
                                            },
                                            tooltip: {
                                                enabled: true,
                                            }
                                        },
                                        yaxis: {
                                            axisBorder: {
                                                show: false
                                            },
                                            axisTicks: {
                                                show: false,
                                            },
                                            labels: {
                                                show: false,
                                                formatter: function (val) {
                                                    return val + "%";
                                                }
                                            }

                                        },
                                        title: {
                                            text: 'Monthly Monthly Collection',
                                            floating: true,
                                            offsetY: 330,
                                            align: 'center',
                                            style: {
                                                color: '#444'
                                            }
                                        }
                                    }).render();
                                });
                            </script>


                        </div>

                    </div>
                </div><!-- End Reports -->

                <!-- Reports -->
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title">Last Transaction</h5>

                            <!-- Line Chart -->
                            <div id="reportsChart">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">phone</th>
                                        <th scope="col">amount</th>
                                        <th scope="col">Month</th>
                                        <th scope="col">Purpose</th>
                                        <th scope="col">status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>@mdo</td>
                                        <td>
                                            <span class="badge bg-success">Approved</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>



                        </div>

                    </div>
                </div><!-- End Reports -->

                <!-- Recent Sales -->
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title">Amount Due</h5>

                            <!-- Line Chart -->
                            <div id="reportsChart">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">phone</th>
                                        <th scope="col">amount</th>
                                        <th scope="col">Month</th>
                                        <th scope="col">Purpose</th>
                                        <th scope="col">status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>@mdo</td>
                                        <td>
                                            <span class="badge bg-success">Approved</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>



                        </div>

                    </div>
                </div><!-- End Reports --><!-- End Recent Sales -->

                <!-- Top Selling -->
                <div class="col-12">
                    <div class="card top-selling overflow-auto">

                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>

                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>

                        <div class="card-body pb-0">
                            <h5 class="card-title">Top Selling <span>| Today</span></h5>

                            <table class="table table-borderless">
                                <thead>
                                <tr>
                                    <th scope="col">Preview</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Sold</th>
                                    <th scope="col">Revenue</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row"><a href="#"><img src="assets/img/product-1.jpg" alt=""></a></th>
                                    <td><a href="#" class="text-primary fw-bold">Ut inventore ipsa voluptas nulla</a></td>
                                    <td>$64</td>
                                    <td class="fw-bold">124</td>
                                    <td>$5,828</td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="#"><img src="assets/img/product-2.jpg" alt=""></a></th>
                                    <td><a href="#" class="text-primary fw-bold">Exercitationem similique doloremque</a></td>
                                    <td>$46</td>
                                    <td class="fw-bold">98</td>
                                    <td>$4,508</td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="#"><img src="assets/img/product-3.jpg" alt=""></a></th>
                                    <td><a href="#" class="text-primary fw-bold">Doloribus nisi exercitationem</a></td>
                                    <td>$59</td>
                                    <td class="fw-bold">74</td>
                                    <td>$4,366</td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="#"><img src="assets/img/product-4.jpg" alt=""></a></th>
                                    <td><a href="#" class="text-primary fw-bold">Officiis quaerat sint rerum error</a></td>
                                    <td>$32</td>
                                    <td class="fw-bold">63</td>
                                    <td>$2,016</td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="#"><img src="assets/img/product-5.jpg" alt=""></a></th>
                                    <td><a href="#" class="text-primary fw-bold">Sit unde debitis delectus repellendus</a></td>
                                    <td>$79</td>
                                    <td class="fw-bold">41</td>
                                    <td>$3,239</td>
                                </tr>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div><!-- End Top Selling -->

            </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

            <div class="card">
                <div class="card-body pb-0">
                    <h5 class="card-title">Notice </h5>

                    <div class="news">
                        <div class="post-item clearfix">
                            <h4><a href="#">Amara 20-10-22 tarik rat 10 tai meeing e bosbo</a></h4>
                            <p>Sit recusandae non aspernatur laboriosam. Quia enim eligendi sed ut harum...</p>
                        </div>

                        <div class="post-item clearfix">
                            <h4><a href="#">1 teke 10 tarik er modhe payment korte hbe</a></h4>
                            <p>Illo nemo neque maiores vitae officiis cum eum turos elan dries werona nande...</p>
                        </div>

                        <div class="post-item clearfix">

                            <h4><a href="#">Bank account e saving korte hbe</a></h4>
                            <p>Fugiat voluptas vero eaque accusantium eos. Consequuntur sed ipsam et totam...</p>
                        </div>

                        <div class="post-item clearfix">

                            <h4><a href="#">Loan request accept hbe last 3 month payment tik takle</a></h4>
                            <p>Qui enim quia optio. Eligendi aut asperiores enim repellendusvel rerum cuder...</p>
                        </div>

                        <div class="post-item clearfix">

                            <h4><a href="#">Member request accept only admin </a></h4>
                            <p>Odit ut eveniet modi reiciendis. Atque cupiditate libero beatae dignissimos eius...</p>
                        </div>

                    </div><!-- End sidebar recent posts-->

                </div>
            </div><!-- End News & Updates -->


            <!-- Recent Activity -->
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">Notic <span>| Today</span></h5>

                    <div class="activity">
                        <!-- Pie Chart -->
                        <div id="pieChart" style="min-height: 500px;" class="echart"></div>

                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                echarts.init(document.querySelector("#pieChart")).setOption({
                                    title: {
                                        text: 'Amount Due And Advance Cash',
                                        subtext: '2022',
                                        left: 'center'
                                    },
                                    tooltip: {
                                        trigger: 'item'
                                    },
                                    legend: {
                                        orient: 'vertical',
                                        left: 'left'
                                    },
                                    series: [{
                                        name: 'Access From',
                                        type: 'pie',
                                        radius: '50%',
                                        data: [{
                                            value: 735,
                                            name: 'Direct'
                                        },
                                            {
                                                value: 484,
                                                name: 'Union Ads'
                                            },
                                            {
                                                value: 484,
                                                name: 'Union f'
                                            },

                                        ],

                                    }]
                                });
                            });
                        </script>
                        <!-- End Pie Chart -->


                    </div>

                </div>
            </div><!-- End Recent Activity -->

            <!-- Budget Report -->
            <div class="card">
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Filter</h6>
                        </li>

                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                </div>

                <div class="card-body pb-0">
                    <h5 class="card-title">Budget Report <span>| This Month</span></h5>

                    <div id="budgetChart" style="min-height: 400px;" class="echart"></div>

                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            var budgetChart = echarts.init(document.querySelector("#budgetChart")).setOption({
                                legend: {
                                    data: ['Allocated Budget', 'Actual Spending']
                                },
                                radar: {
                                    // shape: 'circle',
                                    indicator: [{
                                        name: 'Sales',
                                        max: 6500
                                    },
                                        {
                                            name: 'Administration',
                                            max: 16000
                                        },
                                        {
                                            name: 'Information Technology',
                                            max: 30000
                                        },
                                        {
                                            name: 'Customer Support',
                                            max: 38000
                                        },
                                        {
                                            name: 'Development',
                                            max: 52000
                                        },
                                        {
                                            name: 'Marketing',
                                            max: 25000
                                        }
                                    ]
                                },
                                series: [{
                                    name: 'Budget vs spending',
                                    type: 'radar',
                                    data: [{
                                        value: [4200, 3000, 20000, 35000, 50000, 18000],
                                        name: 'Allocated Budget'
                                    },
                                        {
                                            value: [5000, 14000, 28000, 26000, 42000, 21000],
                                            name: 'Actual Spending'
                                        }
                                    ]
                                }]
                            });
                        });
                    </script>

                </div>
            </div><!-- End Budget Report -->

            <!-- Website Traffic -->
            <div class="card">
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Filter</h6>
                        </li>

                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                </div>

                <div class="card-body pb-0">
                    <h5 class="card-title">Website Traffic <span>| Today</span></h5>

                    <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            echarts.init(document.querySelector("#trafficChart")).setOption({
                                tooltip: {
                                    trigger: 'item'
                                },
                                legend: {
                                    top: '5%',
                                    left: 'center'
                                },
                                series: [{
                                    name: 'Access From',
                                    type: 'pie',
                                    radius: ['40%', '70%'],
                                    avoidLabelOverlap: false,
                                    label: {
                                        show: false,
                                        position: 'center'
                                    },
                                    emphasis: {
                                        label: {
                                            show: true,
                                            fontSize: '18',
                                            fontWeight: 'bold'
                                        }
                                    },
                                    labelLine: {
                                        show: false
                                    },
                                    data: [{
                                        value: 1048,
                                        name: 'Search Engine'
                                    },
                                        {
                                            value: 735,
                                            name: 'Direct'
                                        },
                                        {
                                            value: 580,
                                            name: 'Email'
                                        },
                                        {
                                            value: 484,
                                            name: 'Union Ads'
                                        },
                                        {
                                            value: 300,
                                            name: 'Video Ads'
                                        }
                                    ]
                                }]
                            });
                        });
                    </script>

                </div>
            </div><!-- End Website Traffic -->

            <!-- News & Updates Traffic -->
            <div class="card">
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Filter</h6>
                        </li>

                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                </div>

                <div class="card-body pb-0">
                    <h5 class="card-title">News &amp; Updates <span>| Today</span></h5>

                    <div class="news">
                        <div class="post-item clearfix">
                            <img src="assets/img/news-1.jpg" alt="">
                            <h4><a href="#">Nihil blanditiis at in nihil autem</a></h4>
                            <p>Sit recusandae non aspernatur laboriosam. Quia enim eligendi sed ut harum...</p>
                        </div>

                        <div class="post-item clearfix">
                            <img src="assets/img/news-2.jpg" alt="">
                            <h4><a href="#">Quidem autem et impedit</a></h4>
                            <p>Illo nemo neque maiores vitae officiis cum eum turos elan dries werona nande...</p>
                        </div>

                        <div class="post-item clearfix">
                            <img src="assets/img/news-3.jpg" alt="">
                            <h4><a href="#">Id quia et et ut maxime similique occaecati ut</a></h4>
                            <p>Fugiat voluptas vero eaque accusantium eos. Consequuntur sed ipsam et totam...</p>
                        </div>

                        <div class="post-item clearfix">
                            <img src="assets/img/news-4.jpg" alt="">
                            <h4><a href="#">Laborum corporis quo dara net para</a></h4>
                            <p>Qui enim quia optio. Eligendi aut asperiores enim repellendusvel rerum cuder...</p>
                        </div>

                        <div class="post-item clearfix">
                            <img src="assets/img/news-5.jpg" alt="">
                            <h4><a href="#">Et dolores corrupti quae illo quod dolor</a></h4>
                            <p>Odit ut eveniet modi reiciendis. Atque cupiditate libero beatae dignissimos eius...</p>
                        </div>

                    </div><!-- End sidebar recent posts-->

                </div>
            </div><!-- End News & Updates -->

        </div><!-- End Right side columns -->

    </div>

@endsection
