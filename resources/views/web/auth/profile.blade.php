@extends('web.layout.master')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>Hồ sơ người dùng</h2>
                    </div>
                    <div class="card-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="profile-edit-container">
                            <form action="{{ route('web.profile.update') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name">Tên người dùng</label>
                                    <input type="text" id="name" name="name" value="{{ auth()->user()->name }}"
                                        class="form-control" placeholder="Nhập tên người dùng">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" value="{{ auth()->user()->email }}"
                                        class="form-control"  placeholder="Nhập email người dùng">
                                </div>
                                <div class="form-group">
                                    <label for="email">Số điện thoại</label>
                                    <input type="text" id="phone" name="phone" value="{{ auth()->user()->phone }}"
                                        class="form-control"  placeholder="Nhập email người dùng">
                                </div>
                                <div class="form-group">
                                    <label for="password">Mật khẩu</label>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Nhập mật khẩu">
                                </div>
                                <div class="form-group">
                                    <label for="confirm">Xác nhận mật khẩu</label>
                                    <input type="password" id="confirm" name="confirm" class="form-control" 
                                        placeholder="Nhập mật khẩu lần nữa">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn-save">Chỉnh sửa</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .profile-edit-container {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .profile-edit-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 14px;
            color: #333;
        }

        .form-group textarea {
            resize: none;
        }

        .avatar-preview {
            margin-bottom: 10px;
        }

        .avatar-preview img {
            max-width: 100px;
            border-radius: 50%;
        }

        .btn-save {
            display: block;
            width: 50%;
            padding: 10px;
            background-color: #5cb85c;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-save:hover {
            background-color: #4cae4c;
        }
        /* disabled */
    </style>
@endsection
