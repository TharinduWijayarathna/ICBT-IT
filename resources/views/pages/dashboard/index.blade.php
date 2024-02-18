<x-app-layout>
    <x-slot name="header">
        <div class="header pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="col align-items-center py-4">
                        <h6 class="h2 text-dark d-inline-block mb-0">Dashboard</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-block ">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Dashboard
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <x-slot name="content">
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Total Live Assets</h5>
                                {{-- <span class="h2 font-weight-bold mb-0">{{ $tc->totalCountOfAssets() }}</span> --}}
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape text-white rounded-circle shadow"
                                    style="background: #4b6cb7;">
                                    <i class="ni ni-chart-bar-32"></i>
                                </div>
                            </div>
                        </div>
                        <!-- <p class="mt-3 mb-0 text-sm">

                                <a class=" mr-2" href="">
                                    <i class="fas fa-arrow-circle-right"></i>
                                    More info</a>

                        </p> -->
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Total Locations</h5>
                                {{-- <span class="h2 font-weight-bold mb-0"> {{ $tc->totalCountOfLocations() }}</span> --}}
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape text-white rounded-circle shadow"
                                    style="background: #4b6cb7;">
                                    <i class="ni ni-bulb-61"></i>
                                </div>
                            </div>
                        </div>
                        <!-- <p class="mt-3 mb-0 text-sm">

                            <a class=" mr-2" href="">
                                <i class="fas fa-arrow-circle-right"></i> More info
                            </a>

                        </p> -->
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Allocated Tasks</h5>
                                {{-- <span class="h2 font-weight-bold mb-0">{{ $tc->totalCountOfTasks() }}</span> --}}
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape text-white rounded-circle shadow"
                                    style="background: #4b6cb7;">
                                    <i class="ni ni-money-coins"></i>
                                </div>
                            </div>
                        </div>
                        <!-- <p class="mt-3 mb-0 text-sm">
                            <a class=" mr-2" href=""><i class="fas fa-arrow-circle-right"></i>
                                More
                                info</a>
                        </p> -->
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Pending Tasks</h5>
                                {{-- <span class="h2 font-weight-bold mb-0">{{ $tc->totalCountOfPendingTasks() }}</span> --}}
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape text-white rounded-circle shadow"
                                    style="background: #4b6cb7;">
                                    <i class="ni ni-chat-round"></i>
                                </div>
                            </div>
                        </div>
                        <!-- <p class="mt-3 mb-0 text-sm">
                            <a class=" mr-2" href="">
                                <i class="fas fa-arrow-circle-right"></i> More
                                info</a>
                        </p> -->
                    </div>
                </div>
            </div>
        </div>
        {{-- @if ($pending_tasks->count() > 0)
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">Pending Tasks</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Task</th>
                                        <th scope="col">Asset Count</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">EXP Date</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pending_tasks as $task)
                                    <tr>
                                        <td>{{ $task->title }}</td>
                                        <td>{{ $task->assets->count() }}</td>
                                        <td>{{ $task->location?$task->location->name:'N/A' }}</td>
                                        <td>{{ $task->exp_date }}</td>
                                        <td>
                                            {!! $tc->getTaskStatus($task) !!}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-12">
                                    <nav aria-label="navigation" class="navigation">
                                        {!! $pending_tasks->links() !!}
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif --}}
    </x-slot>
</x-app-layout>

@push('js')
    <script></script>
@endpush
