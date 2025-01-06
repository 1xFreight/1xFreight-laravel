@extends('layouts.dashboard')
@push('styles')
    <style>
        .ck-editor__editable_inline {
            height: 200px;
        }
    </style>
@endpush
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="page-title">
            <h1 class="h2">Creează noutate</h1>
        </div>
        <div class="dash-card">
            <form action="{{route('dashboard.blog.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-4">
                            <h6 class="mb-2">Titlu</h6>
                            <input type="text" name="title" class="form-control" required maxlength="254">
                        </div>
                        <div class="form-group mb-5">
                            <h6 class="mb-2">Text</h6>
                            <textarea name="text" class="editor"></textarea>
                        </div>
                        <div class="form-group mb-5">
                            <h6 class="mb-2">Imagine</h6>
                            <input type="file" name="image" class="form-control" accept="image/png,image/jpeg">
                        </div>

                        <h3 class="mb-5">SEO TAGS</h3>
                        <div class="form-group mb-5">
                            <h6 class="mb-2">Description</h6>
                            <textarea name="meta_description" class="form-control w-100" rows="10"></textarea>
                        </div>
                        <div class="form-group mb-5">
                            <h6 class="mb-2">Keywords</h6>
                            <textarea name="keywords" class="form-control w-100" rows="10"></textarea>
                        </div>
                        <div class="col-md-12 mt-5">
                            <button type="submit" class="btn btn-success w-100">ADAUGĂ</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>

@endsection
@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script>
        document.querySelectorAll('.editor').forEach(element => {
            ClassicEditor
                .create(element, {
                    ckfinder: {
                        uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}"
                    },
                    toolbar: {
                        items: [
                            'undo', 'redo',
                            '|',
                            'heading',
                            '|',
                            'bold', 'italic',
                            '|',
                            'link', 'uploadImage', 'blockQuote',
                            '|',
                            'bulletedList', 'numberedList', 'outdent', 'indent'
                        ],
                        shouldNotGroupWhenFull: false
                    }
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endpush
