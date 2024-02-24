<table class="datatables-basic table dataTable no-footer dtr-column" id="DataTables_Table_0">
    <thead>
        <tr>
            <th class="text-center">Image</th>
            <th class="sorting">Title</th>
            <th class="sorting">Description</th>
            <th class="sorting">Start Date</th>
            <th class="sorting">End Date</th>
            <th class="sorting">Created By</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($events as $event)
            <tr class="odd">
                <td class="text-center">
                    @isset($event->image)
                        <img src="{{ asset('event_images/' . $event->image->name) }}" alt="Image" width="100"
                            height="100">
                    @else
                        <img src="{{ asset('Event_images/default.jpg') }}" alt="Image" width="100" height="100">
                    @endisset

                </td>
                <td class="">{{ $event->title }}</td>
                <td class="">{{ $event->description }}</td>
                <td class="">{{ Date('Y-m-d', strtotime($event->start_date)) }}</td>
                <td class="">{{ Date('Y-m-d', strtotime($event->end_date)) }}</td>
                <td class="">{{ $event->user->name }}</td>
                <td class="text-center">
                    <a href="javascript:void(0)"
                        onclick="editEvent({{ $event->id }})">
                        <i class=" tf-icons ti ti-pencil"></i>
                    </a>
                    <a href="javascript:void(0)" class="ms-2"
                        onclick="deleteEvent({{ $event->id }})">
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
                Showing {{ $events->firstItem() }} to {{ $events->lastItem() }} of
                {{ $events->total() }} entries
            </div>
        </div>
        <div class="col-6">
            <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                <ul class="pagination">
                    {{-- Previous Page Link --}}
                    <li class="paginate_button page-item {{ $events->onFirstPage() ? 'disabled' : '' }}">
                        <a href="{{ $events->previousPageUrl() }}" rel="prev" class="page-link">Previous</a>
                    </li>

                    {{-- Pagination Elements --}}
                    @for ($i = 1; $i <= $events->lastPage(); $i++)
                        <li class="paginate_button page-item {{ $events->currentPage() == $i ? 'active' : '' }}">
                            <a href="{{ $events->url($i) }}" class="page-link">{{ $i }}</a>
                        </li>
                    @endfor

                    {{-- Next Page Link --}}
                    <li class="paginate_button page-item {{ $events->hasMorePages() ? '' : 'disabled' }}">
                        <a href="{{ $events->nextPageUrl() }}" rel="next" class="page-link">Next</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
