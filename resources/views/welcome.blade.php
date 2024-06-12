<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Moodle Users</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body class="bg-gray-900 text-white">
    <div class="flex">
        @include('components.navbar')
        <div class="flex-1 p-6">
            @include('components.sidebar')

            <h1 class="text-3xl text-center mb-8">Users</h1>

            <div class="bg-gray-800 p-4 rounded-lg">
                <div class="mb-4">
                    <form method="get" class="grid grid-cols-1 md:grid-cols-3 gap-4"
                        action="{{ route('user.search') }}">
                        @csrf
                        <div>
                            <label for="exampleInputEmail1" class="block text-gray-300">Email:</label>
                            <input class="w-full p-2 rounded-md text-gray-700" name="email" value="">
                        </div>
                        <div>
                            <label for="exampleInputEmail1" class="block text-gray-300">User Name:</label>
                            <input class="w-full p-2 rounded-md text-gray-700" name="username" value="">
                        </div>
                        <div>
                            <label for="exampleInputEmail1" class="block text-gray-300">First Name:</label>
                            <input class="w-full p-2 rounded-md text-gray-700" name="firstname" value="">
                        </div>
                        <div class="md:col-span-2 flex items-center">
                            <input type="checkbox" name="all" class="mr-2"> <label for="exampleInputEmail1"
                                class="ml-2 text-gray-300">Get ALL</label>
                        </div>
                        <div>
                            <button class="px-4 py-2 bg-blue-500 hover:bg-blue-600 rounded-md text-white"
                                type="submit">Search</button>
                        </div>
                    </form>
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <div class="w3-container">
                        <button id="formButton" data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">
                            + Add New
                        </button>
                        </br>
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">ID</th>
                                    <th scope="col" class="px-6 py-3">Username</th>
                                    <th scope="col" class="px-6 py-3">Full Name</th>
                                    <th scope="col" class="px-6 py-3">Email</th>
                                    <th scope="col" class="px-6 py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['users'] as $key => $dat)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td scope="col" scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $dat['id'] }}</td>
                                        <td scope="col" class="px-6 py-3">{{ $dat['username'] }}</td>
                                        <td scope="col" class="px-6 py-3">{{ $dat['firstname'] }}
                                            {{ $dat['lastname'] }}</td>
                                        <td scope="col" class="px-6 py-3">{{ $dat['email'] }}</td>
                                        <td scope="col" class="px-6 py-3">
                                            <a href="javascript:void(0)"
                                                data-url="{{ route('user.delete', $dat['id']) }}" id="delete-user"
                                                class="px-2 py-1 bg-red-500 hover:bg-red-600 rounded-md text-white ml-2">Delete</a>
                                            <a href="javascript:void(0)" data-url="{{ route('user.edit', $dat['id']) }}"
                                                id="editButton" data-modal-toggle="crud-modal"
                                                class="px-2 py-1 bg-yellow-500 hover:bg-ywllow-600 rounded-md text-white ml-2">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                    <div class="mt-8">
                        @include('components.userModel.modal')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var form = '#userData';

            $(document).on('click', '#formButton', function() {
                $(form).trigger("reset");
            });
            $(document).on('click', '#delete-user', function() {
                var userURL = $(this).data('url');
                var trObj = $(this);
                if (confirm("Are you sure you want to delete this user?") == true) {
                    $.ajax({
                        url: userURL,
                        type: 'DELETE',
                        dataType: 'json',
                        success: function(data) {
                            // alert("success");
                            trObj.parents("tr").remove();
                        }
                    });
                }
            });
            $(document).on('click', '#editButton', function() {
                var userId = $(this).closest('tr').find('td:first').text();
                var url = $(this).data('url');
                // alert(userId);

                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(response) {
                        console.log(response);
                        var user = response.users[0];
                        $('#id').val(user.id);
                        $('#username').val(user.username);
                        $('#email').val(user.email);
                        $('#password').val('').prop('disabled', true);
                        $('#firstname').val(user.firstname);
                        $('#lastname').val(user.lastname);
                    },
                    error: function(error) {
                        console.error("There was an error:", error);
                    }
                });
            });

            $(form).on('submit', function(event) {
                event.preventDefault();

                var url = $(this).attr('data-action');

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        alert(response.success);
                        location.reload();
                    },
                    error: function(response) {}
                });
            });


        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>
