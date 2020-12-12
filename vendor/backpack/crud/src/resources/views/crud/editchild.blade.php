@extends(backpack_view('blank'))

@php
  $defaultBreadcrumbs = [
    trans('backpack::crud.admin') => url(config('backpack.base.route_prefix'), 'dashboard'),
    $crud->entity_name_plural => url($crud->route),
    trans('backpack::crud.add') => false,
  ];

  // if breadcrumbs aren't defined in the CrudController, use the default breadcrumbs
  $breadcrumbs = $breadcrumbs ?? $defaultBreadcrumbs;
@endphp

@section('header')
	<section class="container-fluid">
	  <h2>
        <span class="text-capitalize">{!! $crud->getHeading() ?? $crud->entity_name_plural !!}</span>
        <small>{!! $crud->getSubheading() ?? trans('backpack::crud.add').' '.$crud->entity_name !!}.</small>

        @if ($crud->hasAccess('list'))
          <small><a href="{{ url($crud->route) }}" class="d-print-none font-sm"><i class="la la-angle-double-{{ config('backpack.base.html_direction') == 'rtl' ? 'right' : 'left' }}"></i> {{ trans('backpack::crud.back_to_all') }} <span>{{ $crud->entity_name_plural }}</span></a></small>
        @endif
	  </h2>
	</section>
@endsection

@section('content')

<div class="row">
	
	<div class="{{ $crud->getCreateContentClass() }}">
		<!-- Default box -->

		@include('crud::inc.grouped_errors')

		  <form method="post"
		  		action="{{ url($crud->route) }}"
				@if ($crud->hasUploadFields('create'))
				enctype="multipart/form-data"
				@endif
		  		>
			  {!! csrf_field() !!}
		      <!-- load the view from the application if it exists, otherwise load the one in the package -->
		      @if(view()->exists('vendor.backpack.crud.form_content'))
		      	@include('vendor.backpack.crud.form_content', [ 'fields' => $crud->fields(), 'action' => 'create' ])
		      @else
		      	@include('crud::form_content', [ 'fields' => $crud->fields(), 'action' => 'create' ])
		      @endif


<!-- .row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <section class="cd-horizontal-timeline" style="margin:none;">
                                <div class="timeline" style="max-width:none;">
                                    <div class="events-wrapper">
                                        <div class="events">
                                            <ol>
                                                <li><a href="#0" data-date="01/01/2014" class="selected">Main</a></li>
                                                <li><a href="#0" data-date="28/02/2014"  style="left: 600px;">Stock Norms</a></li>
                                                <li><a href="#0" data-date="20/04/2014" style="left: 490px;">Business Partners</a></li>
                                                <li><a href="#0" data-date="28/05/2014" style="left: 300px;">Alt/Subsitute Product</a></li>
                                                <li><a href="#0" data-date="09/07/2014" style="left: 300px;">Other Languages</a></li>
                                                <li><a href="#0" data-date="30/08/2014" style="left: 300px;right:30px;">Characteristics</a></li>
                                                <li><a href="#0" data-date="15/09/2014" style="left: 800px;">Sales Tax</a></li>
                                                <li><a href="#0" data-date="01/11/2014" style="left: 600px;right:500px;">Product Offices</a></li>
                                                <li><a href="#0" data-date="10/12/2014" style="left: 1500px;right:180px;">Child Barcode</a></li>
                                                <li><a href="#0" data-date="19/01/2015" style="left: 1200px;right:90px;">Scheme Informations</a></li>
                                                <li><a href="#0" data-date="03/03/2015" style="left: 1000px;right:10px;">Price History</a></li>
                                            </ol> <span class="filling-line" aria-hidden="true"></span> </div>
                                        <!-- .events -->
                                    </div>
                                    <!-- .events-wrapper -->
                                    <ul class="cd-timeline-navigation">
                                        <li><a href="#0" class="prev inactive">Prev</a></li>
                                        <li><a href="#0" class="next">Next</a></li>
                                    </ul>
                                    <!-- .cd-timeline-navigation -->
                                </div>
                                <!-- .timeline -->
                                <div class="events-content">
                                    <ol>
                                        <li class="selected" data-date="01/01/2014">
		      								@include('products_subs.editproductmain')
		                                </li>
                                        <li data-date="28/02/2014">
                                            @include('products_subs.editstocknorms')
                                        </li>
                                        <li data-date="20/04/2014">
                                             @include('products_subs.editbusiness_partners')
                                        </li>
                                        <li data-date="28/05/2014">
                                            @include('products_subs.editalt_subsitude_products')
                                        </li>
                                        <li data-date="09/07/2014">
                                            @include('products_subs.editother_languages')
                                        </li>
                                        <li data-date="30/08/2014">
                                            @include('products_subs.editcharacteristics')
                                        </li>
                                        <li data-date="15/09/2014">
                                            @include('products_subs.editsales_tax')
                                        </li>
                                        <li data-date="01/11/2014">
                                            @include('products_subs.editproduct_offices')
                                        </li>
                                        <li data-date="10/12/2014">
                                            @include('products_subs.editchild_barcode')
                                        </li>
                                        <li data-date="19/01/2015">
                                            @include('products_subs.editscheme_information')
                                        </li>
                                        <li data-date="03/03/2015">
                                            @include('products_subs.editprice_history')
                                        </li>
                                    </ol>
                                </div>
                                <!-- .events-content -->
                            </section>
                        </div>
                    </div>
                </div>
                <!-- /.row -->


	          @include('crud::inc.form_save_buttons')
		  </form>







	</div>
</div>

@endsection

