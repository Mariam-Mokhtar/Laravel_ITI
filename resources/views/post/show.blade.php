@extends('layouts.app')

@section('title')
    Show
@endsection

@section('content')
    <div class="row  justify-content-around mt-4 ">
        <div class="col-5 card p-0">
            <div class="card-header">
                Post Info
            </div>
            <div class="card-body">
                <p class="card-text">Title: {{ $post->title }}</p>
                <p class="card-text">Description: {{ $post->description }}</p>
            </div>
        </div>

        <div class="col-5 card p-0">
            <div class="card-header">
                Post Creator Info
            </div>
            <div class="card-body">
                <p class="card-title">Name: {{ $post->user->name }}</p>
                <p class="card-text">Email: {{ $post->user->email }}</p>
                <p class="card-text">Created_at: {{ $post->created_at->format('l jS F Y h:i:s A') }}</p>
            </div>
        </div>
        <div class="d-flex justify-content-end mt-3">
            <x-button role="button" name="add-btn" class="btn" data-bs-toggle="modal" data-bs-target="#addComment">Add
                Comment</x-button>
        </div>
        @if (count($comments) > 0)
            <div class="col-11 mt-3">
                <table class="table text-center ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Comment</th>
                            <th scope="col">Commented By</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $comment)
                            <tr>
                                <td>{{ $comment->id }}</td>
                                <td>{{ $comment->comment }}</td>
                                @if ($comment->user)
                                    <td>{{ $comment->user->name }}</td>
                                @else
                                    <td>Not Founded</td>
                                @endif
                                <td>{{ $comment->created_at->format('Y-m-d') }}</td>
                                <td class="actions">
                                    <x-button role="button" name="del-btn" class="btn editComment" data-bs-toggle="modal"
                                        data-bs-target="#editComment" value="{{ $comment->comment }}">Edit
                                    </x-button>
                                    <form method="POST" action="{{ route('comments.destroy', $comment->id) }}"
                                        class="d-inline">
                                        @csrf
                                        @method('Delete')
                                        <x-button role="button" name="del-btn" class="btn deleteComment"
                                            data-bs-toggle="modal" data-bs-target="#delModel" type="danger">Delete
                                        </x-button>
                                    </form>
                                </td>
                            </tr>
                            {{-- Edit Model --}}
                            <div class="modal fade" id="editComment" data-bs-backdrop="static" data-bs-keyboard="false"
                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Add Comment</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form method="POST" action="{{ route('comments.update', $comment->id) }}"
                                            class="modal-body">
                                            @csrf
                                            @method('PUT')
                                            <div class="row mb-3 px-4">
                                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                <div class="col-md-12 mb-2">
                                                    <label for="user" class="form-label">Comment Creator</label>
                                                    <select id="user" class="form-control" name="creator" required>
                                                        @foreach ($users as $user)
                                                            <option value={{ $user->id }}
                                                                @if ($comment->user_id == $user->id) selected @endif>
                                                                {{ $user->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <label for="comment" class="form-label">Comment</label>
                                                    <textarea class="form-control" name="comment" id="editarea" rows="2">{{ $comment->comment }}</textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
                <div class="container text-center">
                    {{ $comments->links('pagination::bootstrap-5') }}
            
                </div>
            </div>
        @endif
    </div>
    {{-- Add Comment --}}

    <div class="modal fade" id="addComment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Comment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('comments.store') }}" class="modal-body">
                    @csrf
                    <div class="row mb-3">
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <div class="col-md-12 mb-2">
                            <label for="user" class="form-label">Comment Creator</label>
                            <select id="user" class="form-control" name="creator" required>
                                @foreach ($users as $user)
                                    <option value={{ $user->id }} @if ($post->user_id == $user->id) selected @endif>
                                        {{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="comment" class="form-label">Comment</label>
                            <textarea class="form-control" name="comment" id="comment" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    {{-- Delete Comment --}}
    <div class="modal fade" id="delModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="staticBackdropLabel"><i
                            class="bi bi-exclamation-triangle-fill text-danger me-2"></i>Waring</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure to delete this comment?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button id="delete" type="button" class="btn btn-danger">Delete</button>
                </div>

            </div>
        </div>
    </div>



@endsection
@section('script')
    <script>
        var deleteBtn = document.querySelectorAll(".deleteComment");
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
