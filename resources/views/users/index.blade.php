<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-container {
            margin-top: 50px;
        }
        .profile-card {
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background-color: #ddd;
        }
        .status-verified {
            color: green;
            font-weight: bold;
        }
        .status-unverified {
            color: red;
            font-weight: bold;
        }
        .edit-icon {
            float: right;
            color: #aaa;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container profile-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="profile-card">
                <div class="d-flex align-items-center">
                    <img src="https://via.placeholder.com/150" alt="Profile Image" class="profile-img me-4">
                    <div>
                        <h3>{{ $user->name }}</h3>
                        <p><strong>Jenis Kelamin:</strong> {{ $user->gender }}</p>
                        <p><strong>Status:</strong> 
                            <span class="{{ $user->status == 'VERIFIED' ? 'status-verified' : 'status-unverified' }}">
                                {{ $user->status }}
                            </span>
                        </p>
                        <p><strong>Peran:</strong> {{ $user->role }}</p>
                    </div>
                    <i class="bi bi-pencil edit-icon"></i>
                </div>
                <hr>
                <h4>Kontak</h4>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Telepon:</strong> {{ $user->phone }}</p>
                <hr>
                <div>
                    <span class="badge bg-primary">{{ $user->status }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
