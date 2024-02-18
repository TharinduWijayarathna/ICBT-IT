<div>
    <table class="table mb-0 align-items-center " id="users_table">
        <thead>
            <tr class="table__header">
                <th scope="col" class="text-center pl-0">Status</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Designation</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($users as $user)
                <tr onclick="window.open('{{ route('users.edit', $user->id) }}', '_self')">
                    <td class="text-center pl-0">
                        @if ($user->deleted_at != null)
                            <span class="badge badge-danger ">INACTIVE</span>
                        @else
                            <span class="badge badge-success ">ACTIVE</span>
                        @endif
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->designation }}</td>
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
                {!! $users->links() !!}
            </nav>
        </div>
    </div>
</div>
