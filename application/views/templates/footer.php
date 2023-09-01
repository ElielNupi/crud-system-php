<?php

	$type = 'text/javascript';
	$random = '?'. strval(rand(10000000, 90000000));

	if (isset($params['js_files']) && is_array(['js_files'])) {
		foreach ($params['js_files'] as $js) {
			echo '<script src="' . $js . $random . '"type="'. $type . '"></script>' . "\n";
		}
	}

	if (isset($params['js_extra']) && is_array(['js_extra'])) {
		foreach ($params['js_extra'] as $js) {
			echo '<script src="' . $js . $random . '"type="'. $type . '"></script>' . "\n";
		}
	}
?>

<!-- Init materialize JS -->
<script src="./assets/node_modules/materialize-css/dist/js/materialize.min.js"></script>
<!-- Jquery Mask plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

</body>
</html>
