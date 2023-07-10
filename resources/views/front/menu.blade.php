@extends('front.layout')

@section('main')

<!-- menu
================================================== -->
<div class="row">
  <div class="column large-12">

      <article class="s-content__entry format-standard">

          <div class="s-content__media">
              <div class="s-content__menu-thumb">
                  <img src="{{ getImage($menu) }}" alt="" style="width:100%">
              </div>
          </div>

          <div class="s-content__entry-header">
              <h1 class="s-content__title s-content__title--menu">{{ $menu->title }}</h1>
          </div>

          <div class="s-content__primary">

              <div class="s-content__entry-content">

                  {!! $menu->body !!}

              </div>

              <div class="s-content__entry-meta">

                  <div class="entry-author meta-blk">
                      <div class="author-avatar">
                          <img class="avatar" src="{{ Gravatar::get($menu->user->email) }}" alt="">
                      </div>
                      <div class="byline">
                          <span class="bytext">@lang('Posted By')</span>
                            <a href="{{ route('author', $menu->user->id) }}">{{ $menu->user->name }}</a>
                      </div>
                  </div>

                  <div class="meta-bottom">

                      <div class="entry-cat-links meta-blk">
                          <div class="cat-links">
                              <span>@lang('In')</span>
                              @foreach ($menu->categories as $category)
                                 <a href="{{ route('category', $category->slug) }}">{{ $category->title }}</a>
                              @endforeach
                          </div>

                          <span>@lang('On')</span>
                          {{ formatDate($menu->created_at) }}
                      </div>

                      <div class="entry-tags meta-blk">
                          <span class="tagtext">@lang('Tags')</span>
                          @foreach($menu->tags as $tag)
                              <a href="#">{{ $tag->tag }}</a>
                          @endforeach
                      </div>

                  </div>

              </div>

              <div class="s-content__pagenav">
                  @isset($menu->previous)
                      <div class="prev-nav">
                          <a href="{{ route('menus.display', $menu->previous->slug) }}" rel="prev">
                              <span>@lang('Previous')</span>
                              {{ $menu->previous->title }}
                          </a>
                      </div>
                  @endisset
                  @isset($menu->next)
                      <div class="next-nav">
                          <a href="{{ route('menus.display', $menu->next->slug) }}" rel="next">
                              <span>@lang('Next One')</span>
                              {{ $menu->next->title }}
                          </a>
                      </div>
                  @endisset
               </div>

          </div>
      </article>

  </div>
</div>

@endsection
