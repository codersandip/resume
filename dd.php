<?php 

exec("composer install", $output1);
exec("php pdf.php", $output1);
echo "Enter your commit message: ";
exec('git add . && git commit -m "'. trim(fgets(STDIN)) .'" && git pull origin main && git push origin main', $output1);