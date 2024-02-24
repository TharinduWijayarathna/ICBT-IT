@extends('admin.layouts.app')
@section('content')
    <div class="row">

        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <h4 class="mb-4">
                        Event Management
                    </h4>


                </div>
                <div class="col-6 text-end">
                    <button class="btn btn-secondary create-new btn-primary waves-effect waves-light" data-bs-toggle="modal"
                        data-bs-target="#addEventModal" type="button"><span><i class="ti ti-plus me-sm-1"></i> <span
                                class="d-none d-sm-inline-block">Add
                                Event</span></span></button>
                </div>
            </div>

            <div class="card container">
                <div class="card-datatable table-responsive pt-0">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_length" id="DataTables_Table_0_length"><label>Show <select
                                            name="DataTables_Table_0_length" class="form-select" id="page_count"
                                            onchange="getEvents()">
                                            <option value="15" selected>15</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                        </select> entries</label></div>
                            </div>
                            <div class="col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end">
                                <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>Search:<input
                                            type="search" class="form-control" placeholder="Search" oninput="getEvents()"
                                            id="search_value"></label></div>
                            </div>
                        </div>
                        <div id="events_table">

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Add Event Modal -->
    <div class="modal fade" id="addEventModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-edit-event">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="mb-2">Add New Event</h3>
                        <p class="text-muted">Fill in the form below to add a new Event.</p>
                    </div>
                    <form id="addEventForm" class="row g-3" action="{{ route('events.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-12 col-md-6">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Title" />
                        </div>


                        <div class="col-12 col-md-6">
                            <label class="form-label">Start Date</label>
                            <input type="date" class="form-control" name="start_date" placeholder="Start Date" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">End Date</label>
                            <input type="date" class="form-control" name="end_date" placeholder="End Date" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" name="image" placeholder="Image" />
                        </div>

                        <div class="col-12">
                            <label class="form-label ">Description</label>
                            <textarea class="form-control" name="description" placeholder="Description" style="resize: none;" rows="5"></textarea>
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

    <!-- Edit Event Modal -->
    <div class="modal fade" id="editEventModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-edit-Event">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="mb-2">Edit Event</h3>
                        <p class="text-muted mb-0">Fill in the form below to edit the Event.</p>
                    </div>
                    <form id="editEventForm" class="row g-3" action="" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="text" id="modalEditEventId" name="id" hidden />
                        <div class="col-12 col-md-6">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Title"
                                id="modalEditEventTitle" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">Start Date</label>
                            <input type="date" class="form-control" name="start_date" placeholder="Start Date"
                                id="modalEditEventStartDate" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">End Date</label>
                            <input type="date" class="form-control"name="end_date" placeholder="End Date"
                                id="modalEditEventEndDate" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" name="image" placeholder="Image" />
                        </div>
                        <div class="col-12">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" placeholder="Description" style="resize: none;" rows="5"
                                id="modalEditEventDescription">
                            </textarea>
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
            getEvents();
        });

        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            getEvents(page);
        });

        function getEvents(page = 1) {
            var name = $('#search_value').val();
            var count = $('#page_count').val();
            var data = {
                title: name,
                count: count
            };
            $.ajax({
                url: "/events/all?page=" + page,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'GET',
                dataType: 'html', // Specify the data type as 'html'
                data: data,
                success: function(response) {
                    $('#events_table').html(response);
                    $('.pagination a').attr("disabled",
                        false); // Corrected the attribute name and removed unnecessary space
                    $('#addEventForm').trigger("reset");
                }
            });
        }

        function deleteEvent(id) {
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
                        url: '/events/' + id + '/delete',
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            getEvents();
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

        function editEvent(id) {
            $.ajax({
                url: '/events/' + id + '/get',
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $('#modalEditEventId').val(response.id);
                    $('#modalEditEventTitle').val(response.title);

                    // Convert date strings to JavaScript Date objects
                    var startDate = new Date(response.start_date);
                    var endDate = new Date(response.end_date);

                    // Format the dates as strings in 'YYYY-MM-DD' format
                    var formattedStartDate = startDate.toISOString().split('T')[0];
                    var formattedEndDate = endDate.toISOString().split('T')[0];

                    $('#modalEditEventStartDate').val(formattedStartDate);
                    $('#modalEditEventEndDate').val(formattedEndDate);

                    $('#modalEditEventDescription').val(response.description);
                    $('#editEventForm').attr('action', '/events/' + response.id + '/update');
                    $('#editEventModal').modal('show');
                }
            });
        }
    </script>
@endpush
