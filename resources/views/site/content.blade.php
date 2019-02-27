@if(isset($pages))
@foreach($pages as $page)
@if($page['alias'] == 'home')
<section id="home" class="top_cont_outer">
  <div class="hero_wrapper">
    <div class="container">
      <div class="hero_section">
        <div class="row">
          <div class="col-lg-5 col-sm-7">
            <div class="top_left_cont zoomIn wow animated">
              {!! $page->text !!}
              <a href="#service" class="read_more2">Узнать больше</a> </div>
          </div>
          <div class="col-lg-7 col-sm-5">
			      {!! Html::image('img/'.$page->images, '', array('class'=>'zoomIn wow animated')) !!}
		      </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Hero_Section-->
@endif

@if($page['alias'] == 'aboutUs')
<section id="aboutUs"><!--Aboutus-->
<div class="inner_wrapper">
  <div class="container">
    <h2>Обо мне</h2>
    <div class="inner_section">
	<div class="row">
      <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">{!! Html::image('img/'.$page->images, '', array('class'=>'img-circle delay-03s animated wow zoomIn')) !!}</div>
      	<div class=" col-lg-7 col-md-7 col-sm-7 col-xs-12 pull-left">
        	<div class=" delay-01s animated fadeInDown wow animated">
            {!! $page->text !!}
</div>
<div class="work_bottom"> <span>Связаться со мной...</span> <a href="#contact" class="contact_btn">Contact Us</a> </div>
	   </div>

      </div>

    </div>
  </div>
  </div>
</section>
<!--Aboutus-->
@endif
@endforeach
@endif

@if(isset($services))
<!--Service-->
<section  id="service">
  <div class="container">
    <h2>Стек технологий</h2>
    <div class="service_wrapper">
      @foreach($services as $k=>$service)
        @if($k == 0 || $k%3 == 0)
          <div class="row {{ ($k != 0) ? 'borderTop' : '' }}">
        @endif

        <div class="col-lg-4 {{ ($k%3 > 0) ? 'borderLeft' : '' }} {{ ($k > 2) ? 'mrgTop' : ''}}">
          <div class="service_block">
            <div class="service_icon delay-03s animated wow  zoomIn"> <span><i class="{{ $service->icon }}"></i></span> </div>
            <h3 class="animated fadeInUp wow">{{ $service->name }}</h3>
            <p class="animated fadeInDown wow">{{ $service->text }}</p>
          </div>
        </div>

        @if(($k + 1)%3 == 0) {{-- Закрывает класс row --}}
          </div>
        @endif
      @endforeach
    </div>
  </div>
</section>
<!--Service-->
@endif

@if(isset($portfolios) and isset($tags))
<!-- Portfolio -->
<section id="Portfolio" class="content">

  <!-- Container -->
  <div class="container portfolio_title">

    <!-- Title -->
    <div class="section-title">
      <h2>Портфолио</h2>
    </div>
    <!--/Title -->

  </div>
  <!-- Container -->

  <div class="portfolio-top"></div>

  <!-- Portfolio Filters -->
  <div class="portfolio">
    <div id="filters" class="sixteen columns">
      <ul class="clearfix">
        <li><a id="all" href="#" data-filter="*" class="active">
          <h5>All</h5>
          </a></li>
        @foreach($tags as $tag)
        <li><a class="" href="#" data-filter=".{{ $tag }}">
          <h5>{{ $tag }}</h5>
          </a></li>
        @endforeach
      </ul>
    </div>
    <!--/Portfolio Filters -->

    <!-- Portfolio Wrapper -->
    <div class="isotope fadeInLeft animated wow" style="position: relative; overflow: hidden; height: 480px;" id="portfolio_wrapper">

    @foreach($portfolios as $item)
      <!-- Portfolio Item -->
      <div style="position: absolute; left: 0px; top: 0px; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1); width: 337px; opacity: 1;" class="portfolio-item one-four   {{ $item->filter }} isotope-item">
        <div class="portfolio_img"> <img src="img/{{ $item->images }}"  alt="Portfolio 1"> </div>
        <div class="item_overlay">
          <div class="item_info">
            <h4 class="project_name">{{ $item->name }}</h4>
          </div>
        </div>
        </div>
    @endforeach
    </div>
    <!--/Portfolio Wrapper -->

  </div>
  <!--/Portfolio Filters -->

  <div class="portfolio_btm"></div>


  <div id="project_container">
    <div class="clear"></div>
    <div id="project_data"></div>
  </div>


</section>
<!--/Portfolio -->
@endif
