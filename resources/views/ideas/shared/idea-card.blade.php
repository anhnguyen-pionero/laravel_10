<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px; height: 50px" class="me-2 avatar-sm rounded-circle object-cover"
                    src="{{ $idea->user->getImageUrl() }}" alt="{{ $idea->user->name }}">
                <div>
                    <h5 class="card-title mb-0">
                        <a href="#">
                            {{ $idea->user->name }}
                        </a>
                    </h5>
                </div>
            </div>
            <div>
                @auth
                    @can('ideas.edit', $idea)
                        <form method="POST" action="{{ route('ideas.destroy', $idea->id) }}">
                            @csrf
                            @method('delete')
                            <div class="d-flex gap-1 align-items-center">
                                <a href="{{ route('ideas.show', $idea->id) }}">View</a>

                                <a href="{{ route('ideas.edit', $idea->id) }}" class="mx-2">Edit</a>

                                <button class="btn btn-danger btn-sm" title="Delete">X</button>
                            </div>

                        </form>
                    @endcan
                @endauth
            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($editing ?? false)
            <form action="{{ route('ideas.update', $idea->id) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <textarea name="content" class="form-control" id="content" rows="3">{{ $idea->content }}</textarea>
                    @error('content')
                        <span class="mt-2 d-block fs-6 text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="">
                    <button type="submit" class="mb-2 btn btn-dark btn-sm"> Update </button>
                </div>
            </form>
        @else
            <p class="fs-6 fw-light text-muted">
                {{ $idea->content }}
            </p>
        @endif
        <div class="d-flex justify-content-between">
            @include('ideas.shared.like-button')
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{ $idea->created_at->diffForHumans() }} </span>
            </div>
        </div>
        @include('ideas.shared.comment-box')
    </div>
</div>
