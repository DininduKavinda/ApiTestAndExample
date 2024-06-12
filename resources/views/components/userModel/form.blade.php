<form method="POST" class="space-y-4" data-action="{{ route('user.create') }}" id="userData">
    @csrf
    <input type="text" class="hidden" id="id" name="id">
    <label for="username" class="block text-gray-700">Username</label>
    <input type="text" class="w-full p-2 rounded-md text-gray-700" id="username" value="{{ str(fake()->word()) }}"
        name="username" required>

    <label for="email" class="block text-gray-700">Email</label>
    <input type="email" class="w-full p-2 rounded-md text-gray-700" value="{{ str(fake()->email()) }}" id="email"
        name="email" required>

    <label for="password" class="block text-gray-700">Password</label>
    <input type="password" class="w-full p-2 rounded-md text-gray-700" value="{{ str()->password() }}" id="password"
        name="password" required>

    <label for="firstname" class="block text-gray-700">First Name</label>
    <input type="text" class="w-full p-2 rounded-md text-gray-700" value="{{ str(fake()->name()) }}" id="firstname"
        name="firstname" required>

    <label for="lastname" class="block text-gray-700">Last Name</label>
    <input type="text" class="w-full p-2 rounded-md text-gray-700" value="{{ str(fake()->name()) }}" id="lastname"
        name="lastname" required>

    <div class="">
        <br>
        <button type="submit"
            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Save
        </button>
    </div>
</form>
