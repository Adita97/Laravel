<x-layout>
    @vite(['/resources/css/gallery.css','/resources/js/pixabay-api.js'])

    <div class="search-container">
        <form id="searchForm">
          <input type="text" id="searchInput" value="Photosession" />
          <button class="search-button" type="submit">Search</button>
        </form>
    </div>
  
    <div id="gallery"></div>



</x-layout>