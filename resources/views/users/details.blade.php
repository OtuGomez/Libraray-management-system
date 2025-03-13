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
                            <a href="{{route("manage-users.index")}}" class="btn btn-dark">
                                Back to List
                            </a>
                        </div>
                        <br>


                        <div class="row">
                            <form action="{{ route('manage-users.update', $user->id) }}" method="POST">
                                @csrf
                                @method("put")

                                <div class="mb-3">
                                    <label for="fullName" class="form-label">Full Name</label>
                                    <input type="text" name="fullName"
                                           class="form-control @error('fullName') is-invalid @enderror"
                                           placeholder="Full name" value="{{ $user->name }}" required>
                                    @error('fullName')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" name="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           placeholder="Email" value="{{ $user->email }}" required>
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Update User</button>
                                    <a href="{{ route('manage-users.index') }}" class="btn btn-danger">Go Back</a>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

</x-app-layout>
