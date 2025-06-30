<!DOCTYPE html>
<html>
<head>
    <title>{{ $user['name'] }} - Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .user-card {
            border-radius: 15px;
            background: linear-gradient(135deg, #e0e0e0, #ffffff);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            text-align: center;
        }

        .user-card img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
            border: 3px solid #007bff;
        }

        .post-card:hover {
            transform: scale(1.01);
            transition: 0.3s ease-in-out;
        }

        .post-header {
            background-color: #007bff;
            color: white;
            padding: 0.5rem 1rem;
            border-top-left-radius: 0.5rem;
            border-top-right-radius: 0.5rem;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <!-- USER CARD -->
        <div class="user-card mb-5">
            <img src="https://i.pravatar.cc/150?u={{ $user['email'] }}" alt="Profile Photo">
            <h2>{{ $user['name'] }}</h2>
            <p><strong>📧 Email:</strong> <span class="badge bg-primary">{{ $user['email'] }}</span></p>
            <p><strong>📞 Phone:</strong> {{ $user['phone'] }}</p>
            <p><strong>🌐 Website:</strong> 
                <a href="http://{{ $user['website'] }}" target="_blank" class="badge bg-success text-decoration-none">
                    {{ $user['website'] }}
                </a>
            </p>
        </div>

        <!-- POSTS -->
        <h3>📝 Posts by {{ $user['name'] }}</h3>
        @foreach ($posts as $post)
            <div class="card mb-3 shadow-sm post-card">
                <div class="post-header">
                    <h5 class="mb-0">{{ $post['title'] }}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $post['body'] }}</p>
                </div>
            </div>
        @endforeach

        <!-- BACK BUTTON -->
        <a href="{{ url('/') }}" class="btn btn-outline-primary mt-4">← Back to Home</a>
    </div>
</body>
</html>
