 <div class="card">
     <div class="px-3 pt-4 pb-2">
         <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
             @csrf
             @method('PUT')
             <div class="d-flex align-items-center justify-content-between">
                 <div class="d-flex align-items-center">
                     <img style="width:150px; height: 150px" class="me-3 avatar-sm rounded-circle object-cover"
                         src="{{ $user->getImageUrl() }}" alt="{{ $user->name }}">
                     <div>
                         <input name="name" value="{{ $user->name }}" type="text" class="form-control">
                         @error('name')
                             <span class="text-danger fs-6">{{ $message }}</span>
                         @enderror
                     </div>
                 </div>

                 <div>
                     @auth()
                         @if (Auth::id() === $user->id)
                             <a href="{{ route('users.show', $user->id) }}"> View</a>
                         @endif
                     @endauth
                 </div>
             </div>

             <div class="mt-4">
                 <label for="">Profile Picture</label>
                 <input name="image" class="form-control" type="file">
                 @error('image')
                     <span class="text-danger fs-6">{{ $message }}</span>
                 @enderror
             </div>

             <div class="px-2 mt-4">
                 <h5 class="fs-5"> About : </h5>

                 <div class="mb-3">
                     <textarea name="bio" class="form-control" id="bio" rows="3"> {{ $user->bio }} </textarea>
                     @error('bio')
                         <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                     @enderror
                 </div>

                 @include('users.shared.user-stats')

                 <div class="mt-3">
                     <button class="btn btn-primary btn-sm" type="submit"> Save </button>
                 </div>
             </div>
         </form>
     </div>
 </div>
