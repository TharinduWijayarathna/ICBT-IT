@php
    use Carbon\Carbon;
@endphp

<div>
    <table class="table mb-0 align-items-center " id="document-table">
        <thead>
            <tr class="table__header">
                <th scope="cl">
                    Letter Ref. No.
                </th>
                <th scope="col">
                    Heading
                </th>
                <th scope="col">
                    Recipient
                </th>
                <th scope="col">
                    Date & Time
                </th>

            </tr>
        </thead>

        <tbody>
            @forelse ($usersDocuments as $document)
                <tr>
                    <td>
                        {{ $document->ref_no }}
                    </td>
                    <td>
                        {{ $document->document_name }}
                    </td>
                    <td>
                        {{ $document->sender_name }}
                    </td>
                    <td>
                        {{ $document->created_date }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="10" class="text-center">
                        No documents found
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="row">
        <div class="col-md-12 pagination_align">
            <!-- Pagination -->
            <nav aria-label="navigation" class="navigation">
                {!! $usersDocuments->links() !!}
            </nav>
        </div>
    </div>
</div>
