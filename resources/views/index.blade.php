{{-- @extends('components.spinner') --}}
<x-layout>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite(['/resources/css/index.css'])
  <title>Celestial Captures</title>
</head>
<body>
<!-- Introduction -->
<div class="introduction">
  <img control src="images/warm-portrait.jpg" alt="" />
  <div class="introduction-text m-auto">
    <h1>
      Through the Lens: <br />Capturing Moments, <br />Creating Memories
    </h1>
    <h4>
      Seize the extraordinary through the lens of unforgettable moments.
      Immerse yourself in experiences that etch memories into the fabric of
      time. We invite you to capture the magic, the laughter, and the joy so
      that you never forget the stories written in the language of moments.
      Your indelible memories start here, framed in the beauty of each
      captured instant.
    </h4>
    <a id="book-now-button" class="button" href="/My-first-website/pages/booking.php">Book now</a>
  </div>
</div>

<!-- WHY US SECTION-->

<div class="why-us container-fluid p-2">
  <div class="row">
    <div class="col-xl-6 d-flex align-items-center justify-content-start">
      <img src="/images/photography-gear.jpg" class="img-fluid mx-auto d-block" width="80%" alt="">
    </div>
    <div class="col-xl-6 d-flex align-items-center pt-3 ">
      <div class="mb-3 mr-4 text-center text-center text-xl-left">
        <h2>Cutting-Edge Technology for Captivating Imagery</h2>
        <p class="my-5 fs-4">
          Showcase your commitment to staying at the forefront of
          photographic technology. Highlight the use of the latest camera
          equipment, innovative editing software, and any emerging
          technologies that contribute to creating stunning and
          contemporary images.
        </p>
      </div>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-xl-6 order-xl-last d-flex align-items-end justify-content-end">
      <img src="/images/photography-gear.jpg" class="img-fluid mx-auto d-block" width="80%" alt="">
    </div>
    <div class="col-xl-6 order-xl-first d-flex text-center text-xl-left justify-content-center align-items-center pt-3 ">
      <div class="mb-3 mx-4">
        <h2>Cutting-Edge Technology for Captivating Imagery</h2>
        <p class="my-5 fs-4">
          Showcase your commitment to staying at the forefront of
          photographic technology. Highlight the use of the latest camera
          equipment, innovative editing software, and any emerging
          technologies that contribute to creating stunning and
          contemporary images.
        </p>
      </div>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-xl-6 d-flex align-items-center justify-content-start ">
      <img src="/images/photography-gear.jpg" class="img-fluid mx-auto d-block" width="80%" alt="">
    </div>
    <div class="col-xl-6 d-flex align-items-center text-center text-xl-left pt-3">
      <div class="mb-3 mr-4">
        <h2>Cutting-Edge Technology for Captivating Imagery</h2>
        <p class="my-5 fs-4">
          Showcase your commitment to staying at the forefront of
          photographic technology. Highlight the use of the latest camera
          equipment, innovative editing software, and any emerging
          technologies that contribute to creating stunning and
          contemporary images.
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

    <!-- Comments Section -->
    <div class="container mt-5">
      <h2>Customer Reviews</h2>
      <div class="row">
          <div class="col-md-8">
              @forelse ($comments as $comment)
                  <div class="card mb-3">
                      <div class="card-body">
                          <h5 class="card-title">{{ $comment->user->full_name }}</h5>
                          <p class="card-text">{{ $comment->content }}</p>
                          {{-- <p class="text-muted">{{ $comment->created_at->diffForHumans() }}</p> --}}
                          @if ($comment->user_id === auth()->id())
                              <div class="float-right">
                                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $comment->id }}">Edit</button>
                                  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $comment->id }}">Delete</button>
                              </div>
                          @endif
                      </div>
                  </div>
  
                  <!-- Edit Modal -->
                  <div class="modal fade" id="editModal{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="editModal{{ $comment->id }}Label" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="editModal{{ $comment->id }}Label">Edit Comment</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                      <button type="submit" class="btn btn-primary">Update</button>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
  
                  <!-- Delete Modal -->
                  <div class="modal fade" id="deleteModal{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModal{{ $comment->id }}Label" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="deleteModal{{ $comment->id }}Label">Delete Comment</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                  <p>Are you sure you want to delete this comment?</p>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                  <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="d-inline">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger">Delete</button>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
              @empty
                  <p>No reviews yet.</p>
              @endforelse
          </div>
      </div>
      @auth
      <div class="container">
        <h1>Add New Comment</h1>
        <form action="{{ route('comments.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="content">Comment:</label>
                <textarea class="form-control" id="content" name="content" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
      @endauth
  </div>
    
  </body>
  </html>
</x-layout>