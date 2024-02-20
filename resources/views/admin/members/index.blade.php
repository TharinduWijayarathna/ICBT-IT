<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Member Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-2">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">
                    <div class="flex justify-end mb-4">
                        <a class="uppercase inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" href="{{ route('members.create') }}">
                            Add Member
                        </a>
                    </div>
                    <table class="w-full table-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 font-semibold text-sm uppercase">Image</th>
                                <th class="px-4 py-2 font-semibold text-sm uppercase">Name</th>
                                <th class="px-4 py-2 font-semibold text-sm uppercase">Email</th>
                                <th class="px-4 py-2 font-semibold text-sm uppercase">Designation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($members as $member)
                                <tr>
                                    <td class="border px-4 py-2">{{ $member->image_id }}</td>
                                    <td class="border px-4 py-2">{{ $member->name }}</td>
                                    <td class="border px-4 py-2">{{ $member->email }}</td>
                                    <td class="border px-4 py-2">{{ $member->designation }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>


</x-app-layout>
