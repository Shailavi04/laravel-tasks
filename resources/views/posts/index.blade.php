<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Posts</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 p-6 min-h-screen">
    <div class="max-w-3xl mx-auto">
        <h2 class="text-3xl font-bold text-center mb-8 text-gray-800">📰 All Posts</h2>

        <!-- ✅ Success Message -->
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                <p class="font-bold">Success</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <!-- ✅ Posts Loop -->
        @foreach ($posts as $post)
            <div class="bg-white p-6 mb-6 rounded-xl shadow-md">
                <h3 class="text-lg font-bold text-gray-800">
                    {{ $post->getTranslation('title', 'en') }} / {{ $post->getTranslation('title', 'hi') }}
                </h3>
                <p class="mt-2 text-gray-600">
                    {{ $post->getTranslation('description', 'en') }}<br>
                    {{ $post->getTranslation('description', 'hi') }}
                </p>

                <!-- ✅ Show Image if exists -->
                @if ($post->image_path)
                    <img src="{{ asset($post->image_path) }}" alt="Image" class="w-24 h-24 rounded-md mt-4 shadow-md">
                @endif
            </div>
        @endforeach
    </div>
</body>
</html>
