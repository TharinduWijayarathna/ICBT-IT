<div class="card" id="basic-info">
    <div class="card-header">
        <h5>Basic Info</h5>
    </div>
    <div class="card-body pt-0">
        <form role="form text-left" wire:submit.prevent="submit" enctype="multipart/form-data">
            @csrf
            <div class="row mb-1">
                <div for="name" class="col-md-2 col-form-label">NAME</div>
                <div class="col-md-10">
                    <input type="text" class="form-control form-control-sm" name="name" id="name"
                        wire:model="user.name" required>
                    @error('user.name')
                        <small id="msg_name" class="text-danger form-text text-error-msg error">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="row mb-1">
                <div for="email" class="col-md-2 col-form-label">EMAIL</div>
                <div class="col-md-10">
                    <input class="form-control form-control-sm" name="email" id="email" wire:model="user.email"
                        required disabled>
                    @error('user.email')
                        <small id="msg_email" class="text-danger form-text text-error-msg error">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="row mb-1">
                <div for="plant_id" class="col-md-2 col-form-label">PLANT</div>
                <div class="col-md-10" wire:ignore>
                    <select class="form-control form-control-sm select-plant" name="plant_id" id="plant_id">
                        <option value=""></option>
                        <option value="0" {{ $user->plant_id == 0 ? 'selected' : '' }}>All</option>
                        @foreach ($plants as $plant)
                            <option value="{{ $plant->id }}" {{ $user->plant_id == $plant->id ? 'selected' : '' }}>
                                {{ $plant->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('user.plant_id')
                        <small id="msg_plant_id"
                            class="text-danger form-text text-error-msg error">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            {{-- <div class="row mb-1">
                <div for="plant_id" class="col-md-2 col-form-label">ROLE</div>
                <div class="col-md-10">
                    <select class="form-control form-control-sm" name="role" wire:model="user.role" id="role">
                        <option value="">Select</option>
                        <option value="1">User</option>
                        <option value="2">Admin</option>
                    </select>
                    @error('user.role')
                    <small id="msg_role" class="text-danger form-text text-error-msg error">{{ $message }}</small>
                    @enderror
                </div>
            </div> --}}
            <div class="text-end">
                @can('update_users')
                    <button type="submit" class="btn btn-sm btn-round bg-gradient-info btn-md mb-0">
                        <i class="fas fa-save"></i>
                        Save
                    </button>
                @endcan
            </div>
        </form>
    </div>
</div>

@push('scripts')
    <script>
        $('#plant_id').on('change', function(e) {
            @this.set('user.plant_id', $('#plant_id').select2("val"))
        });

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
