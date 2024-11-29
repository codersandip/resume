<?php exec("php index.php", $output);
file_put_contents('index.html', str_replace("    ", "", $output));
exec("php main.css", $output1);
file_put_contents('style.css', str_replace("    ", "", $output1));
exec("git add .", $output1);
exec('git commit -m "Changes"', $output1);
exec('git pull origin main', $output1);
exec('git push origin main', $output1);
