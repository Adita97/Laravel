<x-layout>
  <head>
      @vite(['resources/css/about.css'])
  </head>
  <div class="container about-us">
      <h1 class="text-center">@lang('about.about')</h1>
      <p class="fs-5">
          @lang('about.welcome')
      </p>
  </div>
  <div class="row mx-auto justify-content-center my-3">
      <div class="col-md-3" style="width: auto;">
          <div class="card" style="width: 18rem;">
              <img src="{{asset('images/team/photographer.jpg')}}" class="card-img-top" alt="@lang('about.photographer')">
              <div class="card-body">
                  <h4 class="card-title text-center">@lang('about.photographer')</h4>
                  <h5 class="card-title text-center">@lang('about.photographerName')</h5>
                  <p class="card-text">@lang('about.photographerDescription')</p>
              </div>
          </div>
      </div>

      <div class="col-md-3" style="width: auto;">
          <div class="card" style="width: 18rem;">
              <img src="{{asset('images/team/editor.jpg')}}" class="card-img-top" alt="@lang('about.editor')">
              <div class="card-body">
                  <h4 class="card-title text-center">@lang('about.editor')</h4>
                  <h5 class="card-title text-center">@lang('about.editorName')</h5>
                  <p class="card-text">@lang('about.editorDescription')</p>
              </div>
          </div>
      </div>

      <div class="col-md-3" style="width: auto;">
          <div class="card" style="width: 18rem;">
              <img src="{{asset('images/team/assistant.jpg')}}" class="card-img-top" alt="@lang('about.assistant')">
              <div class="card-body">
                  <h4 class="card-title text-center">@lang('about.assistant')</h4>
                  <h5 class="card-title text-center">@lang('about.assistantName')</h5>
                  <p class="card-text">@lang('about.assistantDescription')</p>
              </div>
          </div>
      </div>

      <div class="col-md-3" style="width: auto;">
          <div class="card" style="width: 18rem;">
              <img src="{{asset('images/team/videographer.jpg')}}" class="card-img-top" alt="@lang('about.videographer')">
              <div class="card-body">
                  <h4 class="card-title text-center">@lang('about.videographer')</h4>
                  <h5 class="card-title text-center">@lang('about.videographerName')</h5>
                  <p class="card-text">@lang('about.videographerDescription')</p>
              </div>
          </div>
      </div>
  </div>
</x-layout>
