<?php

use Babisque\MusicList\Music;

require_once 'autoload.php';

$musics = new Music('https://spotifycharts.com/regional/br/daily/latest');
echo $musics;
