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

                <!-- <th scope="col">
                    Actions
                </th> -->
            </tr>
        </thead>

        <tbody>
            @forelse ($documents as $document)
                <tr  onclick="window.open('{{ route('documents.edit', $document->id) }}', '_self')">
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

                    <!-- <td>
                        <div class="dropdown no-arrow mb-1"> -->
                            <!-- <a class="btn btn-sm btn-icon-only text-dark" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cog"></i> </a>
                            <div class="dropdown-menu dropdown-menu-left shadow animated--fade-in"
                                aria-labelledby="dropdownMenuButton" x-placement="bottom-start"
                                style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;"> -->
                                <!-- @can('update_documents')
                                <a class="dropdown-item edit-product" href="{{ route('documents.edit', $document->id) }}">
                                    <i class="fas fa-edit"></i>&nbsp;
                                </a>
                                @endcan
                            </div> -->
                        <!-- </div>
                    </td> -->
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
                {!! $documents->links() !!}
            </nav>
        </div>
    </div>
</div>
