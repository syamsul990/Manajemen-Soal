@extends(auth()->user()->level == 1 ? 'layouts.master_admin'  : 'layouts.master_guru' )

@section('content')
        <!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <div class="panel panel-profile">
                        <div class="clearfix">
                            <!-- LEFT COLUMN -->
                            <div class="profile-left">
                                <!-- PROFILE HEADER -->
                                <div class="profile-header">
                                    <div class="overlay"></div>
                                    <div class="profile-main">
                                        <img src="{{asset('storage/avatars/' . auth()->user()->id . '/avatar.png')}}" class="img-circle" alt="Avatar">
                                        <h3 class="name">{{auth()->user()->name}}</h3>
                                    </div>
                                </div>
                                <!-- END PROFILE HEADER -->

                                <!-- PROFILE DETAIL -->
                                <div class="profile-detail">
                                    <div class="profile-info">
                                        <h4 class="heading">Datadiri</h4>
                                        <ul class="list-unstyled list-justify">
                                            <li>Nama Lengkap <span>{{auth()->user()->name}}</span></li>
                                            <li>Email <span>{{auth()->user()->email}}</span></li>
                                        </ul>
                                    </div>
                                    <div class="text-center"><a href=" /layouts/{{ $user->id }}/ubah_password " class="btn btn-primary">Edit Profile</a></div>

                                </div>
                                <!-- END PROFILE DETAIL -->

                            </div>
                            <!-- END LEFT COLUMN -->

                            <!-- RIGHT COLUMN -->
                            <div class="profile-right">
                                <h4 class="heading">Samuels Awards</h4>
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="tab-bottom-left1">
                                        <ul class="list-unstyled activity-timeline">
                                            <li>
                                                <i class="fa fa-comment activity-icon"></i>
                                                <p>Commented on  <a href="#">Prototyping</a> <span class="timestamp">2 minutes ago</span></p>
                                            </li>
                                            <li>
                                                <i class="fa fa-cloud-upload activity-icon"></i>
                                                <p>Uploaded new file <a href="#">Proposal.docx</a> to project <a href="#">New Year Campaign</a> <span class="timestamp">7 hours ago</span></p>
                                            </li>
                                            <li>
                                                <i class="fa fa-plus activity-icon"></i>
                                                <p>Added <a href="#">Martin</a> and <a href="#">3 others colleagues</a> to project repository <span class="timestamp">Yesterday</span></p>
                                            </li>
                                            <li>
                                                <i class="fa fa-check activity-icon"></i>
                                                <p>Finished 80% of all <a href="#">assigned tasks</a> <span class="timestamp">1 day ago</span></p>
                                            </li>
                                        </ul>

                                    </div>

                                </div>
                                <!-- END TABBED CONTENT -->
                            </div>
                            <!-- END RIGHT COLUMN -->
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
        <!-- END MAIN -->
        <div class="clearfix"></div>

@stop
