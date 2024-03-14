<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:150px; height: 150px;" class="me-3 avatar-sm rounded-circle  object-cover"
                    src="{{ $user->getImageUrl() }}" alt="{{ $user->name }}">
                <div>
                    <h3 class="card-title mb-0">
                        <a href="#">{{ $user->name }}</a>
                    </h3>
                    <span class="fs-6 text-muted">{{ $user->email }}</span>
                </div>
            </div>

            @can('update', $user)
                <a href="{{ route('users.edit', $user->id) }}">Edit</a>
            @endcan
        </div>
        <div class="px-2 mt-4">
            <h5 class="fs-5"> About : </h5>
            <p class="fs-6 fw-light">
                {{ $user->bio }}
            </p>
            @include('users.shared.user-stats')
            @auth
                @can('update', $user)
                    @if (Auth::user()->isFollowing($user))
                        <form class="mt-3" method="post" action="{{ route('user.unfollow', $user->id) }}">
                            @csrf
                            <button class="btn btn-danger btn-sm" type="submit"> Unfollow </button>
                        </form>
                    @else
                        <form class="mt-3" method="post" action="{{ route('user.follow', $user->id) }}">
                            @csrf
                            <button class="btn btn-primary btn-sm" type="submit"> Follow </button>
                        </form>
                    @endif
                @endcan
            @endauth
        </div>
    </div>
</div>
