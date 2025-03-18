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
                            <form action="{{ route('manage-users.update', $user->id) }}" method="POST" autocomplete="off">
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

                                <div class="mb-3">
                                    <label for="email" class="form-label">Role</label>
                                    <select name="role" id="role" class="form-control @error('role') is-invalid @enderror" required>
                                        <option value="">Select Role</option>
                                        <option {{$user->role == "user" ? "selected" : ""}} value="user">User</option>
                                        <option {{$user->role == "admin" ? "selected" : ""}} value="admin">Admin</option>
                                    </select>
                                    @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Update User</button>
                                    @if(Auth::user()->id != $user->id)
                                        <button type="button" class="btn btn-danger delete-user" data-id="{{ $user->id }}">Delete User</button>
                                    @endif

                                </div>

                            </form>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

</x-app-layout>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $(".delete-user").click(function() {
            let userId = $(this).data("id");

            // Show confirmation alert
            if (confirm("Are you sure you want to delete this user? This action cannot be undone!")) {
                // Send DELETE request
                $.ajax({
                    url: "/manage-users/" + userId,
                    type: "POST",
                    data: {
                        _method: "DELETE",
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        alert(response.message);
                        window.location.href = "/manage-users";
                    },
                    error: function(xhr) {
                        alert("An error occurred while deleting the user.");
                    }
                });
            }
        });
    });
</script>
