<!DOCTYPE html>
<html>
<head>
    <title>User Registered</title>
</head>
<body>
    <div class="container">
        <h1>New User Registered</h1>
        <p><strong>Name:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Phone:</strong> {{ $user->phone ?? 'N/A'}}</p>
        <p><strong>Company:</strong> {{ $user->company ?? 'N/A' }}</p>
    </div>
</body>
</html>
