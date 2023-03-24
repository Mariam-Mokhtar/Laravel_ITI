@extends('layouts.app')

@section('title')
    Index
@endsection
@section('style')
    <style>
  
  body {
            background-color: #ffffff;
            height: 100vh; 
            background-image:radial-gradient(circle, #ffffff 10%, rgb(225, 225, 250) 100%);
            background-attachment: fixed;
        }
    </style>
@endsection 
@section('content')
    <table class="table text-center">
        <div class="d-flex justify-content-end mt-3">
            <x-button ref="{{ route('posts.create') }}" type="success">Create Post</x-button>
        </div>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Posted By</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    {{-- $post['id'] sa7 bardo --}}
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    @if ($post->slug)
                        <td>{{ $post->slug }}</td>
                    @else
                        <td>Not Founded</td>
                    @endif
                    @if ($post->user)
                        <td>{{ $post->user->name }}</td>
                    @else
                        <td>Not Founded</td>
                    @endif
                    <td>{{ $post->created_at->format('Y-m-d') }}</td>
                    <td class="actions">
                        <x-button ref="{{ route('posts.show', $post->id) }}" type="info"> View </x-button>
                        <x-button ref="{{ route('posts.edit', $post->id) }}"> Edit </x-button>
                        <form method="POST" action="{{ route('posts.destroy', $post->id) }}" class="d-inline">
                            @csrf
                            @method('Delete')
                            <x-button role="button" name="del-btn" class="btn deletePost" data-bs-toggle="modal"
                                data-bs-target="#del-model" type="danger">Delete</x-button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="modal fade" id="del-model" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="staticBackdropLabel"><i
                            class="bi bi-exclamation-triangle-fill text-danger me-2"></i>Waring</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure to delete this record?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button id="delete" type="button" class="btn btn-danger">Delete</button>
                </div>

            </div>
        </div>
    </div>
    <div class="container text-center">
        {{ $posts->links('pagination::bootstrap-5') }}

    </div>
@endsection
@section('script')
    <script>
        var deleteBtn = document.querySelectorAll(".deletePost");
        for (btn of deleteBtn) {
            btn.addEventListener("click", function(event) {
                var btn = event.target;
                let deleteBtnModal = document.querySelector("#delete");
                deleteBtnModal.onclick = function() {
                    btn.closest("form").submit();
                }
            });
        }
    </script>
@endsection
