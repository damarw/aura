

<!-- jQuery -->
    
 <script src="{{asset('theme/js/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('theme/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('theme/js/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('theme/js/nprogress.js')}}"></script>
    <!-- jQuery custom content scroller -->
    <script src="{{asset('theme/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{asset('theme/js/custom.min.js')}}"></script>
    <script src="{{asset('theme/js/jquery.dataTables.min.js')}}"></script>
	@yield('js_asset')
    @yield('js')
</body>

</html>