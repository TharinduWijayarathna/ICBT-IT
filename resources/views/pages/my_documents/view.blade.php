<x-app-layout>
    @section('title', 'Document View | NHDA')
    <x-slot name="header">
        <div class="pb-6 header">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="py-4 row align-items-center">
                        <div class="col-lg-8">
                            <h6 class="mb-0 h2 text__blue d-inline-block">My Documents</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-block ">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><i
                                                class="fas fa-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('my-documents.all') }}">
                                            My Documents
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        {{ $document->title }}</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-lg-4 text-right">
                            <!-- @can('download_my_documents') -->
                                <!-- @if ($tc->getImage($document->file))
                                    <a href="{{ $tc->getImage($document->file) }}" target="_blank"
                                        class="btn btn-sm btn-neutral float-end">
                                        <i class="fa fa-print"></i> Print
                                    </a>
                                @endif -->
                                <!-- @if ($tc->getImage($document->file))
                                    <a href="{{ $tc->getImage($document->file) }}" target="_blank"
                                        class="btn btn-sm btn-neutral float-end" download id="download-button">
                                        <i class="fa fa-download"></i> Download
                                    </a>
                                @endif -->

                            <!-- @endcan -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="mt-4 row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <label for="" class="col-md-3">
                                <b>
                                    Date
                                </b>
                            </label>
                            <h4 class="text-dark col-md-9">{{ $document->date }}</h4>
                        </div>
                        <div class="row mb-2">
                            <label for="" class="col-md-3">
                                <b>
                                    Letter Reference No.
                                </b>
                            </label>
                            <h4 class="text-dark col-md-9">{{ $document->ref_no }}</h4>
                        </div>
                        <div class="row mb-2">
                            <label for="" class="col-md-3">
                                <b>
                                    Title
                                </b>
                            </label>
                            <h4 class="text-dark col-md-9">{{ $document->title }}</h4>
                        </div>
                        <div class="row mb-2">
                            <label for="" class="col-md-3">
                                <b>
                                    Sender Name
                                </b>
                            </label>
                            <h4 class="text-dark col-md-9">{{ $document->sender_name }}</h4>
                        </div>
                        <form action="{{ route('my-documents.reply.date', $document->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-2">
                                <label for="" class="col-md-3">
                                    <b>
                                        Reply Date
                                    </b>
                                </label>
                                <input type="date" name="reply_date" placeholder="Date"
                                    class="col-md-2 form-control form-control-alternative" style="color: #0a0a0a; height: 30px;"
                                    value="{{ $document->reply_date }}" required>
                                    @can('update_my_documents')
                                        <button type="submit" class="btn btn-sm btn-round btn-info ml-2" style="height:30px; padding-left:10px; padding-right:10px; font-size:15px;">
                                            <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                        </button>
                                    @endcan
                            </div>
                        </form>
                        <div class="mb-2">
                            <label for="">
                                <b>
                                    Documents
                                </b>
                            </label>
                            @forelse($document_files as $file)
                                @can('download_my_documents')
                                    <div class="col-lg-12 text-right mt-2 mb-2">
                                    @if ($tc->getImage($file->file_path))
                                        <a href="{{ $tc->getImage($file->file_path) }}" target="_blank"
                                            class="btn btn-sm btn-neutral float-end">
                                            <i class="fa fa-print"></i> Print
                                        </a>
                                    @endif
                                    @if ($tc->getImage($file->file_path))
                                            <a href="{{ $tc->getImage($file->file_path) }}" target="_blank"
                                                class="btn btn-sm btn-neutral float-end" download id="download-button">
                                                <i class="fa fa-download"></i> Download
                                            </a>
                                    @endif
                                    </div>
                                @endcan
                            <iframe src="{{ $tc->getImageForView($file->file_path) }}" frameborder="0"
                                style="width:100%;min-height:640px;"></iframe>
                            @empty
                                <div colspan="10" class="text-center">
                                    No files found
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    @push('scripts')
        <script>
            setTimeout(function() {
                $('#pre_stop').hide();
            }, 500);

            $('.dropify').dropify();

            $('#download-button').on('click', function() {
                // Send an AJAX request to the server to store the button click time
                $.ajax({
                    type: 'POST',
                    url: '{{ route('store.button.click', ['documents_id' => $document->id]) }}',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log(response.message); // Optional: log the response message
                    },
                    error: function(xhr, textStatus, error) {
                        console.error(xhr.responseText); // Optional: log the error response
                    }
                });
            });

            $('#reply-button').on('click', function() {
                // Send an AJAX request to the server to store the button click time
                $.ajax({
                    type: 'POST',
                    url: '{{ route('my-documents.reply.date', ['documents_id' => $document->id]) }}',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log(response.message); // Optional: log the response message
                    },
                    error: function(xhr, textStatus, error) {
                        console.error(xhr.responseText); // Optional: log the error response
                    }
                });
            });
        </script>
    @endpush
</x-app-layout>



@section('css')
    <style>
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
    </style>
@endsection
