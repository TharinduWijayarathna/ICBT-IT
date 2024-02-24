<table class="datatables-basic table dataTable no-footer dtr-column" id="DataTables_Table_0">
    <thead>
        <tr>
            <th class="text-center">Image</th>
            <th class="sorting">Title</th>
            <th class="sorting">Content</th>
            <th class="sorting">Published Date</th>
            <th class="sorting">Created By</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr class="odd">
                <td class="text-center">
                    @isset($post->image)
                        <img src="{{ asset('post_images/' . $post->image->name) }}" alt="Image" width="100"
                            height="100">
                    @else
                        <img src="{{ asset('member_images/default.jpg') }}" alt="Image" width="100" height="100">
                    @endisset
                </td>
                <td class="">{{ $post->title }}</td>
                <td class="">{{ $post->content }}</td>
                <td class="">{{ $post->created_at->format('Y-m-d') }}</td>
                <td class="">{{ $post->user->name }}</td>
                <td class="text-center">
                    <a href="javascript:void(0)" onclick="editPost({{ $post->id }})">
                        <i class=" tf-icons ti ti-pencil"></i>
                    </a>
                    <a href="javascript:void(0)" class="ms-2" onclick="deletePost({{ $post->id }})">
                        <i class="tf-icons ti ti-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">
                Showing {{ $posts->firstItem() }} to {{ $posts->lastItem() }} of
                {{ $posts->total() }} entries
            </div>
        </div>
        <div class="col-6">
            <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                <ul class="pagination">
                    {{-- Previous Page Link --}}
                    <li class="paginate_button page-item {{ $posts->onFirstPage() ? 'disabled' : '' }}">
                        <a href="{{ $posts->previousPageUrl() }}" rel="prev" class="page-link">Previous</a>
                    </li>

                    {{-- Pagination Elements --}}
                    @for ($i = 1; $i <= $posts->lastPage(); $i++)
                        <li class="paginate_button page-item {{ $posts->currentPage() == $i ? 'active' : '' }}">
                            <a href="{{ $posts->url($i) }}" class="page-link">{{ $i }}</a>
                        </li>
                    @endfor

                    {{-- Next Page Link --}}
                    <li class="paginate_button page-item {{ $posts->hasMorePages() ? '' : 'disabled' }}">
                        <a href="{{ $posts->nextPageUrl() }}" rel="next" class="page-link">Next</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
