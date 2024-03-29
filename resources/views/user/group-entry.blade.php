@include("global.head")
@include("global.header")
<div class="main-content" ng-controller="userGroup">
    <div class="page-content" ng-init="initializeData('{{$model->userGroup->_id}}')">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">User Group Entry</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{config("app.url")}}/">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{config("app.url")}}/user/">User</a></li>
                                <li class="breadcrumb-item"><a href="{{config("app.url")}}/user/group/">Group</a></li>
                                <li class="breadcrumb-item active">Entry</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input id="user-group-name" class="form-control" type="text"
                                               ng-model="name.value"
                                               ng-keyup="checkFormLengthRequired('name.value', 'user-group-name', 'response-name', 3, 50)"/>
                                        <div id="response-name"></div>
                                    </div>
                                    @if(Session::has("account"))
                                        @if(Session::get("account")->nucode == "system")
                                            <div class="mb-3">
                                                <label class="form-label">Nucode</label>
                                                <input id="user-group-nucode" class="form-control" type="text"
                                                       ng-model="nucode.value"
                                                       ng-keyup="checkFormLength('nucode.value', 'user-group-nucode', 'response-nucode', 2, 50)"/>
                                                <div id="response-nucode"></div>
                                            </div>
                                        @endif
                                    @endif
                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <input id="user-group-description" class="form-control" type="text"
                                               ng-model="description.value"
                                               ng-keyup="checkFormLength('description.value', 'user-group-description', 'response-description', 3, 250)"/>
                                        <div id="response-description"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Website</label>
                                        <div>
                                            <span ng-repeat="(key, value) in websites.option" class="me-3"
                                                  ng-click="toggleWebsite(value._id)">
                                                <input class="form-check-input" type="checkbox"
                                                       ng-checked="websites.value.includes(value._id)">
                                                <label class="form-check-label" ng-bind="value.name"></label>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <select id="user-group-status" class="form-control select2"
                                                data-error="Please select status" data-input="user-group-status"
                                                data-required="true" data-response="response-status"
                                                data-scope="status.value">
                                            <option value="">Status</option>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                        <div id="response-status"></div>
                                    </div>
                                    <div class="mb-3">
                                        @if($model->userGroup->_id != null)
                                            <button class="btn btn-warning waves-effect waves-light me-1"
                                                    ng-click="update($event)">Edit
                                            </button>
                                        @else
                                            <button class="btn btn-success waves-effect waves-light me-1"
                                                    ng-click="insert($event)">Add New
                                            </button>
                                        @endif
                                        <button type="reset" class="btn btn-secondary waves-effect">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include("global.footer")
@include("global.foot")
