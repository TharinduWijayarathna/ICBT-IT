<x-app-layout>
    @section('title', 'Documents | NHDA')
    <x-slot name="header">
        <div class="pb-6 header">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="mt-3 mb-3 row align-items-center">
                        <div class="col-lg-8">
                            <h6 class="mb-0 h2 text__blue d-inline-block">Daily Senders Report</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-block ">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i
                                                class="fas fa-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Daily Senders Report
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        @can('create_documents')
                            <div class="text-right col-lg-4">
                                <a href="javascript:void(0)" class="mb-2 btn btn-sm btn-neutral float-end" id="report-btn">
                                    <i class="fa fa-print"></i> Report
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
                <div class="shadow card">
                    <div class="card-body pt-1">
                        <div class="d-flex flex-column">
                            <div class="shadow-none bg-body border-light">
                                <div class="search-option-bar">
                                    <div class="row pb-1 pt-0">
                                        <div class="col-md-2 pl-3 pr-0">
                                            <h5 for="date">DATE</h5>
                                            <input id="assign_date" type="date" placeholder="Search Date"
                                                class="form-control form-control-sm">
                                        </div>
                                        <div class="col-md-2 pl-1 pr-0">
                                            <h5 for="title">RECIPIENT</h5>
                                            <select name="recipient" id="recipient" class="form-control form-control-sm">
                                                <option value="0">All</option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-1 pl-1 pr-0">
                                            <a href="javascript:void(0)" id="clear"
                                                class="btn btn-sm clear__btn float-end"> CLEAR
                                            </a>
                                        </div>
                                        <div class="mb-2 col-md-7 d-flex justify-content-end pb-0 mr-0 align-items-end"
                                            style="margin-top: 28px">
                                            <select id="document_filter_count" class="form-control form-control-sm "
                                                style="width: auto;">
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
                        <div class="table-responsive" id="all_user_documents_table">

                        </div>
                    </div>
                </div>
            </div>
        </div>



    </x-slot>



    @push('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/print-js/1.6.0/print.css"
            integrity="sha512-tKGnmy6w6vpt8VyMNuWbQtk6D6vwU8VCxUi0kEMXmtgwW+6F70iONzukEUC3gvb+KTJTLzDKAGGWc1R7rmIgxQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.min.js"
            integrity="sha512-i8ERcP8p05PTFQr/s0AZJEtUwLBl18SKlTOZTH0yK5jVU0qL8AIQYbbG5LU+68bdmEqJ6ltBRtCxnmybTbIYpw=="
            crossorigin="anonymous"></script>
        <script>
            $('.dropify').dropify();

            $(document).ready(function() {
                getFilterUserDocuments();
            });

            $('#assign_date').change(function() {
                getFilterUserDocuments();
            });

            $('#recipient').change(function() {
                getFilterUserDocuments();
            });

            $('#clear').click(function() {
                clearFilters();
            });

            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                getFilterUserDocuments(page);
            });

            function clearFilters() {
                $('#assign_date').val('');
                getFilterUserDocuments();
            }

            function getFilterUserDocuments(page = 1) {
                $('#pre_stop').show();
                var date = $('#assign_date').val();
                var recipient = $('#recipient').val();
                var count = $('#document_filter_count').val();
                var data = {
                    date: date,
                    count: count,
                    recipient: recipient,
                };
                $.ajax({
                    url: "/documents/all/user_documents/list?page=" + page,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'GET',
                    dataType: '',
                    data: data,
                    success: function(response) {
                        $('#all_user_documents_table').html(response);
                        $('#pre_stop').hide();
                        $('.navigation a').attr("disabled", "disabled");
                    }
                });
            }

            $('#report-btn').on('click', function() {
                $('#pre_stop').show();
                // Send an AJAX request to the server to store the button click time
                var date = $('#assign_date').val();
                var recipient = $('#recipient').val();
                var data = {
                    date: date,
                    recipient: recipient,
                };
                $.ajax({
                    type: 'POST',
                    url: '{{ route('daily.report') }}',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: data,
                    success: function(response) {

                        $.print(response);


                        // // Create a download link and open in a new tab
                        // var downloadLink = document.createElement('a');
                        // downloadLink.href = response;
                        // downloadLink.target = '_blank'; // Open in a new tab
                        // downloadLink.download = 'daily-senders-report.pdf'; // Set the filename for download

                        // // Trigger a click on the link to start the download
                        // downloadLink.click();

                        // You can also remove the link from the DOM after the download has started
                        // downloadLink.remove();
                        $('#pre_stop').hide();
                    },
                    error: function(xhr, textStatus, error) {
                        $('#pre_stop').hide();
                        console.error(xhr.responseText); // Optional: log the error response
                    }
                });
            });

            $('.document_filter_count').select2({
                placeholder: "Select Count",
                theme: 'bootstrap',
                width: '100%',
            });
        </script>
    @endpush

</x-app-layout>
