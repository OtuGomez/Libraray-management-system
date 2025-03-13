<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">


                <div class="row">
                    <div class="col-sm-4">
                        <div class="card bg-primary">
                            <div class="card-body">
                                <h5 class="card-title text-white">Total Number of Users</h5>
                                <span style="font-size: 20px" class="text-white"><b>--</b></span>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body bg-dark">
                                <h5 class="card-title text-white">Total Book In Store</h5>
                                <span style="font-size: 20px" class="text-white"><b>--</b></span>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body bg-warning">
                                <h5 class="card-title text-white">Total Book Loans</h5>
                                <span style="font-size: 20px" class="text-white"><b>--</b></span>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="row mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h5>Activity Logs</h5>
                            <br>
                            <table class="table table-bordered table-hover table-striped dataTable">
                                <thead>
                                <tr class="bg-dark">
                                    <th>#</th>
                                    <th class="text-white">User</th>
                                    <th class="text-white">Action</th>
                                    <th class="text-white">Date</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


</x-app-layout>
