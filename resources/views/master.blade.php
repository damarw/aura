@include('parsing.header')
<body class="nav-md footer_fixed">
    <div class="container body">
      <div class="main_container">
		@include('parsing.sidebar')
			@yield('content')
				 <!-- footer content -->
		        <footer>
		          <div class="pull-right">
		            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
		          </div>
		          <div class="clearfix"></div>
		        </footer>
		        <!-- /footer content -->
		 </div>
    </div>
@include('parsing.js')