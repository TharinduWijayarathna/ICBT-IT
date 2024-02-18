<x-app-layout>
    <x-slot name="header">
        <div class="pb-6 header">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="py-4 row align-items-center">
                        <div class="col-lg-8">
                            <h6 class="mb-0 h2 text__blue d-inline-block">User Management</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-block ">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i
                                                class="fas fa-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('users.all') }}">
                                            User Management
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        {{ $user->name }}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </x-slot>
    <x-slot name="content">
        <div class="row">
            <div class="col-lg-2 pr-0">
                <div class="nav-wrapper-loc">
                    <ul class="nav nav-pills nav-fill flex-column" id="tabs-icons-text" role="tablist">
                        <li class="mb-2 nav-item">
                            <a class="nav-link active " id="tabs-icons-text-1-tab" data-toggle="tab"
                                href="#basic-data-tab" role="tab" aria-controls="preview" aria-selected="true">
                                {{-- <i class="fas fa-circle-info"></i> --}}
                                <span class="text-sm">Personal Info</span>
                            </a>
                        </li>
                        <li class="mb-2 nav-item">
                            <a class="nav-link" id="tabs-icons-text-2-tab" data-toggle="tab" href="#password-data-tab"
                                role="tab" aria-controls="preview" aria-selected="false">
                                {{-- <i class="fas fa-lock"></i> --}}
                                <span class="text-sm">Password</span>
                            </a>
                        </li>
                        @can('create_users_permissions')
                        <li class="mb-2 nav-item">
                            <a class="nav-link" id="tabs-icons-text-2-tab" data-toggle="tab" href="#permission-data-tab"
                                role="tab" aria-controls="preview" aria-selected="false">
                                {{-- <i class="fas fa-key"></i> --}}
                                <span class="text-sm">Permissions</span>
                            </a>
                        </li>
                        @endcan
                        <li hidden></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-10 py-0">
                <div class="tab-content tab-space">
                    <div class="tab-pane active" id="basic-data-tab">
                        <div class="card" id="basic-info">
                            <div class="card-header pb-0">
                                <h5>PERSONAL INFO</h5>
                            </div>
                            <div class="card-body pt-0 mt-2 pb-2">
                                <form role="form text-left" action="{{ route('users.update', $user->id) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div for="name" class="col-md-3 form-control-label">NAME</div>
                                        <div class="col-md-9">
                                            @if ($user->deleted_at != null)
                                                @can('view_users')
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="name" value="{{ $user->name }}" id="name" disabled
                                                        required>
                                                @endcan
                                            @else
                                                @can('view_users')
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="name" value="{{ $user->name }}" id="name" required>
                                                @endcan
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div for="email" class="col-md-3 form-control-label">EMAIL</div>
                                        <div class="col-md-9">
                                            <input class="form-control form-control-sm" name="email" id="email"
                                                value="{{ $user->email }}" required disabled>
                                        </div>
                                    </div>
                                    <div class="row mt-2 mb-2">
                                        <div for="designation" class="col-md-3 form-control-label">DESIGNATION</div>
                                        <div class="col-md-9">
                                            @if ($user->deleted_at != null)
                                                @can('view_users')
                                                    <input class="form-control form-control-sm" name="designation"
                                                        value="{{ $user->designation }}" id="designation" disabled>
                                                @endcan
                                            @else
                                                @can('view_users')
                                                    <input class="form-control form-control-sm" name="designation"
                                                        value="{{ $user->designation }}" id="designation">
                                                @endcan
                                            @endif
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        @if ($user->deleted_at != null)
                                            @can('restore_users')
                                                <a class="btn btn-sm btn-danger" id="restore"
                                                    href="{{ route('users.restore', $user->id) }}">
                                                    RESTORE
                                                </a>
                                            @endcan
                                        @else
                                            @can('delete_users')
                                                <a class="btn btn-sm btn-danger" href="javascript:void(0)" id="delete"
                                                    onclick="delconf('{{ route('users.delete', $user->id) }}')">
                                                    DELETE
                                                </a>
                                            @endcan
                                        @endif


                                        @can('update_users')
                                            <button type="submit" class="btn btn-sm btn-info">
                                                UPDATE
                                            </button>
                                        @endcan
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="password-data-tab">
                        <div class="card" id="basic-info">
                            <div class="card-header pb-0">
                                <h5>PRIVACY INFO</h5>
                            </div>
                            <div class="card-body pt-0 mt-2 pb-2">
                                <form role="form text-left" action="{{ route('users.update.password', $user->id) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <label for="Password" class="form-control-label col-md-3">NEW PASSWORD</label>
                                        <div class="col-md-9">
                                            @if ($user->deleted_at != null)
                                                @can('view_users')
                                                <input type="password" class="form-control form-control-sm"
                                                    name="password" id="new_pass" required disabled>
                                                @endcan
                                            @else
                                                @can('view_users')
                                                <input type="password" class="form-control form-control-sm"
                                                    name="password" id="new_pass" required>
                                                @endcan
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mt-2 mb-2">
                                        <label for="Password" class="form-control-label col-md-3">CONFIRM
                                            PASSWORD</label>
                                        <div class="col-md-9">
                                            @if ($user->deleted_at != null)
                                                @can('view_users')
                                                    <input type="password" class="form-control form-control-sm"
                                                        name="password_confirmation" id="confirm_pass" required disabled>
                                                @endcan
                                            @else
                                                @can('view_users')
                                                    <input type="password" class="form-control form-control-sm"
                                                        name="password_confirmation" id="confirm_pass" required>
                                                @endcan
                                            @endif

                                        </div>
                                    </div>
                                    <div class="row">
                                        @can('update_users')
                                            <div class="col-lg-12 text-right">
                                                <h6 class="mb-0">
                                                    <button class="btn btn-sm btn-info" id="submit-btn"
                                                        type="submit">UPDATE</button>
                                                </h6>
                                            </div>
                                        @endcan
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="permission-data-tab">
                        <div class="card" id="basic-info">
                            <div class="card-header pb-0">
                                <h5>PERMISSION SETTINGS</h5>
                            </div>
                            <div class="pt-2 card-body">

                                @if ($user->deleted_at != null)
                                    <span> User has been deleted. So the permission cannot be updated. </span>
                                @else
                                    <form role="form text-left" enctype="multipart/form-data"
                                        action="{{ route('users.update.permissions', $user->id) }}" method="POST">
                                        @csrf
                                        <div class="mt-3 row">
                                            @foreach ($groups as $group)
                                                <div class="col-md-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title">{{ $group->group_name }}</h4>
                                                                <ul class="list-group">
                                                                    @foreach ($tc->groupPermissions($group) as $index => $permission)
                                                                        <li class="list-group-item">
                                                                            <div class="form-check form-switch">
                                                                                <input class="form-check-input"
                                                                                    name="{{ $permission->name }}"
                                                                                    type="checkbox"
                                                                                    id="{{ $permission->name }}"
                                                                                    {{ $user->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                                                                <label class="form-check-label"
                                                                                    for="{{ $permission->name }}">{{ $permission->name }}</label>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="text-right pt-0">
                                            @can('update_users')
                                                <button type="submit" class="mb-0 btn btn-sm btn-info">
                                                    UPDATE
                                                </button>
                                            @endcan
                                        </div>
                                    </form>
                                @endif


                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </x-slot>
    @push('scripts')
        <script>
            setTimeout(function() {
                $('#pre_stop').hide();
            }, 500);
        </script>
    @endpush
    @push('styles')
        <style>

        </style>
    @endpush
</x-app-layout>
