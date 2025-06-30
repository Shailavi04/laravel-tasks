<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel News & Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f9f9f9;
            font-family: 'Segoe UI', sans-serif;
        }

        .container {
            max-width: 700px;
        }

        .title {
            font-weight: bold;
            font-size: 1.8rem;
            background: linear-gradient(to right, #dc3545, #6f42c1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .section-heading {
            font-weight: bold;
            font-size: 1.3rem;
            display: flex;
            align-items: center;
            gap: 8px;
            color: #212529;
            margin-top: 40px;
            margin-bottom: 20px;
        }

        .news-box {
            border: 1px solid #dee2e6;
            padding: 15px;
            border-radius: 10px;
            background-color: #fff;
            margin-bottom: 15px;
        }

        .news-box h6 {
            color: #0d6efd;
            margin-bottom: 5px;
        }

        .user-link {
            display: flex;
            align-items: center;
            gap: 15px;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            padding: 12px 15px;
            background-color: #fff;
            margin-bottom: 10px;
            transition: background 0.3s;
        }

        .user-link:hover {
            background-color: #f0f8ff;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .pagination {
            justify-content: center;
        }

        .divider {
            border-top: 1px dashed #ccc;
            margin: 40px 0;
        }
    </style>
</head>
<body>
    <div class="container py-4">

        <!-- Page Title -->
        <h1 class="title text-center mb-5">📰 Laravel News & Users</h1>

        <!-- Latest News -->
        <div class="section-heading">
            <span>📕</span>
            <span>Latest News</span>
        </div>

        @foreach ($news as $article)
            <div class="news-box">
                <h6><a href="#" class="text-decoration-none text-primary">{{ $article['title'] }}</a></h6>
                <p class="mb-0 text-muted">{{ $article['body'] }}</p>
            </div>
        @endforeach

        <!-- News Pagination -->
        <div class="mt-3">
            {{ $news->appends(['users' => $users->currentPage()])->links() }}
        </div>

        <!-- Divider -->
        <div class="divider"></div>

        <!-- User List -->
        <div class="section-heading">
            <span>👥</span>
            <span>User List</span>
        </div>

        @foreach ($users as $user)
            <a href="{{ url('/users/' . $user['id']) }}" class="user-link text-decoration-none text-dark">
                <img src="https://i.pravatar.cc/150?u={{ $user['email'] }}" class="user-avatar" alt="avatar">
                <div>
                    <strong>{{ $user['name'] }}</strong><br>
                    <small class="text-muted">{{ $user['email'] }}</small>
                </div>
            </a>
        @endforeach

        <!-- User Pagination -->
        <div class="mt-3">
            {{ $users->appends(['news' => $news->currentPage()])->links() }}
        </div>

    </div>
</body>
</html>
