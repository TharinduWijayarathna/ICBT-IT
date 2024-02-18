<div class="card" id="basic-info">
    <div class="card-header">
        <h5>Permission Settings</h5>
    </div>
    <div class="pt-0 card-body">
        <form role="form text-left" enctype="multipart/form-data"
            action="{{ route('users.update.permissions', $user->id) }}" method="POST">
            @csrf
            <div class="mb-1 row">
                @foreach ($groups as $group)
                    <div class="mb-2 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $group->group }}</h4>
                                    <ul class="list-group">
                                        @foreach ($tc->groupPermissions($group) as $index => $permission)
                                            <li class="list-group-item">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" name="{{ $permission->name }}"
                                                        type="checkbox" id="{{ $permission->name }}"
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
            <div class="text-end">
                @can('update_users')
                    <button type="submit" class="mb-0 btn btn-sm btn-round bg-gradient-info btn-md">
                        <i class="fas fa-save"></i>
                        Update
                    </button>
                @endcan
            </div>
        </form>
    </div>
</div>

@push('scripts')
    <script>
        $('.select-plant').select2({
            placeholder: "Select Plant",
            theme: 'bootstrap',
        });
    </script>
@endpush


@push('styles')
    <style>
        .upload-img img {
            max-width: 10rem;
        }
    </style>
@endpush
