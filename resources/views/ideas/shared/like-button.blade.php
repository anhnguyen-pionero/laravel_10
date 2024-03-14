<div>
    @auth
        @if (Auth::user()->isLiked($idea))
            <form method="post" action="{{ route('ideas.unlike', $idea->id) }}">
                @csrf
                <button class="fw-light nav-link fs-6">
                    <span class="fas fa-heart me-1">
                    </span> {{ $idea->likes->count() }} </a>

                </button>
            </form>
        @else
            <form method="post" action="{{ route('ideas.like', $idea->id) }}">
                @csrf
                <button class="fw-light nav-link fs-6">
                    <span class="far fa-heart me-1">
                    </span> {{ $idea->likes->count() }} </a>
                </button>
            </form>
        @endif
    @endauth

    @guest
        <a href="{{ route('login') }}" class="fw-light nav-link fs-6"> <span class="far fa-heart me-1">
            </span> {{ $idea->likes->count() }} </a>
    @endguest
</div>
