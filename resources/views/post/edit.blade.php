@extends('layouts.app')

@section('title')
    Edit
@endsection

@section('content')
    <div class=" card text-black rounded-5 shadow mx-auto mt-4 w-75">
        <div class="card-body">
            <div class="row justify-content-md-center">
                <div class="col-md-11">
                    <p class="text-center h3 fw-bold mb-2 mx-1 mx-md-4">
                        Edit Post
                    </p>
                    <form class="needs-validation mx-1 mx-md-4 row g-2" method="POST"
                        action="{{ route('posts.update', $post['id']) }}" novalidate autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="col-md-12 mb-2">
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="title">Title</label>
                                <div id="title_div" class="input-group mb-3">
                                    <input id="title" type="text" class="form-control required" name="title"
                                        required autocomplete="off" value="{{ $post->title }}" />
                                </div>
                                <div class="invalid-feedback">
                                    Please Enter title for a new post
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="textAreaExample">Description</label>
                                <div id="desc" class="input-group mb-3">
                                    <textarea class="form-control" id="textAreaExample1" name="description" rows="4" required>{{ $post->title }} </textarea>
                                </div>
                                <div class="invalid-feedback">
                                    Please Enter Description for a new post
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="disabledSelect">Post Creator</label>
                                <select id="disabledSelect" class="form-control" name="creator" required>
                                    @foreach ($users as $user)
                                        <option value={{ $user->id }} @if ($post->user_id == $user->id) selected @endif>
                                            {{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
@endsection
