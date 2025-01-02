@extends('admin.layouts.main')

@section('wrapper')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редагування категорії</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.tag.create')}}">Home</a></li>
                            <li class="breadcrumb-item active">Редагування категорії </li>
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
                <form action="{{route( 'admin.tag.update',$tag->id)}}" method="POST" class="w-25">
                    @csrf
                    @method("PATCH")
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" placeholder="Введіть нову категорію" value="{{$tag->title}}">

                        @error('title')
                        <div class="text-danger">Заповніть поле</div>
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
