@extends('admin.layouts.main')

@section('wrapper')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редагування поста</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.post.create')}}">Home</a></li>
                            <li class="breadcrumb-item active">Редагування поста</li>
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
                <br action="{{route('admin.post.update',$post->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PATCH")
                    <div class="form-group w-25">
                        <input type="text" class="form-control" name="title" placeholder="Введіть назву поста">
                        @error('title')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea id="summernote" name="content"></textarea>
                        @error('content')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>


                    <div class="form-group w-50">
                        <label for="exampleInputFile">Додати прев'ю</label>
                        <div class="w-25">
                            <img src="{{ url('storage/' . $post->preview_image) }}" alt="preview_image" class="w-50">
                        </div>
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
                        <div class="w-25">
                            <img src="{{ Storage::url($post->main_image) }}" alt="main_image" class="w-50">
                        </div>
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
                                    {{$category->id == $post->category_id ? 'selected' : ''}}>{{$category->title}} </option>

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
                                <option value="{{ $tag->id }}"
                                    {{ is_array($post->tags->pluck('id')->toArray() ?? []) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : '' }}>
                                    {{ $tag->title }}
                                </option>
                            @endforeach

                        </select>
                        @error('tag_ids')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror

                            <br></br>
                        <button type="submit" class="btn btn-block btn-success col-4">Обновити</button>
                    </div>
                </form>

                <!-- /.row -->
                <!-- Main row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
