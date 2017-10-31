<!-- BEGIN PAGE -->
		<div id="main-content">
			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->
				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN THEME CUSTOMIZER-->
						<div id="theme-change" class="hidden-phone">
							<i class="icon-cogs"></i>
							<span class="settings">
                                <span class="text">Theme:</span>
                                <span class="colors">
                                    <span class="color-default" data-style="default"></span>
                                    <span class="color-gray" data-style="gray"></span>
                                    <span class="color-purple" data-style="purple"></span>
                                    <span class="color-navy-blue" data-style="navy-blue"></span>
                                </span>
							</span>
						</div>
						<!-- END THEME CUSTOMIZER-->
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->
						<ul class="breadcrumb">
							<li>
                                <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
							</li>
                            <li>
                                <a href="#">Admin Lab</a> <span class="divider">&nbsp;</span>
                            </li>
							<li><a href="#">Dashboard</a><span class="divider-last">&nbsp;</span></li>
						</ul>
						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>
				</div>
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
				<div id="page" class="dashboard">

					<div class="row-fluid">
						<div class="span6">
							<!-- BEGIN SITE VISITS PORTLET-->
							<div class="widget">
								<div class="widget-title">
									<h4><i class="icon-bar-chart"></i> Time Table</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="javascript:;" class="icon-remove"></a>
									</span>
								</div>
								<div class="widget-body">
									<div id="site_statistics_loading">
										<img src="img/loading.gif" alt="loading" />
									</div>
									<div id="site_statistics_content" class="hide">
										<div id="site_statistics" class="chart"></div>
									</div>
								</div>
							</div>
							<!-- END SITE VISITS PORTLET-->
						</div>
                        <div class="span6">
                            <!-- BEGIN SERVER LOAD PORTLET-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-umbrella"></i> Exam Time Table</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="javascript:;" class="icon-remove"></a>
									</span>
                                </div>
                                <div class="widget-body">
                                    <div id="load_statistics_loading">
                                        <img src="img/loading.gif" alt="loading" />
                                    </div>
                                    <div id="load_statistics_content" class="hide" style="margin: 0px 0 20px 0">
                                        <div id="load_statistics" class="chart" style="height: 280px"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- END SERVER LOAD PORTLET-->
                        </div>

					</div>

					<div class="row-fluid">
                        <div class="span12">
                            <!-- BEGIN RECENT ORDERS PORTLET-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-tags"></i> Time Table </h4>
                                        <span class="tools">
                                        <a href="javascript:;" class="icon-chevron-down"></a>
                                        <a href="javascript:;" class="icon-remove"></a>
                                        </span>
                                </div>
                                <div class="widget-body">
									<?php echo $this->CI->getEventTimeTableInfo(); ?>
                                </div>
                            </div>
                            <!-- END RECENT ORDERS PORTLET-->
                        </div>

					</div>
					<div class="row-fluid">

						<div class="span7">
							<!-- BEGIN CHAT PORTLET-->
							<div class="widget" id="chats">
								<div class="widget-title">
									<h4><i class="icon-comments-alt"></i> Chats</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="javascript:;" class="icon-remove"></a>
									</span>
								</div>
								<div class="widget-body">
                                    <div class="timeline-messages">
                                            <!-- Comment -->
                                            <div class="msg-time-chat">
                                                <a class="message-img" href="#"><img alt="" src="img/avatar1.jpg" class="avatar"></a>
                                                <div class="message-body msg-in">
                                                    <div class="text">
                                                        <p class="attribution"><a href="#">Mosaddek Hossain</a> at 1:55pm, 13th April 2013</p>
                                                        <p>Hello, How are you brother?</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /comment -->

                                            <!-- Comment -->
                                            <div class="msg-time-chat">
                                                <a class="message-img" href="#"><img alt="" src="img/avatar2.jpg" class="avatar"></a>
                                                <div class="message-body msg-out">
                                                    <div class="text">
                                                        <p class="attribution"> <a href="#">Dulal Khan</a> at 2:01pm, 13th April 2013</p>
                                                        <p>I'm Fine, Thank you. What about you? How is going on?</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /comment -->

                                            <!-- Comment -->
                                            <div class="msg-time-chat">
                                                <a class="message-img" href="#"><img alt="" src="img/avatar1.jpg" class="avatar"></a>
                                                <div class="message-body msg-in">
                                                    <div class="text">
                                                        <p class="attribution"><a href="#">Mosaddek Hossain</a> at 2:03pm, 13th April 2013</p>
                                                        <p>Yeah I'm fine too. Everything is going fine here.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /comment -->

                                            <!-- Comment -->
                                            <div class="msg-time-chat">
                                                <a class="message-img" href="#"><img alt="" src="img/avatar2.jpg" class="avatar"></a>
                                                <div class="message-body msg-out">
                                                    <div class="text">
                                                        <p class="attribution"><a href="#">Dulal Khan</a> at 2:05pm, 13th April 2013</p>
                                                        <p>well good to know that. anyway how much time you need to done your task?</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /comment -->
                                        </div>
									<div class="chat-form">
										<div class="input-cont">
											<input type="text" placeholder="Type a message here..." />
										</div>
										<div class="btn-cont">
											<a href="javascript:;" class="btn btn-primary">Send</a>
										</div>
									</div>
								</div>
							</div>
							<!-- END CHAT PORTLET-->
						</div>
                        <div class="span5">
                            <!-- BEGIN NOTIFICATIONS PORTLET-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-bell"></i> Notifications</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="javascript:;" class="icon-remove"></a>
									</span>
                                </div>
                                <div class="widget-body">
                                    <ul class="item-list scroller padding" data-height="365" data-always-visible="1">
                                        <li>
                                            <span class="label label-success"><i class="icon-bell"></i></span>
                                            <span>New user registered.</span>
                                            <span class="small italic">Just now</span>
                                        </li>
                                        <li>
                                            <span class="label label-success"><i class="icon-bell"></i></span>
                                            <span>New order received.</span>
                                            <span class="small italic">15 mins ago</span>
                                        </li>
                                        <li>
                                            <span class="label label-warning"><i class="icon-bullhorn"></i></span>
                                            <span>Alerting a user account balance.</span>
                                            <span class="small italic">2 hrs ago</span>
                                        </li>
                                        <li>
                                            <span class="label label-important"><i class="icon-bolt"></i></span>
                                            <span>Alerting administrators staff.</span>
                                            <span class="small italic">11 hrs ago</span>
                                        </li>
                                        <li>
                                            <span class="label label-important"><i class="icon-bolt"></i></span>
                                            <span>Messages are not sent to users.</span>
                                            <span class="small italic">14 hrs ago</span>
                                        </li>
                                        <li>
                                            <span class="label label-warning"><i class="icon-bullhorn"></i></span>
                                            <span>Web server #12 failed to relosd.</span>
                                            <span class="small italic">2 days ago</span>
                                        </li>
                                        <li>
                                            <span class="label label-success"><i class="icon-bell"></i></span>
                                            <span>New order received.</span>
                                            <span class="small italic">15 mins ago</span>
                                        </li>
                                        <li>
                                            <span class="label label-warning"><i class="icon-bullhorn"></i></span>
                                            <span>Alerting a user account balance.</span>
                                            <span class="small italic">2 hrs ago</span>
                                        </li>
                                        <li>
                                            <span class="label label-important"><i class="icon-bolt"></i></span>
                                            <span>Alerting administrators staff.</span>
                                            <span class="small italic">11 hrs ago</span>
                                        </li>
                                        <li>
                                            <span class="label label-important"><i class="icon-bolt"></i></span>
                                            <span>Messages are not sent to users.</span>
                                            <span class="small italic">14 hrs ago</span>
                                        </li>
                                        <li>
                                            <span class="label label-warning"><i class="icon-bullhorn"></i></span>
                                            <span>Web server #12 failed to relosd.</span>
                                            <span class="small italic">2 days ago</span>
                                        </li>
                                        <li>
                                            <span class="label label-success"><i class="icon-bell"></i></span>
                                            <span>New order received.</span>
                                            <span class="small italic">15 mins ago</span>
                                        </li>
                                        <li>
                                            <span class="label label-warning"><i class="icon-bullhorn"></i></span>
                                            <span>Alerting a user account balance.</span>
                                            <span class="small italic">2 hrs ago</span>
                                        </li>
                                        <li>
                                            <span class="label label-important"><i class="icon-bolt"></i></span>
                                            <span>Alerting administrators support staff.</span>
                                            <span class="small italic">11 hrs ago</span>
                                        </li>
                                        <li>
                                            <span class="label label-important"><i class="icon-bolt"></i></span>
                                            <span>Messages are not sent to users.</span>
                                            <span class="small italic">14 hrs ago</span>
                                        </li>
                                        <li>
                                            <span class="label label-warning"><i class="icon-bullhorn"></i></span>
                                            <span>Web server #12 failed to relosd.</span>
                                            <span class="small italic">2 days ago</span>
                                        </li>
                                    </ul>
                                    <div class="space5"></div>
                                    <a href="#" class="pull-right">View all notifications</a>
                                    <div class="clearfix no-top-space no-bottom-space"></div>
                                </div>
                            </div>
                            <!-- END NOTIFICATIONS PORTLET-->
                        </div>


                    </div>
                    <div class="row-fluid">
                        <div class="span6">
                            <!-- BEGIN PROGRESS BARS PORTLET-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i> Progress Bars</h4>
                                        <span class="tools">
                                        <a href="javascript:;" class="icon-chevron-down"></a>
                                        <a href="javascript:;" class="icon-remove"></a>
                                        </span>
                                </div>
                                <div class="widget-body">
                                    <div class="progress">
                                        <div style="width: 40%;" class="bar"></div>
                                    </div>
                                    <div class="progress progress-success">
                                        <div style="width: 60%;" class="bar"></div>
                                    </div>
                                    <div class="progress progress-warning">
                                        <div style="width: 80%;" class="bar"></div>
                                    </div>
                                    <div class="progress progress-danger">
                                        <div style="width: 45%;" class="bar"></div>
                                    </div>
                                    <div class="progress">
                                        <div style="width: 15%;" class="bar bar-success"></div>
                                        <div style="width: 40%;" class="bar bar-warning"></div>
                                        <div style="width: 27%;" class="bar bar-danger"></div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div style="width: 25%;" class="bar"></div>
                                    </div>
                                    <div class="progress progress-striped progress-success active">
                                        <div style="width: 40%;" class="bar"></div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div style="width: 15%;" class="bar bar-success"></div>
                                        <div style="width: 40%;" class="bar bar-warning"></div>
                                        <div style="width: 27%;" class="bar bar-danger"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PROGRESS BARS PORTLET-->
                        </div>
                        <div class="span6">
                            <!-- BEGIN ALERTS PORTLET-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-bell-alt"></i> Alerts</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="javascript:;" class="icon-remove"></a>
									</span>
                                </div>
                                <div class="widget-body">
                                    <div class="alert">
                                        <button class="close" data-dismiss="alert">×</button>
                                        <strong>Warning!</strong> Your monthly traffic is reaching limit.
                                    </div>
                                    <div class="alert alert-success">
                                        <button class="close" data-dismiss="alert">×</button>
                                        <strong>Success!</strong> The page has been added.
                                    </div>
                                    <div class="alert alert-info">
                                        <button class="close" data-dismiss="alert">×</button>
                                        <strong>Info!</strong> You have 198 unread messages.
                                    </div>
                                    <div class="alert alert-error">
                                        <button class="close" data-dismiss="alert">×</button>
                                        <strong>Error!</strong> The daily cronjob has failed.
                                    </div>
                                    <span class="space5"></span>
                                </div>
                            </div>
                            <!-- END ALERTS PORTLET-->
                        </div>
                    </div>
					<div class="row-fluid">
						<div class="span8 responsive" data-tablet="span8 fix-margin" data-desktop="span8">
							<!-- BEGIN CALENDAR PORTLET-->
							<div class="widget">
								<div class="widget-title">
									<h4><i class="icon-calendar"></i> Calendar</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="javascript:;" class="icon-remove"></a>
									</span>
								</div>
								<div class="widget-body">
									<div id="calendar" class="has-toolbar"></div>
								</div>
							</div>
							<!-- END CALENDAR PORTLET-->
						</div>
                        <div class="span4 responsive" data-tablet="span4 fix-margin" data-desktop="span4">
                            <!-- BEGIN TODO_LIST PORTLET-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-check"></i> To Do List</h4>
                                        <span class="tools">
                                        <a href="javascript:;" class="icon-chevron-down"></a>
                                        <a href="javascript:;" class="icon-remove"></a>
                                        </span>
                                </div>
                                <div class="widget-body">
                                    <ul class="todo-list">
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <a href=""> Weekly Meeting.</a>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <span class="label label-success"><i class="icon-bell"></i>Today</span>
                                                    <span class="actions">
                                                        <a href="#" class="icon"><i class="icon-ok"></i></a>
                                                        <a href="#" class="icon"><i class="icon-remove"></i></a>
                                                    </span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <a href="">Monthly Status Update.</a>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <span class="label label-default"><i class="icon-bell"></i>12.00PM</span>
                                                    <span class="actions">
                                                        <a href="#" class="icon"><i class="icon-ok"></i></a>
                                                        <a href="#" class="icon"><i class="icon-remove"></i></a>
                                                    </span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <a href="">Upgrage server OS.</a>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <span class="label label-success"><i class="icon-bell"></i>4 March</span>
                                                <span class="actions">
                                                    <a href="#" class="icon"><i class="icon-ok"></i></a>
                                                    <a href="#" class="icon"><i class="icon-remove"></i></a>
                                                </span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <a href="">Weekly technical support report.</a>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <span class="label label-success"><i class="icon-bell"></i>2 Jan</span>
                                                    <span class="actions">
                                                        <a href="#" class="icon"><i class="icon-ok"></i></a>
                                                        <a href="#" class="icon"><i class="icon-remove"></i></a>
                                                    </span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <a href=""> Project materials.</a>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <span class="label label-warning"><i class="icon-bell"></i>09 Feb</span>
                                                <span class="actions">
                                                    <a href="#" class="icon"><i class="icon-ok"></i></a>
                                                    <a href="#" class="icon"><i class="icon-remove"></i></a>
                                                </span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <a href="">Project Status Update.</a>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <span class="label label-important"><i class="icon-bell"></i>4.30PM</span>
                                                    <span class="actions">
                                                        <a href="#" class="icon"><i class="icon-ok"></i></a>
                                                        <a href="#" class="icon"><i class="icon-remove"></i></a>
                                                    </span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <a href=""> Anual Project Meeting.</a>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <span class="label label-important"><i class="icon-bell"></i>Today</span>
                                                    <span class="actions">
                                                        <a href="#" class="icon"><i class="icon-ok"></i></a>
                                                        <a href="#" class="icon"><i class="icon-remove"></i></a>
                                                    </span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <a href="">Prepare project materials.</a>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <span class="label label-warning"><i class="icon-bell"></i>3 May</span>
                                                <span class="actions">
                                                    <a href="#" class="icon"><i class="icon-ok"></i></a>
                                                    <a href="#" class="icon"><i class="icon-remove"></i></a>
                                                </span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <a href="">Update salary status.</a>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <span class="label label-reverse"><i class="icon-bell"></i>1 June</span>
                                                    <span class="actions">
                                                        <a href="#" class="icon"><i class="icon-ok"></i></a>
                                                        <a href="#" class="icon"><i class="icon-remove"></i></a>
                                                    </span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <a href="">Update Task Status.</a>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <span class="label label-reverse"><i class="icon-bell"></i>3 April</span>
                                                    <span class="actions">
                                                        <a href="#" class="icon"><i class="icon-ok"></i></a>
                                                        <a href="#" class="icon"><i class="icon-remove"></i></a>
                                                    </span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <a href="">Project Status Report.</a>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <span class="label label-important"><i class="icon-bell"></i>10.00PM</span>
                                                    <span class="actions">
                                                        <a href="#" class="icon"><i class="icon-ok"></i></a>
                                                        <a href="#" class="icon"><i class="icon-remove"></i></a>
                                                    </span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col1">
                                                <div class="cont">
                                                    <a href="">Update project rates.</a>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <span class="label label-reverse"><i class="icon-bell"></i>28 April</span>
                                                    <span class="actions">
                                                        <a href="#" class="icon"><i class="icon-ok"></i></a>
                                                        <a href="#" class="icon"><i class="icon-remove"></i></a>
                                                    </span>
                                            </div>
                                        </li>
                                    </ul>
                                    <a href="#" class="pull-right">View all todo list</a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <!-- END TODO_LIST PORTLET-->
                        </div>
					</div>
				</div>
				<!-- END PAGE CONTENT-->
			</div>
			<!-- END PAGE CONTAINER-->
		</div>
		<!-- END PAGE -->