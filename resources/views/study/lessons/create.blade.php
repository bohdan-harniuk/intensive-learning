@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
               <div class="panel-heading">
                   Create lesson
               </div>
                <div class="panel-body">
                  <form action="/articles" method="post">
                     {{ csrf_field() }}
                     <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                      <div class="form-group">
                       <label for="content">Content</label>
                       <textarea name="content" id="" cols="30" rows="3" class="form-control"></textarea>
                       </div>
                       <div class="checkbox">
                           <label><input type="checkbox" name="live">Live</label>
                       </div>
                       <div class="form-group">
                           <label for="post_on">Post on</label>
                           <input type="datetime-local" name="post_on" class="form-control">
                       </div>
                        <input type="submit" class="btn btn-success pull-right">
                  </form>
                </div>
            </div>
        </div>
    </div>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="la.jpg" alt="Chania">
      <div class="carousel-caption">
        <h3>Los Angeles</h3>
        <p>LA is always so much fun!</p>
      </div>
    </div>

    <div class="item">
      <img src="chicago.jpg" alt="Chicago">
      <div class="carousel-caption">
        <h3>Chicago</h3>
        <p>Thank you, Chicago!</p>
      </div>
    </div>

    <div class="item">
      <img src="ny.jpg" alt="New York">
      <div class="carousel-caption">
        <h3>New York</h3>
        <p>We love the Big Apple!</p>
      </div>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
@endsection