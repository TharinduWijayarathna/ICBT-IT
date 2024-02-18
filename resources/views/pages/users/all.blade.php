<x-app-layout>
    <x-slot name="header">
        <div class="pb-6 header">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="mt-3 mb-3 row align-items-center">
                        <div class="col-lg-8">
                            <h6 class="mb-0 h2 text__blue d-inline-block">User Management</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-block ">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i
                                                class="fas fa-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        User Management
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        @can('create_users')
                            <div class="col-lg-4 text-right">
                                <a href="javascript:void(0)" onclick="newUser()"
                                    class="mb-2 btn btn-sm btn-neutral float-end">
                                    <i class="fa fa-plus-circle"></i> ADD NEW
                                </a>
                            </div>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-body pt-1">
                        <div class="d-flex flex-column mb-2" style="margin-left: 10px">
                            <div class="shadow-none bg-body border-light">
                                <div class="search-option-bar">
                                    <div class="row pb-1 pt-0">
                                        <div class="col-md-3 pl-1 pr-0">
                                            <h5 for="title">NAME</h5>
                                            <input id="user_name" type="text" placeholder="Search Name"
                                                class="form-control form-control-sm">
                                        </div>
                                        <div class="col-md-3 pl-1 pr-0">
                                            <h5 for="title">EMAIL</h5>
                                            <input id="user_email" type="text" placeholder="Search Email"
                                                class="form-control form-control-sm">
                                        </div>

                                        <div class="col-md-1 pl-1 pr-0">
                                            <a href="javascript:void(0)" id="clear"
                                                class="btn btn-sm clear__btn float-end"> CLEAR
                                            </a>
                                        </div>

                                        <div class="mb-2 col-1 d-flex justify-content-end pb-0 align-items-end ml-auto"  style="margin-top: 28px">
                                            <select id="user_filter_count"
                                                class="form-control form-control-sm" style="width: auto;">
                                                <option value="20" selected>20</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                                <option value="200">200</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive" id="all_users_table">

                        </div>

                        {{-- <div class="table-responsive" id="users_table"> --}}
                        {{-- <div id="pre_stop" style="display: none;">Loading...</div> --}}
                        {{-- <table class="table align-items-center table-flush" id="users_table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="text-center pl-0">Status</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Designation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr onclick="window.open('{{ route('users.edit', $user->id) }}', '_self')">
                                            <td class="text-center pl-0">
                                                @if ($user->deleted_at != null)
                                                    <span class="badge badge-danger ">INACTIVE</span>
                                                @else
                                                    <span class="badge badge-success ">ACTIVE</span>
                                                @endif
                                            </td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->designation }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table> --}}


                        {{-- <table class="table mb-0 align-items-center ">
                                <thead>
                                    <tr class="table__header">
                                        <th scope="col" class="text-center pl-0">Status</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Designation</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($users as $user)
                                        <tr onclick="window.open('{{ route('users.edit', $user->id) }}', '_self')">
                                            <td class="text-center pl-0">
                                                @if ($user->deleted_at != null)
                                                    <span class="badge badge-danger ">INACTIVE</span>
                                                @else
                                                    <span class="badge badge-success ">ACTIVE</span>
                                                @endif
                                            </td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->designation }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center">
                                                No documents found
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table> --}}


                        {{-- <div class="row">
                                <div class="col-md-12 pagination_align">
                                    <!-- Pagination -->
                                    <nav aria-label="navigation" class="navigation ml-aut">
                                        {!! $users->links() !!}
                                    </nav>
                                </div>
                            </div> --}}
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    @push('modals')
        <div class="modal fade" id="new-user-modal" data-bs-backdrop="static" tabindex="-1" role="dialog"
            aria-labelledby="new-user-modal" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header pb-0">
                        <h5 class="modal-title font-weight-bolder text-primary" id="add_brandLabel">
                            NEW USER</h5>
                        <button type="button" class="close btn" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="fa fa-times"></i>
                            </span>
                        </button>
                    </div>
                    <div class="modal-body p-0">
                        <div class="card ">
                            <div class="card-body" style="padding-bottom: 8px;">
                                <form role="form text-left" action="{{ route('users.store') }}"
                                    enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <div class="row mb-1">
                                        <div for="name" class="col-md-3 form-control-label">NAME</div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-sm" name="name"
                                                id="name" placeholder="Name" required>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div for="email" class="col-md-3 form-control-label">EMAIL</div>
                                        <div class="col-md-9">
                                            <input type="email" class="form-control form-control-sm" name="email"
                                                id="email" placeholder="Email" required>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div for="designation" class="col-md-3 form-control-label">DESIGNATION</div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-sm" name="designation"
                                                id="designation" placeholder="Designation">
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div for="password" class="col-md-3 form-control-label">PASSWORD</div>
                                        <div class="col-md-9">
                                            <input type="password" class="form-control form-control-sm" name="password"
                                                id="password" placeholder="Password" required
                                                autocomplete="new-password">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            @can('create_users')
                                                <button type="submit" class="btn btn-sm btn-info">
                                                    <!-- <i class="fas fa-save"></i> -->
                                                    CREATE
                                                </button>
                                            @endcan
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endpush

    @push('styles')
        <style>
            tr:hover {
                background: rgba(157, 157, 157, 0.357);
                cursor: pointer;
            }

            .table>:not(caption)>*>* {
                padding-bottom: 0.5rem;
                padding-top: 0.5rem;
                padding-left: 0.5rem;
            }

            .table thead th {
                padding: 0.45rem 0.5rem;
                text-transform: uppercase;
                letter-spacing: 0;
                border-bottom: 1px solid #e9ecef;
                text-align: left;
            }
        </style>
    @endpush
    @push('scripts')
        <script>
            $(document).ready(function() {
                getFilterUsers();
            });

            $('#user_name').keyup(function() {
                getFilterUsers();
            });

            $('#user_email').keyup(function() {
                getFilterUsers();
            });

            $('#user_filter_count').change(function() {
                getFilterUsers();
            });

            $('#clear').click(function() {
                clearFilters();
            });

            function clearFilters() {
                $('#user_name').val('');
                $('#user_email').val('');
                getFilterUsers();
            }

            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                getFilterUsers(page);
            });

            function getFilterUsers(page = 1) {
                $('#pre_stop').show();
                var name = $('#user_name').val();
                var email = $('#user_email').val();
                var count = $('#user_filter_count').val();
                var data = {
                    name: name,
                    email: email,
                    count: count,
                };
                $.ajax({
                    url: "/users/all?page=" + page,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'GET',
                    dataType: '', // Set the appropriate data type you expect
                    data: data,
                    success: function(response) {
                        $('#all_users_table').html(response);
                        $('#pre_stop').hide();
                        $('.navigation a').attr("disabled", "disabled");
                    }
                });
            }

            // $(document).ready(function() {
            //     $('#user_name').keyup(function() {
            //         getFilterUsers();
            //     });

            //     $('#user_email').keyup(function() {
            //         getFilterUsers();
            //     });

            //     $('#clear').click(function() {
            //         clearFilters();
            //     });

            //     function clearFilters() {
            //         $('#user_name').val('');
            //         $('#user_email').val('');
            //         getFilterUsers();
            //     }

            //     function getFilterUsers(page = 1) {
            //         $('#pre_stop').show();
            //         var name = $('#user_name').val();
            //         var email = $('#user_email').val();
            //         var data = {
            //             name: name,
            //             email: email,
            //         };
            //         $.ajax({
            //             url: "/users?page=" + page,
            //             headers: {
            //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //             },
            //             type: 'GET',
            //             dataType: 'html', // Set the appropriate data type you expect
            //             data: data,
            //             success: function(response) {
            //                 $('#users_table').html(response);
            //                 $('#pre_stop').hide();
            //                 $('.navigation a').attr("disabled", "disabled");
            //             }
            //         });
            //     }
            // });

            // $(document).ready(function() {
            //     // Initialize DataTable with custom settings
            //     var oTable = $('#users_table').({
            //         "language": {
            //             "emptyTable": "No data available in the table",
            //             "paginate": {
            //                 "previous": '<i class="ni ni-bold-left"></i>',
            //                 "next": '<i class="ni ni-bold-right"></i>'
            //             },
            //             "sEmptyTable": "No data available in the table"
            //         },
            //         pageLength: 10,
            //         "lengthChange": false, // Disable "Show entries" dropdown
            //         "searching": false,
            //     });

            //     // Add event listener to the dropdown input
            //     $('#user_name').keyup(function() {
            //         oTable.fnFilter($(this).val());
            //     });
            // });

            $('.user_filter_count').select2({
                placeholder: "Select Count",
                theme: 'bootstrap',
                width: '100%',
            });

            function newUser() {
                $('#name').val('');
                $('#email').val('');
                $('#designation').val('');
                $('#password').val('');
                $("#new-user-modal").modal("show");
            }
        </script>
    @endpush

</x-app-layout>
