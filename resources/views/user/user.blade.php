@include("global.head")
@include("global.header")
<div class="main-content" ng-controller="user">
    <div class="page-content" ng-init="initializeData()">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">User</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{config("app.url")}}/">Home</a></li>
                                <li class="breadcrumb-item active">User</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="row g-1 mb-3" method="POST" action="">
                                <div class="col-md-1">
                                    <input class="form-control dt-input" type="text" placeholder="Username"
                                           data-column="1"
                                           data-regex="true"/>
                                </div>
                                <div class="col-md-1">
                                    <input class="form-control dt-input" type="text" placeholder="Name" data-column="2"
                                           data-regex="true"/>
                                </div>
                                @if(Session::has("account"))
                                    @if(Session::get("account")->nucode == "system")
                                        <div class="col-md-1">
                                            <input class="form-control dt-input" type="text" placeholder="Nucode"
                                                   data-column="3"
                                                   data-regex="false"/>
                                        </div>
                                        <div class="col-md-2">
                                            <select id="user-filter-type" class="select2 form-select dt-select"
                                                    data-column="4" data-regex="false">
                                                <option value="">Type</option>
                                                <option value="Administrator">Administrator</option>
                                                <option value="CRM">CRM</option>
                                                <option value="Telemarketer">Telemarketer</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <select id="user-filter-group" class="select2 form-select dt-select"
                                                    data-column="5" data-regex="false">
                                                <option value="">Group</option>
                                                @foreach($model->userGroups as $value)
                                                    <option value="{{$value->_id}}">{{$value->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <select id="user-filter-role" class="select2 form-select dt-select"
                                                    data-column="6" data-regex="false">
                                                <option value="">Role</option>
                                                @foreach($model->userRoles as $value)
                                                    <option value="{{$value->_id}}">{{$value->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-1">
                                            <select id="user-filter-status" class="select2 form-select dt-select"
                                                    data-column="7" data-regex="false">
                                                <option value="">Status</option>
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive</option>
                                            </select>
                                        </div>
                                    @else
                                        <div class="col-md-2">
                                            <select id="user-filter-type" class="select2 form-select dt-select"
                                                    data-column="3" data-regex="false">
                                                <option value="">Type</option>
                                                <option value="Administrator">Administrator</option>
                                                <option value="CRM">CRM</option>
                                                <option value="Telemarketer">Telemarketer</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <select id="user-filter-group" class="select2 form-select dt-select"
                                                    data-column="4" data-regex="false">
                                                <option value="">Group</option>
                                                @foreach($model->userGroups as $value)
                                                    <option value="{{$value->_id}}">{{$value->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <select id="user-filter-role" class="select2 form-select dt-select"
                                                    data-column="5" data-regex="false">
                                                <option value="">Role</option>
                                                @foreach($model->userRoles as $value)
                                                    <option value="{{$value->_id}}">{{$value->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <select id="user-filter-status" class="select2 form-select dt-select"
                                                    data-column="6" data-regex="false">
                                                <option value="">Status</option>
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive</option>
                                            </select>
                                        </div>
                                    @endif
                                @endif
                                <div class="col-md-2" style="text-align: right;">
                                    <a href="{{config("app.url")}}/user/entry/"
                                       class="btn btn-success waves-effect waves-light"><i
                                            class="mdi mdi-plus me-2"></i> Add New</a>
                                </div>
                            </form>
                            <table id="user" class="table table-striped table-bordered dt-responsive nowrap"
                                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>Name</th>
                                    @if(Session::has("account"))
                                        @if(Session::get("account")->nucode == "system")
                                            <th>Nucode</th>
                                        @endif
                                    @endif
                                    <th>Type</th>
                                    <th>Group</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Modified</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>Name</th>
                                    @if(Session::has("account"))
                                        @if(Session::get("account")->nucode == "system")
                                            <th>Nucode</th>
                                        @endif
                                    @endif
                                    <th>Type</th>
                                    <th>Group</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Modified</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include("global.footer")
@include("global.foot")
