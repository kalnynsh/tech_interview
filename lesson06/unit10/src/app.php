#!/usr/bin/env php
<?php

if (!function_exists('pcntl_fork')) {
    echo 'PCNTL functions not available on this PHP installation' . PHP_EOL;
    exit(1);
}

// Close Standart IN | OUT | ERR
if (is_resource(STDIN)) {
    fclose(STDIN);
    $stdIn = fopen('/dev/null', 'r');
}

if (is_resource(STDOUT)) {
    fclose(STDOUT);
    $stdOut = fopen('/dev/null', 'ab');
}

if (is_resource(STDERR)) {
    fclose(STDERR);
    $stdErr = fopen('/dev/null', 'ab');
}

// Make child process
$childPid = pcntl_fork();

if ($childPid == -1) {
    echo 'Unabale create child process' . PHP_EOL;
    exit(1);
}

if ($childPid) {
    pcntl_wait($childPid, $status);

    // Exit from Parent process
    exit(0);
}

// Make child main process
posix_setsid();

// Include Payload
include __DIR__ . '/Daemon.php';
include __DIR__ . '/ExampleCls.php';

$payload = new ExampleCls();

$functionRun = function () use ($payload) {
    $payload->test();

    return true;
};

// Create Daemon
$daemon = new Daemon('/tmp/php/daemon.pid');

$daemon->run($functionRun);
