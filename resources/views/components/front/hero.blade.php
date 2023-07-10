@props(['menu'])

<div class="s-hero__slide">

  <div class="s-hero__slide-bg" style="background-image: url('storage/photos/{{ $menu->user->id }}/{{ $menu->image }}')"></div>

  <div class="row s-hero__slide-content animate-this">
      <div class="column">
          <div class="s-hero__slide-meta">
              <span class="cat-links">
                  @foreach($menu->categories as $category)
                      <a href="#">{{ $category->title }}</a>
                  @endforeach
              </span>
              <span class="byline">
                  @lang('Posted By')
                  <span class="author">
                      <a href="#">{{ $menu->user->name }}</a>
                  </span>
              </span>
          </div>
          <h1 class="s-hero__slide-text">
              <a href="#">{{ $menu->title }}</a>
          </h1>
      </div>
  </div>

</div>
