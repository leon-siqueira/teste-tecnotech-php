<?php
  http_response_code(404);
  $title = 'Page not found';
  require __DIR__.'/layout.php';
?>
<div class="container text-center mt-5">
  <div class="row">
    <div class="col-md-12">
      <div class="">
        <h1>Oops!</h1>
        <h2>404 Not Found</h2>
        <div class="my-4">
          Sorry, an error has occurred, the requested page was not found!
        </div>
        <div class="error-actions">
          <a href="/" class="btn btn-primary btn-lg">
            <span class="glyphicon glyphicon-home"></span>
            Take Me Home
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
