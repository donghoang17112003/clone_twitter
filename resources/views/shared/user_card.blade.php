<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:150px" class="me-3 avatar-sm rounded-circle" src="{{ asset('storage/' . $user->image) }}"
                    alt="Mario Avatar">
                <div>

                    <h3 class="card-title mb-0"><a href="#"> {{ $user->name }}
                        </a></h3>
                    <span class="fs-6 text-muted">{{ $user->email }}</span>

                </div>
            </div>
            <div>
                @auth
                    @can('update', $user)
                        <a href="{{ route('users.edit', $user->id) }}">edit</a>
                    @endcan

                @endauth
            </div>
        </div>
        <div>
            <div class="px-2 mt-4">
                <h5 class="fs-5"> BiOOOOO : </h5>
            </div>
            <p class="fs-6 fw-light">
                {{ $user->bio }}
            </p>
            <div class="d-flex justify-content-start">
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                    </span> 120 Followers </a>
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                    </span> {{ $user->idea()->count() }} </a>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                    </span> {{ $user->comment()->count() }} </a>
            </div>
            @auth
                @if (!Auth::user()->is($user))
                    @if (Auth::user()->follows($user))
                        <div class="mt-3">
                            <form action="{{ route('user.unfollow', $user->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm"> unFollow </button>
                            </form>
                        </div>
                    @else
                        <div class="mt-3">
                            <form action="{{ route('user.follow', $user->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm">Follow </button>
                            </form>
                        </div>
                    @endif
                @endif
            @endauth
        </div>
    </div>
</div>
<hr>
