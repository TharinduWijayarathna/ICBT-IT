<x-app-layout>
    @section('title', 'Documents | NHDA')
    <x-slot name="header">
        <div class="pb-6 header">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="mt-3 mb-3 row align-items-center">
                        <div class="col-lg-8">
                            <h6 class="mb-0 h2 text__blue d-inline-block">Documents Management</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-block ">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i
                                                class="fas fa-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Documents Management
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        @can('create_documents')
                            <div class="text-right col-lg-4">
                                <a href="javascript:void(0)" onclick="newDocument()"
                                    class="mb-2 btn btn-sm btn-neutral float-end">
                                    <i class="fa fa-plus-circle"></i> ADD NEW
                                </a>
                                {{-- <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#new-document-modal"
                                class="mb-2 btn btn-sm btn-neutral float-end">
                                <i class="fa fa-plus-circle"></i> ADD NEW
                            </a> --}}
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
                                        <div class="col-md-2 pr-0">
                                            <h5 for="ref_no">LETTER REF. NO.</h5>
                                            <input id="document_ref_no" type="text" placeholder="Search Ref. No."
                                                class="form-control form-control-sm">
                                        </div>
                                        <div class="col-md-2 pl-1 pr-0">
                                            <h5 for="title">TITLE</h5>
                                            <input id="document_title" type="text" placeholder="Search Title"
                                                class="form-control form-control-sm">
                                        </div>
                                        <div class="col-md-2 pl-1 pr-0">
                                            <h5 for="title">SENDER NAME</h5>
                                            <input id="document_sender_name" type="text"
                                                placeholder="Search Sender Name" class="form-control form-control-sm">
                                        </div>
                                        <div class="col-md-2 pl-1 pr-0">
                                            <h5 for="date">FROM_DATE</h5>
                                            <input id="document_from_date" type="date" placeholder="Search From Date"
                                                class="form-control form-control-sm">
                                        </div>
                                        <div class="col-md-2 pl-1 pr-0">
                                            <h5 for="date">TO_DATE</h5>
                                            <input id="document_to_date" type="date" placeholder="Search To Date"
                                                class="form-control form-control-sm">
                                        </div>
                                        {{-- <div class="col-md-2 pl-1 pr-0">
                                            <h5 for="date">DATE</h5>
                                            <input id="document_date" type="date" placeholder="Search Date"
                                                class="form-control form-control-sm">
                                        </div> --}}
                                        <div class="col-md-1 pl-1 pr-0">
                                            <a href="javascript:void(0)" id="clear"
                                                class="btn btn-sm clear__btn float-end"> CLEAR
                                            </a>
                                        </div>
                                        <div class="mb-2 col-md-1 d-flex justify-content-end pb-0 mr-0 align-items-end"
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
                        <div class="table-responsive" id="all_documents_table">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    @push('modals')
        <div class="modal fade" id="new-document-modal" data-bs-backdrop="static" tabindex="-1" role="dialog"
            aria-labelledby="new-document-modal" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-bolder text-primary" id="add_brandLabel">
                            NEW DOCUMENT</h5>
                        <button type="button" class="close btn" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="fa fa-times"></i>
                            </span>
                        </button>
                    </div>
                    <div class="p-0 modal-body">
                        <div class="card ">
                            <div class="card-body" style="padding-bottom: 8px;">
                                <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <label class="col-md-3 form-control-label" for="name">DATE</label>
                                        <div class="col-md-9">
                                            <input type="date" name="date" placeholder="Date"
                                                class="form-control form-control-alternative" style="color: #0a0a0a"
                                                value="{{ date('Y-m-d') }}" required>
                                        </div>
                                    </div>
                                    {{-- <div class="row mt-2">
                                        <label class="col-md-3 form-control-label" for="name">LETTER REF. NO.</label>
                                        <div class="col-md-9">
                                            <input type="text" id="input_ref_no" name="ref_no" placeholder="Letter Reference Number"
                                                class="form-control form-control-alternative" style="color: #0a0a0a"
                                                required>
                                        </div>
                                    </div> --}}
                                    <div class="row mt-2">
                                        <label class="col-md-3 form-control-label" for="name">TITLE</label>
                                        <div class="col-md-9">
                                            <input type="text" id="input_title" name="title" placeholder="Title"
                                                class="form-control form-control-alternative" style="color: #0a0a0a"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <label class="col-md-3 form-control-label" for="name">SENDER NAME</label>
                                        <div class="col-md-9">
                                            <input type="text" id="input_sender_name" name="sender_name"
                                                placeholder="Sender Name" class="form-control form-control-alternative"
                                                style="color: #0a0a0a" required>
                                        </div>
                                    </div>
                                    <!-- <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="description">Description</label>
                                                        <textarea name="description" placeholder="Description" id="description"
                                                            class="form-control form-control-alternative" cols="30" rows="5" required></textarea>
                                                    </div>
                                                </div>
                                            </div> -->
                                    <!-- <div class="row mt-2 mb-1">
                                        <label class="col-md-3 form-control-label">DOCUMENT</label>
                                        <div class="col-md-9">
                                            <input type="file" class="form-control form-control-alternative dropify"
                                                name="files[]" id="inp_file"
                                                accept="image/jpg, image/jpeg, image/png, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                                                required multiple>
                                        </div>
                                    </div> -->
                                    <div class="row mt-3 mb-2">
                                        <label class="col-md-3 form-control-label">DOCUMENTS</label>
                                        <div class="col-lg-9">
                                            <input type="file"
                                                accept="image/jpg, image/jpeg, image/png, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                                                class="form-control form-control-alternative dropify" name="files[]" max="20971520" multiple>
                                        </div>
                                    </div>
                                    @can('create_documents')
                                        <div class="row">
                                            <div class="col-lg-12 text-right">
                                                <button type="submit" class="btn btn-sm btn-info">Create</button>
                                            </div>
                                        </div>
                                    @endcan
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
            $('.dropify').dropify();

            $(document).ready(function() {
                getFilterDocuments();
            });

            $('#document_from_date').change(function() {
                getFilterDocuments();
            });

            $('#document_to_date').change(function() {
                getFilterDocuments();
            });

            // $('#document_date').change(function() {
            //     getFilterDocuments();
            // });

            $('#document_title').keyup(function() {
                getFilterDocuments();
            });

            $('#document_sender_name').keyup(function() {
                getFilterDocuments();
            });

            $('#document_ref_no').keyup(function() {
                getFilterDocuments();
            });

            $('#document_filter_count').change(function() {
                getFilterDocuments();
            });

            $('#clear').click(function() {
                clearFilters();
            });

            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                getFilterDocuments(page);
            });

            function clearFilters() {
                $('#document_title').val('');
                $('#document_sender_name').val('');
                $('#document_from_date').val('');
                $('#document_to_date').val('');
                // $('#document_date').val('');
                $('#document_ref_no').val('');
                getFilterDocuments();
            }

            function getFilterDocuments(page = 1) {
                $('#pre_stop').show();
                var title = $('#document_title').val();
                var sender_name = $('#document_sender_name').val();
                var from_date = $('#document_from_date').val();
                var to_date = $('#document_to_date').val();
                // var date = $('#document_date').val();
                var ref_no = $('#document_ref_no').val();
                var count = $('#document_filter_count').val();
                var data = {
                    title: title,
                    sender_name: sender_name,
                    from_date: from_date,
                    to_date: to_date,
                    // date: date,
                    ref_no: ref_no,
                    count: count,
                };
                $.ajax({
                    url: "/documents/all/list?page=" + page,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'GET',
                    dataType: '',
                    data: data,
                    success: function(response) {
                        $('#all_documents_table').html(response);
                        $('#pre_stop').hide();
                        $('.navigation a').attr("disabled", "disabled");
                    }
                });
            }

            $('.document_filter_count').select2({
                placeholder: "Select Count",
                theme: 'bootstrap',
                width: '100%',
            });

            function newDocument() {
                $('#input_ref_no').val('');
                $('#input_title').val('');
                $('#input_sender_name').val('');
                $('#inp_file').val('').trigger('change');
                $("#new-document-modal").modal("show");
            }
        </script>
    @endpush

</x-app-layout>
