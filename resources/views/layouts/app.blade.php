<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>El Buen Godin</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/custom.css">
  </head>
  <body>
    @include('inc.navbar')
    <div >
      @if(Request::is('/'))
        @include('inc.showcase')
      @endif
    </div>
      <div class="container" style="padding-bottom: 170px;">
        <div class="row">
          <div class="col-md-8 col-lg-10">
              @include('inc.mensajes')
              @yield('content')
              @show
              @if(Request::is('/'))
                @include('inc.masrecientes')

              @endif
          </div>
          <div class="col-md-4 col-lg-2">
              <h1>Side Bar</h1>
          </div>
        </div>
     </div>
    <footer id="footer" class="footer">
        @include('inc.footernavbar')
    </footer>
  </body>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
      <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
      <script>
      $(function() {
        $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
      });
      </script>
</html>
