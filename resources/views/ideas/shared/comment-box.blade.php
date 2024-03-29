<div>
    <form method="POST" action="{{ route('ideas.comments.store', $idea->id) }}">
        @csrf
        <div class="mb-3">
            <textarea class="fs-6 form-control" rows="1" name="content"></textarea>
        </div>
        <div>
            <button class="btn btn-primary btn-sm" type="submit"> Post Comment </button>
        </div>
    </form>

    <hr>
    @forelse ($idea->comments as $comment)
        <div class="d-flex align-items-start">
            <img style="width:35px; height: 35px" class="me-2 avatar-sm rounded-circle object-cover"
                src="{{ $user->getImageUrl() }}" alt="{{ $user->name }}">
            <div class="w-100">
                <div class="d-flex justify-content-between">
                    <h6 class="">
                        {{ $comment->user->name }}
                    </h6>
                    <small class="fs-6 fw-light text-muted"> {{ $comment->created_at }}</small>
                </div>
                <p class="fs-6 mt-3 fw-light">
                    {{ $comment->content }}
                </p>
            </div>
        </div>

    @empty
        <p class="text-center mt-3">No comment found</p>
    @endforelse
</div>
