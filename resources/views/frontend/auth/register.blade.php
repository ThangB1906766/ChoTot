@extends('frontend.layouts.app_frontend')
@section('content')
<div class="breadcrumb-wrapper">
    <div class="container" >
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcumb">
                    <a href="#">Chợ tốt Xe</a>
                    <span class="breadcumb-icon mx-1"><i class="fa-solid fa-angles-right"></i></span>
                    <span>Đăng ký</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-5">
            <form method="POST" action="" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên</label>
                            <input type="text" name="name" placeholder="Tên" class="form-control"
                                value="{{ old('name', $user->name ?? '') }}">
                            @error('name')
                                <small id="emailHelp" class="form-text text-danger">{{ $errors->first('name') }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" name="email" placeholder="Tên" class="form-control"
                                value="{{ old('name', $user->email ?? '') }}">
                            @error('email')
                                <small id="emailHelp" class="form-text text-danger">{{ $errors->first('email') }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="password" name="password" placeholder="Mật khẩu" class="form-control"
                                value="">
                            @error('password')
                                <small id="emailHelp" class="form-text text-danger">{{ $errors->first('password') }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số điện thoại</label>
                            <input type="number" name="phone" placeholder="0869......" class="form-control"
                                value="{{ old('phone', $user->phone ?? '') }}">
                            @error('phone')
                                <small id="emailHelp" class="form-text text-danger">{{ $errors->first('phone') }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hình ảnh</label>
                            <input type="file" class="form-control" name="avatar">
                            @if (isset($user->avatar) && $user->avatar)
                                <img src="{{ pare_url_file($user->avatar) }}"
                                    style="width: 60px; height: 60px; border-radius: 10px; margin-top: 10px" alt="">
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Đăng ký</button>
                    </div>
              </form>
        </div>
    </div>
</div>
@stop