@props(['menu'])

<article class="brick entry" data-aos="fade-up">

  <div class="entry__thumb">
    <a href="{{ route('menus.display', $menu->slug) }}" class="thumb-link">
          <img src="{{ getImage($menu, true) }}" alt="" style="width:100%">
      </a>
  </div>

  <div class="entry__text">
      <div class="entry__header">
          <h1 class="entry__title"><a href="#">{{ $menu->title }}</a></h1>
          <div class="entry__meta">
              <span class="byline"">@lang('By:')
                  <span class='author'>
                      <a href="#">{{ $menu->user->name }}</a>
                  </span>
              </span>
          </div>
      </div>
      <div class="entry__excerpt">
          <p>{{ $menu->excerpt }}</p>
      </div>
      <a class="entry__more-link" href="#">@lang('Read More')</a>
  </div>

</article>
