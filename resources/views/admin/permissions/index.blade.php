@extends('admin.layouts.app')
@section('content')
    <div class="app-content content" id="permissions_page">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            @include('admin.includes.breadcrumbs')
            <div class="content-body">
                <section id="switch-icons">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="customSelect" class="font-medium-3">Roles</label>
                                        <select v-model="selected" class="custom-select" id="customSelect">
                                            <option value="role_select" selected>Choose the role</option>
                                            @foreach($roles as $role)
                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="content-body">
                <section id="card-demo-example">
                    <div class="row match-height">
                        @foreach($permissions as $key => $item)
                        <div class="col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">{{ucfirst($key)}}</h4>
                                    <p class="card-text">
                                        Some quick example text to build on the card title and make up the bulk of the card's content.
                                    </p>
                                    <div class="custom-switch custom-switch-success mt-1">
                                        <input
                                            type="checkbox"
                                            class="custom-control-input"
                                            id="customSwitch{{$key}}"
                                            :checked="getChecked('{{$key}}')"
                                            @click="changeAll"
                                        />
                                        <label class="custom-control-label" for="customSwitch{{$key}}"></label>
                                        <span class="mb-50">Check All</span>
                                    </div>
                                    @foreach($item as $k => $value)
                                    <div class="custom-control custom-switch custom-switch-primary mt-1">
                                        <input
                                            id="customSwitch{{$key}}{{$k}}"
                                            :checked= "compPermissions('{{$value->name}}{{$value->method}}', '{{$value->method}}')"
                                            @click="setPermission"
                                            value="{{$value->name}}.{{$value->method}}"
                                            :disabled="disabled == 0"
                                            type="checkbox"
                                            class="custom-control-input"
                                        />
                                        <label class="custom-control-label" for="customSwitch{{$key}}{{$k}}"></label>
                                        <span class="mb-50">{{$value->method}}</span>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

<script>
    const rolesRoute = `{{route('get.role')}}`
    const setPermissionsRoute = `{{route('set.permission')}}`
    const total =  @json($totals);
</script>

@push('scripts')
    <script type="text/javascript" src="{{asset('admin/custom-js/permissions.js?v=1.1')}}"></script>
@endpush
