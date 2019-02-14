<html>
<head>
  <title>test</title>
</head>
<body>
<?php
echo "<h2>Hello test<h2><br>";
// $file=;
echo '<p>blas</p>';

foreach (array_filter(glob('/home/adria/Documentos/burgeon_app/wp-lowcode-ps/inc/styles/*.css'),'is_file') as $file) {
  // Do something with $file
  echo '<p>bla'.$file.' as as.</p>';
  echo '<p>st: '.str_replace('.css','',basename($file)).'</p>';
  // wp_enqueue_style('locopas-'.str_replace('.css', '', $file).'-style',
  // 								 get_template_directory_uri().'/inc/styles/'.$file,
  // 								 array('locopas-style-css'),
  // 								 $locopas_theme_version
  // 							 );
}
?>
</body>
</html>
