@extends('dash-master')

@section('title', "Your Dashboard - ".Auth::user()->name)

@section('content')
    <div class="row">
        <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
            <div class="card bg-success">
                <div class="card-body text-center">
                    <legend class="card-title text-white">Users</legend>
                    <span class="text-white" style="font-size:1.4rem;">{{ $sums['no_users'] }}</span>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
            <div class="card bg-warning">
                <div class="card-body text-center">
                    <legend class="card-title text-white">Posts</legend>
                    <span class="text-white" style="font-size:1.4rem;">{{ $sums['post_count'] }}</span>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
            <div class="card bg-info">
                <div class="card-body text-center text-white">
                    <legend class="card-title">Events</legend>
                    <p class="card-text" style="font-size:1.4rem;">{{ $sums['events'] }}</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
            <div class="card bg-dark">
                <div class="card-body text-center text-white">
                    <legend class="card-title">Messages</legend>
                    <p class="card-text" style="font-size:1.4rem;">{{ $sums['messages'] }}</p>
                </div>
            </div>
        </div>
    </div>
    <hr>
    @include('shared.alerts')
    @can('administer site content')
      @if (empty($settings['about']))
          <div class="jumbotron rounded my-3 alert alert-warning">
              <div class="col-md-12">
                  <p>This site's About page is currently missing some content. Add content to help your 
                      visitors learn more about what your site is about.
                      <a class="btn btn-link btn-primary" href="/admin/about/add">Add now</a>
                  </p>
              </div>
          </div>
      @endif
    @endcan
    <div id="tasks">
        @include('shared.fragments.events')
        @include('shared.fragments.posts')
    </div>
    <div class="alert alert-primary hide" role="alert" id="alert">
        <h3 class="alert-heading">Heads up, you have no tasks</h3>
        <p>
            You have completely performed all necessary tasks about this website. 
            Keep up the good work and make your site accessible and friendly to members!
        </p>
    </div>
</div>
@endsection