@extends('admin.layouts.app')
@section('content')
    <div class="row">

        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <h4 class="mb-4">
                        Blog & Posts Management
                    </h4>


                </div>
                <div class="col-6 text-end">
                    <button class="btn btn-secondary create-new btn-primary waves-effect waves-light" data-bs-toggle="modal"
                        data-bs-target="#addPostModal" type="button"><span><i class="ti ti-plus me-sm-1"></i> <span
                                class="d-none d-sm-inline-block">Add
                                Post</span></span></button>
                </div>
            </div>

            <div class="card container">
                <div class="card-datatable table-responsive pt-0">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_length" id="DataTables_Table_0_length"><label>Show <select
                                            name="DataTables_Table_0_length" class="form-select" id="page_count"
                                            onchange="getPosts()">
                                            <option value="15" selected>15</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                        </select> entries</label></div>
                            </div>
                            <div class="col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end">
                                <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>Search:<input
                                            type="search" class="form-control" placeholder="Search" oninput="getPosts()"
                                            id="search_value"></label></div>
                            </div>
                        </div>
                        <div id="posts_table">

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Add Post Modal -->
    <div class="modal fade" id="addPostModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-edit-user">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="mb-2">Add New Post</h3>
                        <p class="text-muted">Fill in the form below to add a new Post.</p>
                    </div>
                    <form id="addPostForm" class="row g-3" action="{{ route('posts.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-12 col-md-6">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image" placeholder="Image" />
                        </div>
                        <div class="col-12">
                            <label class="form-label">Content</label>
                            <textarea class="form-control" id="content" name="content" placeholder="Content" rows="5" style="resize: none;"></textarea>
                        </div>
                        <div class="col-12 text-center mt-5">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                aria-label="Close">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Post Modal -->
    <div class="modal fade" id="editPostModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-edit-user">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="mb-2">Edit Post</h3>
                        <p class="text-muted mb-0">Fill in the form below to edit the Post.</p>
                    </div>
                    <form id="editPostForm" class="row g-3" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" id="modalEditPostId" name="id" hidden />
                        <div class="col-12 col-md-6">
                            <label class="form-label
                                ">Title</label>
                            <input type="text" class="form-control" id="modalEditPostTitle" name="title"
                                placeholder="Title" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" id="modalEditPostImage" name="image"
                                placeholder="Image" />
                        </div>
                        <div class="col-12">
                            <label class="form-label">Content</label>
                            <textarea class="form-control" id="modalEditPostContent" name="content" placeholder="Content"
                                rows="5" style="resize: none;"></textarea>
                        </div>


                        <div class="col-12 text-center mt-5">
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
            getPosts();
        });

        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            getPosts(page);
        });

        function getPosts(page = 1) {
            var name = $('#search_value').val();
            var count = $('#page_count').val();
            var data = {
                title: name,
                count: count
            };
            $.ajax({
                url: "/posts/all?page=" + page,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'GET',
                dataType: 'html', // Specify the data type as 'html'
                data: data,
                success: function(response) {
                    $('#posts_table').html(response);
                    $('.pagination a').attr("disabled",
                        false); // Corrected the attribute name and removed unnecessary space
                    $('#addPostForm').trigger("reset");
                }
            });
        }

        function deletePost(id) {
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
                        url: '/posts/' + id + '/delete',
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            getPosts();
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

        function editPost(id) {
            $.ajax({
                url: '/posts/' + id + '/get',
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $('#modalEditPostId').val(response.id);
                    $('#modalEditPostTitle').val(response.title);
                    $('#modalEditPostContent').val(response.content);
                    $('#editPostForm').attr('action', '/posts/' + response.id + '/update');
                    $('#editPostModal').modal('show');
                }
            });
        }
    </script>
@endpush
