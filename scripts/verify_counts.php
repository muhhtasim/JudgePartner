<?php
require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo 'users:' . App\Models\User::count() . PHP_EOL;
echo 'problems:' . App\Models\Problem::count() . PHP_EOL;
echo 'test_cases:' . App\Models\TestCase::count() . PHP_EOL;
echo 'contests:' . App\Models\Contest::count() . PHP_EOL;
echo 'submissions:' . App\Models\Submission::count() . PHP_EOL;
echo 'badges:' . App\Models\Badge::count() . PHP_EOL;
