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

<body>
    <div class="">
        @include('components.navbar')
        @include('components.sidebar')

        <div class="p-4 sm:ml-64">
            <div class="p-4 border-2 border-gray-200 rounded-lg dark:border-gray-700 mt-14">
                <div class="relative  sm:rounded-lg">
                    <form method="get" action="{{ route('user.search') }}"
                        class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
                        @csrf
                        <div>
                            <button id="formButton" data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                                class="p-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                type="button">
                                + Add New
                            </button>

                        </div>
                        <div class="flex flex-wrap justify-end">
                            <label for="table-search" class="sr-only">Search</label>
                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input type="text"
                                    class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-l-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Search by Email" name="email">
                            </div>
                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input type="text"
                                    class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300  w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Search by UserName" name="username">
                            </div>
                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input type="text"
                                    class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-r-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Search by First Name" name="firstname">
                            </div>
                            <button hidden class="px-4 py-2 bg-blue-500 hover:bg-blue-600 rounded-md text-white"
                                type="submit">Search</button>
                        </div>
                    </form>
                    <table class="w-full shadow-md text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                            <th scope="col" class="p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-all-search" type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                </div>
                            </th>

                            <th scope="col" class="px-6 py-3">Username</th>
                            <th scope="col" class="px-6 py-3">Full Name</th>
                            <th scope="col" class="px-6 py-3">Email</th>
                            <th scope="col" class="px-6 py-3">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['users'] as $key => $dat)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="w-4 p-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-table-search-1" type="checkbox"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                        </div>
                                    </td>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $dat['username'] }}
                                    </th>

                                    <td class="px-6 py-4">
                                        {{ $dat['firstname'] }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $dat['email'] }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="javascript:void(0)" data-url="{{ route('user.delete', $dat['id']) }}"
                                            id="delete-user"
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


                {{-- <h1 class="text-3xl text-center mb-8">Users</h1>
                <table class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <div
                        class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
                        <form method="get" class="flex space-x-4" action="{{ route('user.search') }}">
                            @csrf
                            <input class="p-2 w-1/4 rounded-md text-gray-700 border border-gray-300"
                                placeholder="Search by Email" name="email" value="">
                            <input class="p-2 w-1/4 rounded-md text-gray-700 border border-gray-300"
                                placeholder="Search by UserName" name="username" value="">
                            <input class="p-2 w-1/4 rounded-md text-gray-700 border border-gray-300"
                                placeholder="Search by First Name" name="firstname" value="">
                            <button hidden class="px-4 py-2 bg-blue-500 hover:bg-blue-600 rounded-md text-white"
                                type="submit">Search</button>
                        </form>
                    </div>
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                                    </td>
                                <td scope="col" class="px-6 py-3"></td>
                                <td scope="col" class="px-6 py-3">
                                    {{ $dat['lastname'] }}</td>
                                <td scope="col" class="px-6 py-3"></td>
                                <td scope="col" class="px-6 py-3">

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table> --}}

            </div>
        </div>
        <div class="mt-8">
            @include('components.userModel.modal')
        </div>

    </div>
    @include('components.navbot')
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
