@extends('admin.layouts.main')

@section('wrapper')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редагування користувача</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.users.create')}}">Home</a></li>
                            <li class="breadcrumb-item active">Редагування користувача </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <form action="{{route('admin.users.update',$user->id)}}" method="POST" class="w-25">
                    @csrf
                    @method("PATCH")
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Введіть нового користувача" value="{{$user->name}}">

                        @error('name')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" value="{{$user->email}}" class="form-control" name="email" placeholder="Введіть пошту">
                        @error('email')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group w-50">
                        <label>Виберіть користувача</label>
                        <select name="role_id" class="form-control">
                            @foreach($roles as $id => $role)
                                <option value="{{$id}}"
                                    {{$id == $user ->role ? 'selected' : ''}}>{{$role}} </option>
                            @endforeach
                        </select>
                        @error('role_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                     <button type="submit"  class="btn btn-block btn-success col-4">Обновити</button>
                </form>

                <!-- /.row -->
                <!-- Main row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
