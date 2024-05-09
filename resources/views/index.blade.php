<x-layout>
  <x-errors /> 

  @vite(['/resources/css/index.css', '/resources/js/index.js'])
  <body>

    <!-- Introduction -->
    <div class="introduction">
      <img control src="images/warm-portrait.jpg" alt="" />
      <div class="introduction-text m-auto">
        <h1>@lang('messages.introductionText')</h1>
        <h4>@lang('messages.introductionParagraph')</h4>
        <a id="book-now-button" class="button" href="{{ route('booking') }}">@lang('messages.booknow')</a>
      </div>
    </div>

    <!-- WHY US SECTION-->
    <div class="why-us container-fluid p-2">
      <div class="row" data-aos="fade-right" data-aos-offset="400" data-aos-easing="ease-in-sine">
        <div class="col-xl-6 d-flex align-items-center justify-content-start">
          <img src="/images/photography-gear.jpg" class="img-fluid mx-auto d-block" width="80%" alt="">
        </div>
        <div class="col-xl-6 d-flex align-items-center pt-3">
          <div class="mb-3 mr-4 text-center text-center text-xl-left">
            <h2>Cutting-Edge Technology for Captivating Imagery</h2>
            <p class="my-5 fs-4">
              Showcase your commitment to staying at the forefront of photographic technology. Highlight the use of the latest camera equipment, innovative editing software, and any emerging technologies that contribute to creating stunning and contemporary images.
            </p>
          </div>
        </div>
      </div>
      <hr>
      <div class="row" data-aos="fade-left" data-aos-offset="400" data-aos-duration="500">
        <div class="col-xl-6 order-xl-last d-flex align-items-end justify-content-end">
          <img src="/images/portofolio.jpg" class="img-fluid mx-auto d-block" alt="">
        </div>
        <div class="col-xl-6 order-xl-first d-flex text-center text-xl-left justify-content-center align-items-center pt-3">
          <div class="mb-3 mx-4">
            <h2>Exceptional Portfolio Across Diverse Genres</h2>
            <p class="my-5 fs-4">
              Display a diverse and exceptional portfolio that spans various photography genres. From breathtaking landscapes to intimate portraits and dynamic event coverage, your portfolio should reflect a wide range of skills and styles.
            </p>
          </div>
        </div>
      </div>
      <hr>
      <div class="row" data-aos="fade-right" data-aos-offset="400" data-aos-easing="ease-in-sine">
        <div class="col-xl-6 d-flex align-items-center justify-content-start">
          <img src="/images/before-and-after.jpg" class="img-fluid mx-auto d-block" width="80%" alt="">
        </div>
        <div class="col-xl-6 d-flex align-items-center text-center text-xl-left pt-3">
          <div class="mb-3 mr-4">
            <h2>Meticulous Editing for Polished Perfection</h2>
            <p class="my-5 fs-4">
              Highlight your commitment to meticulous post-processing and editing. Showcase before-and-after examples in your portfolio to illustrate the transformative impact of your editing skills. Communicate that each photograph undergoes a detailed editing process to enhance its visual appeal while maintaining authenticity.
            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- END OF WHY US SECTION -->

    <!-- SLIDESHOW BOOTSTRAP -->
    <!-- SlideShow -->
    <div class="carousel-container">
      <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="/images/carousel/wedding.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h2>Wedding Photography</h2>
            </div>
          </div>
          <div class="carousel-item">
            <img src="/images/carousel/baby.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h2>Newborn Photography</h2>
            </div>
          </div>
          <div class="carousel-item ">
            <img src="/images/carousel/product.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h2>Product Photography</h2>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
    <hr>

    <!-- Reviews Section -->
    <div class="container mt-5">
      <h2 class="text-center">@lang('messages.customerReviews')</h2>
      <div class="row">
        <div class="col-md-8 m-auto w-100">
          @forelse ($comments as $comment)
            <div class="card mb-3" data-aos="fade-right" data-aos-offset="350" data-aos-easing="ease-in-sine">
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <img class="me-3 profile-image" style src="{{ asset('/storage/avatars/' . $comment->user->profile_avatar) }}" alt="Profile Avatar"/>
                  <h5 class="card-title">{{ $comment->user->full_name }}</h5>
                </div>
                <p class="mx-3 ms-5 ps-4 card-text">{{ $comment->content }}</p>
                @if ($comment->user_id === auth()->id())
                  <div class="float-right">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $comment->id }}">@lang('messages.edit')</button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $comment->id }}">@lang('messages.delete')</button>
                  </div>
                @endif
              </div>
            </div>

            <!-- Edit Modal -->
            <div class="modal fade" id="editModal{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="editModal{{ $comment->id }}Label" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="editModal{{ $comment->id }}Label">@lang('messages.edit')</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="{{ route('comments.update', $comment->id) }}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="form-group">
                        <label for="content">Comment:</label>
                        <textarea class="form-control" id="content" name="content" rows="3">{{ $comment->content }}</textarea>
                      </div>
                      <button type="submit" class="btn btn-primary">@lang('messages.update')</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <!-- Delete Modal -->
            <div class="modal fade" id="deleteModal{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModal{{ $comment->id }}Label" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header justify-content-between">
                    <h5 class="modal-title" id="deleteModal{{ $comment->id }}Label">@lang('messages.delete')</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>@lang('messages.deleteConfirm')</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('messages.cancel')</button>
                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="d-inline">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">@lang('messages.delete')</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          @empty
            <p class="text-center">No reviews yet! Be the first to share your thoughts.</p>
          @endforelse
        </div>
      </div>

      <!------ ADD NEW REVIEW SECTION----->
      @auth
      <div class="container">
        <h2>@lang('messages.addNewReview')</h2>
        <form action="{{ route('comments.store') }}" method="POST">
          @csrf
          <div class="form-group">
            {{-- <label for="content">Add your Review:</label> --}}
            <textarea class="form-control" id="content" name="content" rows="3"></textarea>
          </div>
          <button type="submit" class="mt-2 btn btn-primary">@lang('messages.submit')</button>
        </form>
      </div>
      @endauth
    </div>
  </body>
</x-layout>
