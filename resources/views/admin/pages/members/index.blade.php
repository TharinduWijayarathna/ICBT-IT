@extends('admin.layouts.app')
@section('content')
    <div class="row">

        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <h4 class="mb-4">
                        Member Management
                    </h4>


                </div>
                <div class="col-6 text-end">
                    <button class="btn btn-secondary create-new btn-primary waves-effect waves-light" data-bs-toggle="modal"
                        data-bs-target="#addMemberModal" type="button"><span><i class="ti ti-plus me-sm-1"></i> <span
                                class="d-none d-sm-inline-block">Add
                                Member</span></span></button>
                </div>
            </div>

            <div class="card container">
                <div class="card-datatable table-responsive pt-0">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_length" id="DataTables_Table_0_length"><label>Show <select
                                            name="DataTables_Table_0_length" class="form-select" id="page_count"
                                            onchange="getMembers()">
                                            <option value="15" selected>15</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                        </select> entries</label></div>
                            </div>
                            <div class="col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end">
                                <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>Search:<input
                                            type="search" class="form-control" placeholder="Search" oninput="getMembers()"
                                            id="search_value"></label></div>
                            </div>
                        </div>
                        <div id="members_table">

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Add Member Modal -->
    <div class="modal fade" id="addMemberModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-edit-user">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="mb-2">Add New Member</h3>
                        <p class="text-muted">Fill in the form below to add a new member.</p>
                    </div>
                    <form id="addMemberForm" class="row g-3" action="{{ route('members.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-12 col-md-6">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" id="modalCreateUserFirstName" name="name"
                                placeholder="Name" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" id="modalCreateUserEmail" name="email"
                                placeholder="Email" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label
                                ">Designation</label>
                            <input type="text" class="form-control" id="modalCreateUserDesignation" name="designation"
                                placeholder="Designation" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label    ">Batch</label>
                            <input type="text" class="form-control" id="modalCreateUserBatch" name="batch"
                                placeholder="Batch" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label    ">Image</label>
                            <input type="file" class="form-control" id="modalCreateUserImage" name="image"
                                placeholder="Image" />
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                aria-label="Close">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Member Modal -->
    <div class="modal fade" id="editMemberModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-edit-user">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="mb-2">Edit Member</h3>
                        <p class="text-muted mb-0">Fill in the form below to edit the member.</p>
                    </div>
                    <form id="editMemberForm" class="row g-3" action="" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="text" id="modalEditUserId" name="id" hidden />
                        <div class="col-12 col-md-6">
                            <label class="form-label
                                ">Name</label>
                            <input type="text" class="form-control" id="modalEditUserFirstName" name="name"
                                placeholder="Name" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label
                                ">Email</label>
                            <input type="email" class="form-control" id="modalEditUserEmail" name="email"
                                placeholder="Email" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label
                                ">Designation</label>
                            <input type="text" class="form-control" id="modalEditUserDesignation" name="designation"
                                placeholder="Designation" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">Batch</label>
                            <input type="text" class="form-control" id="modalEditUserBatch" name="batch"
                                placeholder="Batch" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" id="modalEditUserImage" name="image"
                                placeholder="Image" />
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                aria-label="Close">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            getMembers();
        });

        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            getMembers(page);
        });

        function getMembers(page = 1) {
            var name = $('#search_value').val();
            var count = $('#page_count').val();
            var data = {
                name: name,
                count: count
            };
            $.ajax({
                url: "/members/all?page=" + page,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'GET',
                dataType: 'html', // Specify the data type as 'html'
                data: data,
                success: function(response) {
                    $('#members_table').html(response);
                    $('.pagination a').attr("disabled",
                    false); // Corrected the attribute name and removed unnecessary space
                }
            });
        }

        function deleteMember(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/members/' + id + '/delete',
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            getMembers();
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        }
                    });
                }
            });
        }

        function editMember(id) {
            $.ajax({
                url: '/members/' + id + '/get',
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $('#modalEditUserId').val(response.id);
                    $('#modalEditUserFirstName').val(response.name);
                    $('#modalEditUserEmail').val(response.email);
                    $('#modalEditUserDesignation').val(response.designation);
                    $('#modalEditUserBatch').val(response.batch);
                    $('#editMemberForm').attr('action', '/members/' + response.id + '/update');
                    $('#editMemberModal').modal('show');
                }
            });
        }
    </script>
@endpush
