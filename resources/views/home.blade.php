@extends( 'base' )

@section( 'content' )
<div class="container">
@if( !empty( Options::get_option( 'homeAd' ) ) )
<div class="row">
<div class="col-xs-12">
    {!! Options::get_option( 'homeAd' ) !!}
    <br><br>
</div><!-- /.col-xs-12 -->
</div><!-- /.row -->
@endif
<div class="row">

@forelse($reviews as $r)

    <div class="col-md-4 margin-bottom-25">
        <div class="card">
            <p class="text-warning">
                {!! str_repeat('<i class="fa fa-star"></i>', $r->rating) !!}
                <span class="text-muted">
                    {{ number_format($r->rating,2)  }}/5.00
                </span>
            </p>
            <div class="row">
            <div class="col-4 col-md-3">
                <img src="{{ $r->user->profileThumb }}" alt="profile pic" class="img-fluid rounded-circle shadow">
            </div><!-- /.col-xs-6 col-md-1 -->
            <div class="col-8 col-md-8 text-muted">
                <strong>{{ $r->reviewer }}</strong> {{ __('reviewed') }}<br>

                <a href="{{ $r->site->slug }}">{{ $r->site->url }}</a>
            </div><!-- /.col-xs-6 col-md-11 -->
            </div><!-- /.row -->
            <br>
            <p class="text-bold">"{{ $r->review_title }}"</p>
            <p>{{ substr( $r->review_content, 0, 99 )}}...</p>
            <p class="justify-content-between">
                <span class="text-muted float-left">
                    {{ $r->timeAgo  }}
                </span>
                <a href="{{ $r->site->slug }}" class="btn btn-sm inline btn-success float-right">
                    &raquo; {{ __('Read Review') }}
                </a>
            </p>
            <!-- /.btn btn-xs btn-success -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col-md-3 -->
    
<!-- /.container -->
@empty
    <h1 class="text-center">
      <span class="badge badge-warning">
          {{ __('No reviews yet :(') }}
      </span>
      <!-- /.badge badge-warning -->
    </h1>
@endforelse
    
</div>
<!-- /.row -->
</div>

@endsection