@extends('layouts.app')

@section('content')
    
    
    <section class="bg-light pnull" id="portfolio">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Доступні курси</h2>
            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
          </div>
        </div>
        <div class="flexx">
         @forelse($lessons_groups as $l_group)
             <div class="col-md-4 col-sm-6 portfolio-item">
                <a class="portfolio-link" href="{{ route('lessons_group.show', [ 'id' => $l_group->id ]) }}">
                 @if (Storage::disk('local')->has('courses/'.$l_group->image) )
                  <div class="portfolio-hover">
                    <div class="portfolio-hover-content">
                      <i class="fa fa-graduation-cap fa-3x"></i>
                    </div>
                  </div>
                  <img class="img-fluid" src="{{ route('lessons_group.image', ['filename' => $l_group->image ]) }}" alt="{{ $l_group->title }}">
                  @endif
                </a>
                <div class="portfolio-caption">
                  <h4>{{ $l_group->title }}</h4>
                  <p class="text-muted">{{ $l_group->description }}</p>
                </div>
              </div>
         @empty
             <h2>Немає доступних курсів</h2>
         @endforelse
        </div>
      </div>
    </section>
    
@endsection