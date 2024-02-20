<table class="datatables-basic table dataTable no-footer dtr-column" id="DataTables_Table_0">
    <thead>
        <tr>
            <th class="sorting">Name</th>
            <th class="sorting">Email</th>
            <th class="sorting">Designation</th>
            <th class="sorting">Batch</th>
            <th class="text-center">Image</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($members as $member)
            <tr class="odd">
                <td class="">{{ $member->name }}</td>
                <td class="">{{ $member->email }}</td>
                <td class="">{{ $member->designation }}</td>
                <td class="">{{ $member->batch }}</td>
                <td class="text-center">
                    @isset($member->image)
                        <img src="{{ asset('member_images/' . $member->image->name) }}" alt="Image" width="100"
                            height="100">
                    @else
                        <img src="{{ asset('member_images/default.jpg') }}" alt="Image" width="100" height="100">
                    @endisset

                </td>
                <td class="text-center">
                    <a href="javascript:void(0)" 
                        onclick="editMember({{ $member->id }})">
                        <i class=" tf-icons ti ti-pencil"></i>
                    </a>
                    <a href="javascript:void(0)" class="ms-2"
                        onclick="deleteMember({{ $member->id }})">
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
                Showing {{ $members->firstItem() }} to {{ $members->lastItem() }} of
                {{ $members->total() }} entries
            </div>
        </div>
        <div class="col-6">
            <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                <ul class="pagination">
                    {{-- Previous Page Link --}}
                    <li class="paginate_button page-item {{ $members->onFirstPage() ? 'disabled' : '' }}">
                        <a href="{{ $members->previousPageUrl() }}" rel="prev" class="page-link">Previous</a>
                    </li>

                    {{-- Pagination Elements --}}
                    @for ($i = 1; $i <= $members->lastPage(); $i++)
                        <li class="paginate_button page-item {{ $members->currentPage() == $i ? 'active' : '' }}">
                            <a href="{{ $members->url($i) }}" class="page-link">{{ $i }}</a>
                        </li>
                    @endfor

                    {{-- Next Page Link --}}
                    <li class="paginate_button page-item {{ $members->hasMorePages() ? '' : 'disabled' }}">
                        <a href="{{ $members->nextPageUrl() }}" rel="next" class="page-link">Next</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>