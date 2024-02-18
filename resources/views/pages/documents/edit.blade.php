<x-app-layout>
    @section('title', 'Document Location | NHDA')
    <x-slot name="header">
        <div class="pb-6 header">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="py-4 row align-items-center">
                        <div class="col-lg-8">
                            <h6 class="mb-0 h2 text__blue d-inline-block">Document Management</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-block ">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i
                                                class="fas fa-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('documents.all') }}">
                                            Document Management
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        {{ $document->title }}</li>
                                </ol>
                            </nav>
                        </div>
                        <!-- <div class="col-lg-4 text-right">
                            @if ($tc->getImage($document->file))
                                <a href="{{ $tc->getImage($document->file) }}" target="_blank"
                                    class="btn btn-sm btn-neutral float-end" download>
                                    <i class="fa fa-download"></i> DOWNLOAD
                                </a>
                            @endif
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="mt-4 row">
            <div class="col-lg-2 pr-0">
                <div class="nav-wrapper-loc">
                    <ul class="nav nav-pills nav-fill flex-column" id="tabs-icons-text" role="tablist">
                        <li class="mb-2 nav-item">
                            <a class="nav-link active" id="tabs-icons-text-1-tab" data-toggle="tab"
                                href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1"
                                aria-selected="true">
                                Basic Details</a>
                        </li>
                        @can('read_documents_assign_user')
                        <li class="mb-2 nav-item">
                            <a class="nav-link" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2"
                                role="tab" aria-controls="tabs-icons-text-2" aria-selected="false">
                                Assignees
                            </a>
                        </li>
                        @endcan
                        <li hidden></li>
                    </ul>
                </div>

            </div>
            <div class="col-lg-10 py-0">
                <div class="shadow card ">
                    <div class="card-body pb-2">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel">
                                <form action="{{ route('documents.update', $document->id) }}" method="POST"
                                    id="update-form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <label class="col-md-3 form-control-label" for="name">DATE</label>
                                        <div class="col-lg-9">
                                            <input type="date" name="date" placeholder="Date"
                                                value="{{ $document->date }}"
                                                class="form-control form-control-alternative" style="color: #0a0a0a"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <label class="col-md-3 form-control-label" for="name">LETTER REF.
                                            NO.</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="ref_no" placeholder="Letter Reference Number"
                                                value="{{ $document->ref_no }}"
                                                class="form-control form-control-alternative" style="color: #0a0a0a"
                                                required disabled>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <label class="col-md-3 form-control-label" for="name">TITLE</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="title" placeholder="Title"
                                                value="{{ $document->title }}"
                                                class="form-control form-control-alternative" style="color: #0a0a0a"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <label class="col-md-3 form-control-label" for="name">SENDER NAME</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="sender_name" placeholder="Sender Name"
                                                value="{{ $document->sender_name }}"
                                                class="form-control form-control-alternative" style="color: #0a0a0a"
                                                required>
                                        </div>
                                    </div>
                                    <!-- <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="description">Description</label>
                                                <textarea name="description" placeholder="Description" id="description"
                                                    class="form-control form-control-alternative no-resize" cols="30" rows="5" required>{{ $document->description }}</textarea>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- <div class="row mt-3 mb-2">
                                        <label class="col-md-3 form-control-label">DOCUMENT</label>
                                        <div class="col-lg-9">
                                            <input type="file"
                                                class="form-control form-control-alternative dropify" name="files"
                                                id="inp_file"
                                                data-default-file="{{ $document->file ? $tc->getImageForView($document->file) : asset('img/no.jpg') }}"
                                                accept="image/jpg, image/jpeg, image/png, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document">
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
                                    <div class="row">
                                        <div class="col-lg-12 text-right pl-0">
                                            @can('delete_documents')
                                                <a href="javascript:void(0)" class="btn btn-sm btn-danger" title=""
                                                    onclick="delconf('{{ route('documents.delete', $document->id) }}')">DELETE</a>
                                            @endcan
                                            @can('create_documents')
                                                <button type="submit" class="btn btn-sm btn-info"
                                                    id="update-button">UPDATE</button>
                                            @endcan
                                        </div>
                                    </div>
                                </form>
                                <table class="table mb-0 mt-2 align-items-center " id="document-table">
                                    <thead >
                                        <tr class="table__header">
                                            <th scope="cl">
                                                DOCUMENT
                                            </th>
                                            <th scope="col" class="text-right">
                                                ACTION
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($document_files as $file)
                                            <tr>
                                                <td>
                                                    @php
                                                        $extension = pathinfo($tc->getImageForView($file->file_path), PATHINFO_EXTENSION);
                                                    @endphp
                                                    @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'bmp']))
                                                        <!-- Display Image Preview -->
                                                        <img src="{{ asset($tc->getImageForView($file->file_path)) }}" alt="File" style="max-width: 150px; max-height: 150px;">
                                                    @elseif (in_array($extension, ['pdf']))
                                                        <!-- Display PDF Preview -->
                                                        <iframe src="{{ asset($tc->getImageForView($file->file_path)) }}" width="150" height="150"></iframe>
                                                    @elseif (in_array($extension, ['doc', 'docx']))
                                                        <!-- Display Document Preview (You may need to use a library for this) -->
                                                        <iframe src="{{ asset($tc->getImageForView($file->file_path)) }}" width="100%" height="500"></iframe>
                                                        <!-- <div  style="max-width: 150px; max-height: 150px;">{!! $tc->displayDocument($file->file_path) !!}</div> -->
                                                    @else
                                                        <!-- Display a generic fallback for unsupported file types -->
                                                        <p>Unsupported File Type</p>
                                                    @endif
                                                    <!-- <img src="{{ asset($tc->getImageForView($file->file_path)) }}" alt="File" style="max-width: 150px; max-height:150px;"> -->
                                                    {{ $file->file_name }}
                                                </td>
                                                <td  class="text-right">
                                                     @if ($tc->getImage($file->file_path))
                                                        <a href="{{ $tc->getImage($file->file_path) }}" target="_blank"
                                                            class="btn btn-sm btn-neutral float-end" download>
                                                            <i class="fa fa-download"></i>  DOWNLOAD
                                                        </a>
                                                    @endif 
                                                     <a href="javascript:void(0)" class="btn btn-sm btn-danger" title=""
                                                    onclick="delconf('{{ route('document.file.delete', $file->id) }}')"> 
                                                   <i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="10" class="text-center">
                                                    No files found
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>                            </div>
                            <div class="tab-pane fade " id="tabs-icons-text-2" role="tabpanel"
                                aria-labelledby="tabs-icons-text-2-tab">
                                <div class="row">
                                    {{-- <div class="mb-1 col-md-1 d-flex pb-0 pl-0">
                                        <select id="user_document_filter_count"
                                            class="form-control form-control-sm " style="width: auto; margin-top: -12px">
                                            <option value="20" selected>20</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                            <option value="200">200</option>
                                        </select>
                                    </div> --}}

                                    @can('add_documents_user')
                                        <div class="col-md-12 text-right p-0" style="margin-top: -12px;">
                                            <a href="javascript:void(0)" onclick="newUser()"
                                                class=" btn btn-sm btn-neutral float-end">
                                                <i class="fa fa-plus-circle"></i> ADD NEW
                                            </a>
                                        </div>
                                    @endcan
                                    <div class="col-lg-12 mt-2 p-0">
                                        <div class="table-responsive" id="all_document_users_table">
                                            {{-- <table class="table align-items-center table-flush"
                                                id="document_users_table">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Email</th>
                                                        <th scope="col">Designation</th>
                                                        <th scope="col">View</th>
                                                        <th scope="col">View Date & Time</th>
                                                        <th scope="col">Downloaded Date & Time</th>
                                                        <th scope="col">Reply Date</th>
                                                        @can('delete_documents_user')
                                                            <th scope="col" class="text-center ">Action</th>
                                                        @endcan

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($document->documentUsers as $documentUser)
                                                        <tr>
                                                            <td class="no-padding">{{ $documentUser->user->name }}
                                                            </td>
                                                            <td class="no-padding">{{ $documentUser->user->email }}
                                                            </td>
                                                            <td class="no-padding">
                                                                {{ $documentUser->user->designation }}</td>
                                                            <td class="no-padding">
                                                                @if ($documentUser->status == 1)
                                                                    <span class="badge badge-success">Yes</span>
                                                                @else
                                                                    <span class="badge badge-danger">No</span>
                                                                @endif
                                                            </td>
                                                            <td class="no-padding">{{ $documentUser->updated_at }}
                                                            </td>
                                                            <td class="no-padding">
                                                                {{ $documentUser->downloaded_at }}
                                                            </td>
                                                            <td class="no-padding">
                                                                {{ $documentUser->reply_at }}
                                                            </td>
                                                            @can('delete_documents_user')
                                                                <td class="text-center no-padding ">
                                                                    <a href="javascript:void(0)"
                                                                        onclick="delconf('{{ route('documents.user.delete', $documentUser->id) }}')"
                                                                        class="text__blue">
                                                                        <i class="fa fa-trash"></i>
                                                                    </a>
                                                                </td>
                                                            @endcan
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    @push('modals')
        <div class="modal fade" id="new-user-modal" data-bs-backdrop="static" tabindex="-1" role="dialog"
            aria-labelledby="new-user-modal" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-bolder text-primary" id="add_brandLabel">
                            ADD USER</h5>
                        <button type="button" class="close btn" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="fa fa-times"></i>
                            </span>
                        </button>
                    </div>
                    <div class="p-0 modal-body">
                        <div class="card card-plain">
                            <div class="card-body" style="padding-bottom: 8px;">
                                <form action="{{ route('documents.user.add') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-2">
                                        <label class="col-md-2 form-control-label" for="name">USER</label>
                                        <div class="col-lg-10">
                                            <select name="user_ids[]" id="users_select" class="form-control"
                                                placeholder="Select User" multiple required>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">
                                                        {{ $user->name . ' - ' . $user->email }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    @can('update_documents')
                                        <div class="row">
                                            <div class="col-lg-12 text-right">
                                                <input type="hidden" name="document_id" value="{{ $document->id }}">
                                                <button type="submit" class="btn btn-sm btn-info">ADD</button>
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

    @push('scripts')
        <script>
            setTimeout(function() {
                $('#pre_stop').hide();
            }, 500);

            // const fileInput = document.querySelector('input[name="files"]');
            // const submitButton = document.getElementById('submit-btn');

            // fileInput.addEventListener('change', () => {
            //     if (fileInput.files.length > 0) {
            //         // If a file is selected, enable the submit button
            //         submitButton.removeAttribute('disabled');
            //     } else {
            //         // If no file is selected, disable the submit button
            //         submitButton.setAttribute('disabled', 'disabled');
            //     }
            // });



            // $('#update-form').on('submit', function (e) {
            //     e.preventDefault(); // Prevent the form from submitting normally

            //     var form = $(this);

            //     // Perform the form submission using AJAX
            //     $.ajax({
            //         url: form.attr('action'),
            //         method: 'POST',
            //         data: form.serialize(),
            //         success: function (response) {
            //             // Update the button state after a successful update
            //             $('#update-button').prop('disabled', true);
            //         },
            //         error: function (xhr, status, error) {
            //             // Handle error if needed
            //         }
            //     });
            // });



            $(document).ready(function() {
                getUserDocuments();
            });

            $('#user_document_filter_count').change(function() {
                getUserDocuments();
            });

            $('.dropify').dropify();

            // $('#document_users_table').dataTable({
            //     pageLength: 10,
            //     lengthMenu: [10, 20, 50],
            //     "language": {
            //         "emptyTable": "No data available in the table",
            //         "paginate": {
            //             "previous": '<i class="ni ni-bold-left"></i>',
            //             "next": '<i class="ni ni-bold-right"></i>'
            //         },
            //         "sEmptyTable": "No data available in the table"
            //     },
            //     "lengthChange": false, // Disable "Show entries" dropdown
            //     "searching": false,
            // });

            function getUserDocuments(page = 1) {

                $('#pre_stop').show();
                var count = $('#user_document_filter_count').val();
                var data = {
                    document_id :{{ $document->id }},
                    count: count,
                };

                $.ajax({
                    url: "/documents/all/user/list?page=" + page,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'GET',
                    dataType: '',
                    data: data,
                    success: function(response) {
                        $('#all_document_users_table').html(response);
                        $('#pre_stop').hide();
                        $('.navigation a').attr("disabled", "disabled");
                    }
                });
            }

            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                getUserDocuments(page);
            });

            $('.user_document_filter_count').select2({
                placeholder: "Select Count",
                theme: 'bootstrap',
                width: '100%',
            });

            $('#users_select').select2({
                placeholder: "Select Users",
                theme: 'bootstrap',
                width: '100%',
                dropdownParent: $('#new-user-modal'),
                dropdownAutoWidth: true,
                allowClear: true,
            });

            function newUser() {
                $('#users_select').val('').trigger('change');
                $("#new-user-modal").modal("show");
            }
        </script>
    @endpush
</x-app-layout>



@section('css')
    <style>
        .text-right {
            text-align: right;
        }

        .bg-light-media {
            background-color: #fff !important;
        }

        .btn-link_edit {
            font-weight: 400 !important;
            color: #007bff !important;
            text-decoration: none;
            padding: 5px;
        }

        .alert-light {
            color: #697091;
            background-color: #ececec;
            border-color: #fdfdfe;
        }

        .close {
            float: right;
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1;
            color: #000;
            text-shadow: 0 1px 0 #fff;
            opacity: .5;
        }

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: #fff;
            background-color: #1c4862;
        }

        .dropdown-menu-image {
            position: fixed !important;
        }

        label {
            display: block;
            margin-bottom: .5rem;
        }

        .nav-wrapper-loc {
            padding: 0rem 0;
            border-top-left-radius: 0.375rem;
            border-top-right-radius: 0.375rem;
        }

        .no-padding {
            padding: 0px 0px !important;
        }
    </style>
@endsection
