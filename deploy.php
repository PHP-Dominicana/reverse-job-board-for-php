<?php
namespace Deployer;

require 'recipe/laravel.php';
require 'contrib/npm.php';
require 'recipe/deploy/shared.php';


// Config
set('repository', 'https://github.com/PHP-Dominicana/reverse-job-board-for-php.git');
set('keep_release', 5); // Keep 5 Releases
set('http_user', 'phpdominicana'); // Server Remote user
set('bin/php', '/usr/bin/php8.1'); // PHP to use for execute the code.
set('use_relative_symlink', false);
set('use_atomic_symlink', true);
set('shared_dirs', ['storage', 'vendor']);

// Hosts
host('jobs.phpdominicana.com')
    ->set('remote_user', 'phpdominicana')
    ->set('deploy_path', '/home/phpdominicana/web/jobs.phpdominicana.com');

// Tasks
task('git:reset:hard', function() {
    // git reset --hard origin/master
    run('cd /home/phpdominicana/web/jobs.phpdominicana.com/current');
    run('git reset --hard origin/master');
    write('Directory updated.');
})->desc('Reset the current working directory.');

task('build', function () {
    cd('{{release_path}}');
    run('npm run build');
});

task('phpdom:npm:install', function () {
    run('nvm use --lts');
    cd('{{release_path}}');
    run('npm install');
});

task('deploy:finish', [
    'deploy:vendors',
    'artisan:storage:link',
    'artisan:config:cache',
    'artisan:route:cache',
    'artisan:view:cache',
    'artisan:event:cache',
    'artisan:migrate',
    'deploy:publish',
])->desc('Finishing all pending task after copying files.');

desc('Cache the framework bootstrap files');
task('artisan:optimize', artisan('optimize'));

// Hooks
after('deploy:failed', 'deploy:unlock');
//after('deploy:update_code', 'npm:install');
//after('deploy:symlink', 'deploy:finish');
