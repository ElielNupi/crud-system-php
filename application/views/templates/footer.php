<!-- VUE JS + jQuery -->

<?php

	$type = 'text/javascript';
	$random = '?'. strval(rand(10000000, 90000000));

	if (isset($params['js_files']) && is_array(['js_files'])) {
		foreach ($params['js_files'] as $js) {
			echo '<script src="' . $js . $random . '"type="'. $type . '"></script>' . "\n";
		}
	}
?>
</body>

</html>
