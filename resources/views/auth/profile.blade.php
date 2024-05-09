<x-layout>
<x-errors/>
@vite(['/resources/css/profile.css'])
<div class="container emp-profile">
    <div class="row">
        <div class="col-md-4">
            <div class="profile-img">
                <img src="{{ asset('/storage/avatars/' . $user->profile_avatar) }}" alt="Profile Avatar"/>
                <div class="file btn btn-sm btn-primary">
                    <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#uploadModal">Change Photo</button >
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="profile-head">
                <h5>{{$user->full_name}}</h5>
                <h6>Web Developer and Designer</h6>
                <p class="profile-rating">RANKINGS : <span>8/10</span></p>
                <hr>
            </div>
        </div>
        <div class="col-md-2">
            <button type="button" class="profile-edit-btn btn btn-primary" id="editProfileBtn">Edit Profile</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="profile-work">
                <p>LINKS</p>
                <a href="{{ $user->userLinks->website ?? '#' }}" target="_blank">Website Link</a><br/>
                <a href="{{ $user->userLinks->twitter ?? '#' }}" target="_blank">Twitter Profile</a><br/>
                <a href="{{ $user->userLinks->instagram ?? '#'}}">Instagram Profile</a>
                <div class="m-2">
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editLinksModal">Edit Links</button>
                </div>
                    <!------- Skills Profile -------> 
                    <p>SKILLS</p>
                    @if($user->userSkills->isNotEmpty())
                        @foreach($user->userSkills as $skill)
                            <div class="d-flex flex-row">
                                <a class="m-1 mr-3">{{ $skill->skill }}<a>
                                <form method="POST" action="{{ route('profile.deleteSkills', $skill->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                </form>
                            </div>
                        @endforeach
                    @else
                        <p><b>No skills added.</b></p>
                    @endif
                    <a href="#" class="btn btn-sm btn-primary text-white mx-1" data-bs-toggle="modal" data-bs-target="#skillsModal">Add New Skills</a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab" >
                        <div class="row my-2">
                            <div class="col-md-4">
                                <label>Username </label>
                            </div>
                            <div class="col-md-4 d-flex flex-row align-items-center">
                                <p class="my-auto">{{$user->username}}</p>
                            </div>
                            <div class="col-md-4 ">
                                <a href="#" class="btn btn-sm btn-primary mx-1" data-bs-toggle="modal" data-bs-target="#usernameModal">Change</a>
                            </div>
                        </div>  
                        <div class="row my-2">
                            <div class="col-md-4">
                                <label>Name</label>
                            </div>
                            <div class="col-md-8">
                                <p class="my-auto">{{$user->full_name}}</p>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-md-4">
                                <label>Email</label>
                            </div>
                            <div class="col-md-4 d-flex flex-row align-items-center">
                                <p class="my-auto"> {{$user->email}}</p>
                            </div>
                            <div class="col-md-4">
                                <a href="#" class="btn btn-sm btn-primary mx-1" data-bs-toggle="modal" data-bs-target="#emailModal">Change</a>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-md-4">
                                <label>Bio</label>
                            </div>
                            <div class="col-md-4 d-flex flex-row align-items-center">
                                <p class="my-auto"> {{$user->bio}}</p>
                            </div>
                            <div class="col-md-4">
                                <a href="#" class="btn btn-sm btn-primary mx-1" data-bs-toggle="modal" data-bs-target="#bioModal">Change</a>
                            </div>
                        </div>

                                    {{-- PHONE NUMBER  --}}
                        <div class="row my-2">
                            <div class="col-md-4">
                                <label>Phone Number</label>
                            </div>
                            <div class="col-md-4 d-flex flex-row align-items-center">
                                <p class="my-auto">{{ $user->phone_number }}</p>
                            </div>
                            <div class="col-md-4">
                                <a href="#" class="btn btn-sm btn-primary mx-1" data-bs-toggle="modal" data-bs-target="#phoneModal">Change</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

            <!-------MODALS-------->


        <!--------- USERNAME MODAL -------->
<div class="modal fade" id="usernameModal" tabindex="-1" role="dialog" aria-labelledby="usernameModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-between">
                        <h5 class="modal-title" id="usernameModalLabel">Update Username</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('profile.updateUsername') }}">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="username">New Username:</label>
                                <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                     </form>
                 </div>
            </div>
</div>
        
        <!--------- EMAIL MODAL ------------>
<div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="emailModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-between">
                        <h5 class="modal-title" id="emailModalLabel">Update Email Address</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('profile.updateEmail') }}">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="email">New Email Address:</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
</div>

        <!----------PHONE NUMBER MODAL---------->
<div class="modal fade" id="phoneModal" tabindex="-1" role="dialog" aria-labelledby="phoneModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-between">
                        <h5 class="modal-title" id="phoneModalLabel">Update Phone Number</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('profile.updatePhoneNumber') }}">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="phone_number">New Phone Number:</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $user->phone_number }}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                 </div>
            </div>
</div>


<div class="modal fade" id="bioModal" tabindex="-1" role="dialog" aria-labelledby="bioModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
                <h5 class="modal-title" id="bioModalLabel">Update Bio </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('profile.updateBio') }}">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="bio">New Bio:</label>
                        <input type="text" class="form-control" id="bio" name="bio" value="{{ $user->bio }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
<x-error\>
                </div>
            </form>
         </div>
    </div>
</div>
    
        <!----------PROFILE AVATAR MODAL-------------->     
<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalLabel">Upload New Profile Avatar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Profile Avatar Upload Form -->
                    <form action="/profile/update-avatar" id="uploadForm" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="avatar" class="form-label">Choose Avatar:</label>
                            <input type="file" class="form-control" id="avatar" name="profile_avatar">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div> 

        <!-------------- SKILLS MODAL -------------->
<div class="modal fade" id="skillsModal" tabindex="-1" aria-labelledby="skillsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="skillsModalLabel">Upload New Profile Avatar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Skills Form -->
                    <form method="POST" action="{{route('profile.updateSkills')}}">
                        @csrf
                        <input type="text" name="skills[]" placeholder="Enter a skill">
                        <button type="submit">Add Skill</button>
                    </form>
                </div>
            </div>
        </div>
</div> 

        <!-------------- LINKS MODAL -------------->
<div class="modal fade" id="editLinksModal" tabindex="-1" role="dialog" aria-labelledby="editLinksModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
              <h5 class="modal-title" id="editLinksModalLabel">Edit Profile Links</h5>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- Form for editing links -->
              <form method="post" action="{{route('profile.updateLinks')}}">
                @csrf
                @method('PUT')
                <!-- Website Link -->
                <div class="form-group">
                  <label for="website">Website</label>
                  <input type="text" class="form-control" id="website" name="website" value="{{ $user->userLinks->website ?? '' }}">
                </div>
                <!-- Twitter Link -->
                <div class="form-group">
                  <label for="twitter">Twitter</label>
                  <input type="text" class="form-control" id="twitter" name="twitter" value="{{ $user->userLinks->twitter ?? '' }}">
                </div>
                <!-- Instagram Link -->
                <div class="form-group">
                  <label for="instagram">Instagram</label>
                  <input type="text" class="form-control" id="instagram" name="instagram" value="{{ $user->userLinks->instagram ?? '' }}">
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
              </form>
            </div>
          </div>
        </div>
      </div>   
</div>
<script>

document.addEventListener('DOMContentLoaded', function () {
        var editProfileBtn = document.getElementById('editProfileBtn');
        var changeButtons = document.querySelectorAll('.btn-sm');

        // Hide all Change buttons initially
        changeButtons.forEach(function(button) {
            button.style.display = 'none';
        });

        // Show Change buttons when Edit Profile button is clicked
        editProfileBtn.addEventListener('click', function() {
            changeButtons.forEach(function(button) {
                button.style.display = 'inline-block';
            });
        });
    });    
</script>
</x-layout>