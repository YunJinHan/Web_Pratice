<!DOCTYPE html>
<html>

	<head>
		<title>Music Library</title>
		<meta charset="utf-8" />
		<link href="http://selab.hanyang.ac.kr/courses/cse326/2016/labs/images/5/music.jpg" type="image/jpeg" rel="shortcut icon" />
		<link href="http://selab.hanyang.ac.kr/courses/cse326/2016/labs/labResources/music.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<h1>My Music Page</h1>

		<!-- Ex 1: Number of Songs (Variables) -->
		<p>
			I love music.
			I have <?php $song_count = 5678; print $song_count?> total songs,
			which is over <?php $hour = 567; print $hour?> hours of music!
		</p>
		<div class="section">
			<h2>Yahoo! Top Music News</h2>
			<!-- Ex 2: Top Music News (Loops)
			<ol>
				<?php for($new_page=1;$new_page<=5;$new_page++){
					print "<li><a href='http://music.yahoo.com/news/archive/?page=".$new_page."'>Page ".$new_page."</a></li>";
				}
				?>
			</ol>
			-->
			<!-- Ex 3: Query Variable -->
			<ol>
				<?php
				$newspages = (int)$_GET['newspages'] ? (int)$_GET["newspages"] : '5';
				for($i=1;$i<=$newspages;$i++){
					print "<li><a href='http://music.yahoo.com/news/archive/?page=".$i."'>Page ".$i."</a></li>";
				}
				?>
			</ol>
		</div>

		<!-- Ex 4: Favorite Artists (Arrays)
		<div class="section">
			<h2>My Favorite Artists</h2>
			<ol>
				<?php
				$favorite = array();
				$favorite = array("Guns N' Roses","Green Day","Blink182","Queen");
				for ($i=0;$i<count($favorite);$i++){
					print "<li>".$favorite[$i]."</li>";
				}
				?>
			</ol>
		</div>
		-->
		<!-- Ex 5: Favorite Artists from a File (Files) -->
		<div class="section">
			<h2>My Favorite Artists</h2>
			<ol>
				<?php
				$favorite = file("http://selab.hanyang.ac.kr/courses/cse326/2016/labs/_lab6_2016/favorite.txt");
				for ($i=0;$i<count($favorite);$i++){
					$search = explode(" ",$favorite[$i]);
					$name = implode("_",$search);
					print '<li><a href="http://en.wikipedia.org/wiki/'.$name.'">'.$favorite[$i].'</a></li>';
				}
				?>
			</ol>
		</div>
		<!-- Ex 6: Music (Multiple Files) -->
		<!-- Ex 7: MP3 Formatting -->
		<div class="section">
			<h2>My Music and Playlists</h2>
			<ul id="musiclist">
				<?php
					$mp3Item = glob("lab6/musicPHP/songs/*.mp3");
					array_multisort(array_map('filesize', $mp3Item), SORT_NUMERIC, SORT_DESC, $mp3Item);
					for ($i=0;$i<count($mp3Item);$i++){
						$fileSize = (int)(filesize($mp3Item[$i])/1024);
						print '<li class=\"mp3item\"><a href="'.$mp3Item[$i].'">'.basename($mp3Item[$i]).'</a> ('.$fileSize.' KB)</li>';
					}
				?>
				<!-- Exercise 8: Playlists (Files) -->
				<?php
					$m3uItem = glob("lab6/musicPHP/songs/*.m3u");
					rsort($m3uItem);
					foreach ($m3uItem as $m3u) {
						print "<li class=\"playlistitem\">".basename($m3u).":<ul>";
						$content = file("$m3u");
						shuffle($content);
						foreach($content as $line) {
							$pos = strpos($line,'#');
							if ($pos === false){
								print "<li>".$line."</li>\n";
							}
						}
						print "</ul></li>";
					}
				?>
			</ul>
		</div>

		<div>
			<a href="http://validator.w3.org/check/referer">
				<img src="http://selab.hanyang.ac.kr/courses/cse326/2013/labs/images/w3c-html.png" alt="Valid HTML5" />
			</a>
			<a href="http://jigsaw.w3.org/css-validator/check/referer">
				<img src="http://selab.hanyang.ac.kr/courses/cse326/2013/labs/images/w3c-css.png" alt="Valid CSS" />
			</a>
		</div>
	</body>
</html>
