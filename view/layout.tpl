<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>MiPhoto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="/css/bootstrap.css" rel="stylesheet">
    {*<link href="/css/bootstrap-responsive.css" rel="stylesheet">*}
    <link href="/css/base.css" rel="stylesheet">
    <link href="/css/messages.css" rel="stylesheet">
    <link href="/css/albums.css" rel="stylesheet">
    <link href="/css/controls.css" rel="stylesheet">
    <link href="/css/photos.css" rel="stylesheet">
    <link href="/css/gallery.css" rel="stylesheet">

    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/lazyload.js"></script>
    <script type="text/javascript" src="/js/messages.js"></script>
    <script type="text/javascript" src="/js/gallery.js"></script>
  {if $Auth}
    <script type="text/javascript" src="/js/controls.js"></script>
    <script type="text/javascript" src="/js/controls/photos.js"></script>
  {/if}

  </head>

  <body>
    {include file="menu.tpl"}

  <div class="container-fluid">
    {block "content"}

    {/block}
  </div>

  <footer>
      <div class="b-messages">
          <div class="e-message"></div>
      </div>
  </footer>

  </body>

</html>