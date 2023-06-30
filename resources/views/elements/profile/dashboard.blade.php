<div class="page-wrapper dashboard">
    <div class="sidebar-backdrop"></div>
    @include('elements.profile.profile_sidebar')
    <section class="user-dashboard">
        <div class="dashboard-outer">
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                    <div class="ui-item">
                        <div class="left">
                            <h4>19</h4>
                            <p>Published Listingss</p>
                        </div>
                        <div class="right">
                            <i class="icon flaticon-computer"></i>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                    <div class="ui-item bg-purple">
                        <div class="left">
                            <h4>15</h4>
                            <p>Pending Listings</p>
                        </div>
                        <div class="right">
                            <i class="icon flaticon-school-material"></i>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                    <div class="ui-item bg-pink">
                        <div class="left">
                            <h4>22</h4>
                            <p>Visits this week</p>
                        </div>
                        <div class="right">
                            <i class="icon flaticon-tour-guide"></i>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                    <div class="ui-item bg-yellow">
                        <div class="left">
                            <h4>05</h4>
                            <p>Times Bookmarked</p>
                        </div>
                        <div class="right">
                            <i class="icon flaticon-heart"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="total-widget ls-widget">
                        <div class="widget-title"><h4><span class="icon flaticon-view"></span> Total Views</h4>
                        </div>
                        <div class="widget-content">
                            <ul class="list-style-one">
                                <li><span class="count">20</span> Last 24 hours</li>
                                <li><span class="count">35</span> Last 7 days</li>
                                <li><span class="count">40</span> Last 30 days</li>
                            </ul>
                        </div>
                    </div>
                    <div class="total-widget ls-widget">
                        <div class="widget-title"><h4><span class="icon flaticon-share"></span> Total Shares</h4>
                        </div>
                        <div class="widget-content">
                            <ul class="list-style-one">
                                <li><span class="count">20</span> Last 24 hours</li>
                                <li><span class="count">35</span> Last 7 days</li>
                                <li><span class="count">40</span> Last 30 days</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="graph-widget ls-widget">
                        <div class="tabs-box">
                            <div class="widget-title">
                                <h4><span class="icon flaticon-tour-guide"></span> Visits</h4>
                                <ul class="tab-buttons">
                                    <li class="tab-btn active-btn" data-tab="#tab1">Last 24 hours</li>
                                    <li class="tab-btn" data-tab="#tab2">Last 7 days</li>
                                    <li class="tab-btn" data-tab="#tab3">Last 30 days</li>
                                </ul>
                            </div>
                            <div class="widget-content">
                                <div class="tabs-content">
                                    <div class="tab active-tab" id="tab1">
                                        <div class="chart">
                                            <canvas id="chart" width="100" height="45"></canvas>
                                        </div>
                                    </div>
                                    <div class="tab" id="tab2">
                                        <div class="chart">
                                            <canvas id="chart2" width="100" height="45"></canvas>
                                        </div>
                                    </div>
                                    <div class="tab" id="tab3">
                                        <div class="chart">
                                            <canvas id="chart3" width="100" height="45"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
