<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">

    <div class="bg-white w-full max-w-2xl shadow-xl rounded-xl p-8">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">📝 Create a New Post</h1>

        <form method="POST" action="{{ url('/posts') }}" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <div>
                <label class="block font-semibold text-gray-700 mb-1">Title (English)</label>
                <input type="text" name="title_en" class="w-full px-4 py-2 border rounded-md" required>
            </div>

            <div>
                <label class="block font-semibold text-gray-700 mb-1">Title (Hindi)</label>
                <input type="text" name="title_hi" class="w-full px-4 py-2 border rounded-md" required>
            </div>

            <div>
                <label class="block font-semibold text-gray-700 mb-1">Description (English)</label>
                <textarea name="description_en" rows="3" class="w-full px-4 py-2 border rounded-md" required></textarea>
            </div>

            <div>
                <label class="block font-semibold text-gray-700 mb-1">Description (Hindi)</label>
                <textarea name="description_hi" rows="3" class="w-full px-4 py-2 border rounded-md" required></textarea>
            </div>

            <div>
                <label class="block font-semibold text-gray-700 mb-1">Upload Profile Image</label>
                <input type="file" name="profile_image" accept="image/*"
                    class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md text-lg">
                ➕ Submit Post
            </button>
        </form>
    </div>

</body>
</html>
