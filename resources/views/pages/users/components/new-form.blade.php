<form role="form text-left" wire:submit.prevent="submit" enctype="multipart/form-data">
    @csrf
    <div class="row mb-1">
        <div for="name" class="col-md-4 col-form-label">NAME</div>
        <div class="col-md-6">
            <input type="text" class="form-control form-control-sm" name="name" id="name" wire:model="name"
                placeholder="Name" required>
            @error('name')
                <small id="msg_name" class="text-danger form-text text-error-msg error">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="row mb-1">
        <div for="email" class="col-md-4 col-form-label">EMAIL</div>
        <div class="col-md-6">
            <input type="email" class="form-control form-control-sm" name="email" id="email" wire:model="email"
                placeholder="Email" required>
            @error('email')
                <small id="msg_email" class="text-danger form-text text-error-msg error">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="row mb-1">
        <div for="password" class="col-md-4 col-form-label">PASSWORD</div>
        <div class="col-md-6">
            <input type="password" class="form-control form-control-sm" name="password" id="password"
                wire:model="password" placeholder="Password" required autocomplete="new-password">
            @error('password')
                <small id="inp_password" class="text-danger form-text text-error-msg error">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="row mb-1">
        <div for="plant_id" class="col-md-4 col-form-label">PLANT</div>
        <div class="col-md-6" wire:ignore>
            <select class="form-control form-control-sm select-plant" name="plant_id" id="plant_id">
                <option value=""></option>
                <option value="0">All</option>
                @foreach ($plants as $plant)
                    <option value="{{ $plant->id }}">
                        {{ $plant->name }}
                    </option>
                @endforeach
            </select>
            @error('plant_id')
                <small id="msg_plant_id" class="text-danger form-text text-error-msg error">{{ $message }}</small>
            @enderror
        </div>
    </div>
    {{-- <div class="row mb-1">
        <div for="plant_id" class="col-md-4 col-form-label">ROLE</div>
        <div class="col-md-6">
            <select class="form-control form-control-sm" name="role" wire:model="role" id="role">
                <option value="">Select</option>
                <option value="1">User</option>
                <option value="2">Admin</option>
            </select>
            @error('role')
            <small id="msg_role" class="text-danger form-text text-error-msg error">{{ $message }}</small>
            @enderror
        </div>
    </div> --}}
    <div class="text-end mt-2">
        @can('create_users')
            <button type="submit" class="btn btn-sm btn-round bg-gradient-info btn-md mb-0">
                <i class="fas fa-save"></i>
                Create User
            </button>
        @endcan
    </div>
</form>
@push('scripts')
    <script>
        window.livewire.on('userCreated', () => {
            $('#new-user-modal').modal('hide');
        });

        $('#plant_id').on('change', function(e) {
            @this.set('plant_id', $('#plant_id').select2("val"))
        });

        $('.select-plant').select2({
            placeholder: "Select Plant",
            theme: 'bootstrap',
            dropdownParent: '#new-user-modal'
        });
    </script>
@endpush
