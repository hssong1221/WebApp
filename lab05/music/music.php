<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Music Library</title>
		<meta charset="utf-8" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/5/music.jpg" type="image/jpeg" rel="shortcut icon" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/music.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<h1>My Music Page</h1>
		
		<!-- Ex 1: Number of Songs (Variables) -->
		<?php
		$song_count = 5678;
		?>
		<p>
			I love music.
			I have <?= $song_count ?> total songs,
			which is over <?= (int)($song_count / 10) ?> hours of music!
		</p>

		<!-- Ex 2: Top Music News (Loops) -->
		<!-- Ex 3: Query Variable -->
		<div class="section">
			<h2>Billboard News</h2>
			<ol>
			<?php
			
			if (isset($_GET["newspages"]))
			{
				$newspages =  $_GET["newspages"];
			}
			else
			{
				$newspages = 5;
			}
			for ($i = 11; $i > 11 - $newspages ; $i--) {
				$news_pages = $i;
				if($i < 10)
				{
					$news_pages = "0" . $news_pages; ?>
					<li><a href="https://www.billboard.com/archive/article/2019<?= $news_pages?>">2019-<?= $news_pages ?> </a></li>
				<?php }
				else
				{
					$news_pages = $i; ?>
					<li><a href="https://www.billboard.com/archive/article/2019<?= $news_pages?>">2019-<?= $news_pages ?> </a></li>
				<?php }
			} ?>
		</ol>
		</div>
		

		<!-- Ex 4: Favorite Artists (Arrays) -->
	
		<div class="section">
			<h2>My Favorite Artists</h2>
			<?php
			$favname = array("Guns N' Roses", "Green Day", "Blink182", "Queen");
			for ($i = 0; $i < count($favname) ; $i++) { 
				echo ($i+1) . "." . " " . $favname[$i] ."<br />\n";
			}
			?>
		</div>
		<!-- Ex 5: Favorite Artists from a File (Files) -->

		<div class="section">
			<h2>My Favorite Artists</h2>
		
			<ol>
			<?php
			$favlist = file("favorite.txt");
			for ($i=0; $i < count($favlist); $i++) 
			{ 
				$favname = $favlist[$i];
				$favname1 = explode(" ", $favname);
				$favname2 = implode("_", $favname1); ?>
				<a href="http://en.wikipedia.org./wiki/<?= $favname2?>"><li><?= $favlist[$i]?></li></a>
			<?php }
			?>
			</ol>
		</div>
		
		<!-- Ex 6: Music (Multiple Files) -->
		<div class="section">
			<h2>My Music and Playlists</h2>
			<ul id="musiclist">
				<?php
				$music = glob("lab5/musicPHP/songs/*.mp3");	
				for ($i=0; $i < count($music) ; $i++)
				{ ?>
					<li class="mp3item"> <?= $music[$i] ?> </li>
				<?php }
				?>
			</ul>
		</div>
		<!-- Ex 7: MP3 Formatting -->
		<div class="section">
			<h2>My Music and Playlists</h2>

			<ul id="musiclist">
				<?php
				$musicsize = array();
				$musicname = array();
				for ($j=0; $j < count($music) ; $j++)
				{ 
					$musicsize[] = filesize($music[$j]);
					$musicname[] = $music[$j];
				}
				sort($musicsize);
				$musicsize = array_reverse($musicsize);
				sort($musicname);
				$musicname = array_reverse($musicname);
				for ($i=0; $i < count($musicsize); $i++)
				{ 
					?>
					<li class="mp3item">
						<a href="lab5/musicPHP/songs/<?= basename($musicname[$i])?>"><?= basename($musicname[$i]) . " (" . (int) ($musicsize[$i]/1024) . " KB)"
						?></a>
					</li>
				<?php
				} ?>
				<!-- Exercise 8: Playlists (Files) -->
				<?php
				$musiclist = glob("lab5/musicPHP/songs/*.m3u");
				$musiclist2 = array_reverse($musiclist);
				for($i = 0; $i < count($musiclist2) ; $i++)  { ?>
					<li class="playlistitem"><?= basename($musiclist2[$i]) ?>:
						<ul>
							<?php
							$line = file($musiclist2[$i]);
							shuffle($line);
							for ($k = 0; $k < count($line); $k++) {
								$pos = strpos($line[$k], "#");
								if($pos === false)
								{  
									?> 
									<li><?= $line[$k] ?></li>
								<?php } 
							} ?>	
						</ul>
				<?php }
				?>
			</ul>
		</div>

		<div>
			<a href="https://validator.w3.org/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-html.png" alt="Valid HTML5" />
			</a>
			<a href="https://jigsaw.w3.org/css-validator/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-css.png" alt="Valid CSS" />
			</a>
		</div>
	</body>
</html>