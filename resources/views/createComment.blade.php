<x-layout>


    @section('content')
        <div class="container">
            <h1>Comments</h1>
            <div class="row">
                <div class="col-md-8">
                    <!-- Display Comments -->
                    @foreach ($comments as $comment)
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ $comment->user->name }}</h5>
                                <p class="card-text">{{ $comment->content }}</p>
                                @if ($comment->user_id === auth()->id())
                                    <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endforeach
    
                    <!-- Add New Comment Form -->
                    @auth
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2>Add New Comment</h2>
                                <form action="{{ route('comments.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="content">Comment:</label>
                                        <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <p>Please <a href="{{ route('login') }}">login</a> to add a comment.</p>
                    @endauth
                </div>
            </div>
        </div>
    @endsection
    
</x-layout>