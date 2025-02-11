<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Testing</title>
</head>
<body class="flex items-center justify-center h-screen bg-gray-900">
    <div class="bg-black text-white p-8 rounded-2xl shadow-lg w-96 relative border border-gray-700">
        <h1 class="text-4xl font-semibold text-center text-yellow-500 tracking-widest">GEMCO</h1>
        <h2 class="text-center text-xl font-bold mt-4">Login</h2>

        <form class="mt-6">
            <label class="block mb-2">Username</label>
            <input type="text" placeholder="Username" class="w-full p-2 border border-gray-500 bg-black rounded focus:outline-none focus:border-yellow-500">

            <label class="block mt-4 mb-2">Password</label>
            <input type="password" id="password" placeholder="Password" class="w-full p-2 border border-gray-500 bg-black rounded focus:outline-none focus:border-yellow-500">

            <div class="mt-2 flex items-center">
                <input type="checkbox" id="showPassword" class="mr-2">
                <label for="showPassword">Show Password</label>
            </div>

            <button type="submit" class="w-full mt-4 p-2 bg-gradient-to-r from-yellow-500 to-gray-400 rounded text-black font-bold hover:opacity-80">Submit</button>
        </form>

        <p class="text-center mt-4 text-gray-400 cursor-pointer hover:underline">Forget Password?</p>
    </div>

    <script>
        document.getElementById('showPassword').addEventListener('change', function() {
            let passwordField = document.getElementById('password');
            passwordField.type = this.checked ? 'text' : 'password';
        });
    </script>
</body>
</html>
