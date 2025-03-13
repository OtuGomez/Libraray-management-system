<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">


                <div class="card">
                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{route("manage-users.create")}}" class="btn btn-dark">
                                Add New User
                            </a>
                        </div>
                        <br>
                        <table class="table table-bordered table-hover table-striped dataTable">
                            <thead>
                            <tr class="bg-dark">
                                <th>#</th>
                                <th class="text-white">Fullname</th>
                                <th class="text-white">Email</th>
                                <th class="text-white">Account Date</th>
                                <th class="text-white">Role</th>
                                <th class="text-white text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>#</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->created_at->diffforhumans()}}</td>
                                        <td>{{"user"}}</td>
                                        <td class="text-center">
                                            <a href="{{route("manage-users.show", $user->id)}}" class="btn btn-dark">
                                                Details
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>

</x-app-layout>
