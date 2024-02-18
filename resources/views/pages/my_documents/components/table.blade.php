<div>
    <table class="table mb-0 align-items-center " id="document-table">
        <thead>
            <tr class="table__header">
                <th scope="cl">
                    Letter Ref. No.
                </th>
                <th scope="col">
                    Title
                </th>
                <th scope="col">
                    Sender Name
                </th>

                <!-- <th scope="col">
                    Description
                </th> -->

                <th scope="col">
                    Created by
                </th>

                <th scope="col">
                    Updated by
                </th>

                <th scope="col">
                    Date
                </th>
            </tr>
        </thead>

        <tbody>
            @forelse ($documents as $document)
                <tr onclick="window.open('{{ route('my-documents.view', $document->id) }}', '_self')">
                    <td>
                        {{ $document->ref_no }}
                    </td>
                    <td>
                        {{ $document->title }}
                    </td>
                    <td>
                        {{ $document->sender_name }}
                    </td>
<!--
                    <td>
                        {{ $document->description }}
                    </td> -->

                    <td>
                        {{ $document->createdBy ? $document->createdBy->name : '' }}
                    </td>

                    <td>
                        {{ $document->updatedBy ? $document->updatedBy->name : '' }}
                    </td>

                    <td>
                        {{ $document->date }}
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
            <nav aria-label="navigation" class="navigation ml-aut">
                {!! $documents->links() !!}
            </nav>
        </div>
    </div>
</div>
