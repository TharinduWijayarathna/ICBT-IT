<div class="card" id="basic-info">
    <div class="card-header">
        <h5>Basic Info</h5>
    </div>
    <div class="card-body pt-0">
        <form role="form text-left" wire:submit.prevent="submit" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="Password" class="form-control-label">New Password</label>
                        <input type="password" class="form-control form-control-sm" name="password" id="new_pass"
                            wire:model="password" required>
                        @error('password')
                            <small id="inp_new_password"
                                class="text-danger form-text text-error-msg error">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="Password" class="form-control-label">Confirm Password</label>
                        <input type="password" class="form-control form-control-sm" name="password_confirmation"
                            id="confirm_pass" wire:model="password_confirmation" required>
                        @error('password_confirmation')
                            <small id="inp_new_password_confirmation"
                                class="text-danger form-text text-error-msg error">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                @can('update_users')
                    <div class="col-lg-12">
                        <h6 class="text-center ">
                            <button class="btn btn-info" id="submit-btn" type="submit">Update</button>
                        </h6>
                    </div>
                @endcan
            </div>

        </form>
    </div>
</div>
