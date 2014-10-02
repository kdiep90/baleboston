<?php
	$csv = readCSV('menu.csv');
	
	while ($csv) {
		
		$line = array_shift($csv);
		if (strtolower($line[0]) == 'endfile') {
			break;
		}				
		else if (strtolower($line[0]) == 'section') {
			$name          = $line[1];
			$sub_heading   = $line[2];
			$headers       = $line[3];
			$imgname	   = $line[4];
			
			
			// Add Section name and subheading (if available)
			echo "\t\t<h3>$name</h3>\n";
			if ($sub_heading) {
				echo "\t\t<h4>$sub_heading</h4>\n";
			}
			if($imgname){
					echo '<img src="assets/img/FINAL/' . $imgname . '" class="menubanhmi" alt="' . $imgname . '">' . "\n";
			}
			
			// Begin Table
			echo "\t\t<table class='menutable'>\n";
			echo "\t\t\t<thead>\n";
			echo "\t\t\t\t<tr>\n";
			
			// Add Headers
			if ($headers) {
				foreach (explode("|", $headers) as $header) {
					echo "\t\t\t\t\t<th>$header</th>\n";
				}
			}
			else {
				echo "\t\t\t\t\t<th>Item</th>\n";
				echo "\t\t\t\t\t<th>Description</th>\n";
				echo "\t\t\t\t\t<th>Price</th>\n";
			}
			
			// Close headers, begin body
			echo "\t\t\t\t</tr>\n";
			echo "\t\t\t</thead>\n";
			echo "\t\t\t<tbody>\n";
		}
		else if (strtolower($line[0]) == 'end') {
			// Close off table
			echo "\t\t\t</tbody>\n";
			echo "\t\t</table>\n\n\n";
		}
		else {
			echo "\t\t\t\t<tr>";
			foreach ($line as $cell) {
				echo "\t\t\t\t\t<td>$cell</td>";
			}
			echo "\t\t\t\t<tr>";
		}
	}
?>
