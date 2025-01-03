@extends('admin.layouts.main')

@section('wrapper')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Створення поста</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.post.create')}}">Home</a></li>
                            <li class="breadcrumb-item active">Додавання поста</li>
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
                <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group w-25">
                        <input type="text" class="form-control" name="title" placeholder="Введіть назву поста">
                        @error('title')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea id="summernote" name="content"></textarea>
                    </div>


                    <div class="form-group w-50">
                        <label for="exampleInputFile">Додати прев'ю</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="preview_image">
                                <label class="custom-file-label">Виберіть зображення</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Завантажити</span>
                            </div>
                        </div>
                        @error('preview_image')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group w-50">
                        <label for="exampleInputFile">Додати головне зображення</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="main_image">
                                <label class="custom-file-label">Виберіть зображення</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Завантажити</span>
                            </div>
                        </div>
                        @error('main_image')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group w-50">
                        <label>Виберіть категорію</label>
                        <select class="form-control">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}"
                                        {{$category->id == old('category_id') ? 'selected' : ''}}>{{$category->title}} </option>

                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Теги</label>
                        <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Виберіть тег"
                                style="width: 100%;">
                            @foreach($tags as $tag)
                                <option {{ is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? 'selected' : '' }}                       value="{{$tag->id}}">{{$tag->title}}</option>
                            @endforeach

                        </select>
                        @error('tag_ids')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group w-25">
                        <button type="submit" class="btn btn-block btn-success col-4">Створити</button>
                    </div>
                </form>


                <!-- /.row -->
                <!-- Main row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
