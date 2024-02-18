<div>
    <table class="table align-items-center table-flush mt-1" id="document_users_table">
        <thead class="table__header">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Designation</th>
                <th scope="col">View</th>
                <th scope="col">View Date & Time</th>
                <th scope="col">Downloaded Date & Time</th>
                <th scope="col">Reply Date</th>
                @can('delete_documents_user')
                    <th scope="col" class="text-center">Action</th>
                @endcan

            </tr>
        </thead>
        <tbody>
            @forelse ($documents as $documentUser)
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
                @empty
                <tr>
                    <td colspan="10" class="text-center">
                        No assign users found
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>
<div class="row pagination_div">
    <div class="col-md-12 pagination_align">
        <!-- Pagination -->
        <nav aria-label="navigation" class="navigation">
            {!! $documents->links() !!}
        </nav>
    </div>
</div>

