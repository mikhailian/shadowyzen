<?php
/**
 * @file
 * Returns the HTML for the basic html structure of a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728208
 */
?><!DOCTYPE html>
<!--[if IEMobile 7]><html class="iem7" <?php print $html_attributes; ?>><![endif]-->
<!--[if lte IE 6]><html class="lt-ie9 lt-ie8 lt-ie7" <?php print $html_attributes; ?>><![endif]-->
<!--[if (IE 7)&(!IEMobile)]><html class="lt-ie9 lt-ie8" <?php print $html_attributes; ?>><![endif]-->
<!--[if IE 8]><html class="lt-ie9" <?php print $html_attributes; ?>><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)]><!--><html <?php print $html_attributes . $rdf_namespaces; ?>><!--<![endif]-->

<head>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>

  <?php if ($default_mobile_metatags): ?>
    <meta name="MobileOptimized" content="width">
    <meta name="HandheldFriendly" content="true">
    <meta name="viewport" content="width=device-width">
  <?php endif; ?>
  <meta http-equiv="cleartype" content="on">

  <?php print $styles; ?>
  <?php print $scripts; ?>
  <?php if ($add_html5_shim and !$add_respond_js): ?>
    <!--[if lt IE 9]>
    <script src="<?php print $base_path . $path_to_zen; ?>/js/html5.js"></script>
    <![endif]-->
  <?php elseif ($add_html5_shim and $add_respond_js): ?>
    <!--[if lt IE 9]>
    <script src="<?php print $base_path . $path_to_zen; ?>/js/html5-respond.js"></script>
    <![endif]-->
  <?php elseif ($add_respond_js): ?>
    <!--[if lt IE 9]>
    <script src="<?php print $base_path . $path_to_zen; ?>/js/respond.js"></script>
    <![endif]-->
  <?php endif; ?>
    <link rel="icon" sizes="16x16 32x32 64x64" href="/img/favicon.ico">
    <link rel="icon" type="image/png" sizes="196x196" href="/img/favicon-196.png">
    <link rel="icon" type="image/png" sizes="160x160" href="/img/favicon-160.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/img/favicon-96.png">
    <link rel="icon" type="image/png" sizes="64x64" href="/img/favicon-64.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon-16.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/img/favicon-152.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/img/favicon-144.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/img/favicon-120.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/img/favicon-114.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/img/favicon-76.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/img/favicon-72.png">
    <link rel="apple-touch-icon" href="/img/favicon-57.png">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta name="msapplication-TileImage" content="/img/favicon-144.png">
    <meta name="msapplication-config" content="/img/browserconfig.xml">

</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <?php if ($skip_link_text && $skip_link_anchor): ?>
    <p id="skip-link">
      <a href="#<?php print $skip_link_anchor; ?>" class="element-invisible element-focusable"><?php print $skip_link_text; ?></a>
    </p>
  <?php endif; ?>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
</body>
</html>
