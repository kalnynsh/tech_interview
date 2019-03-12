<?php

class Daemon
{
    protected $stop = false;
    protected $sleep;
    protected $pidFile;

    public function __construct($pidFile = '/tmp/php/daemon.pid', $sleep = 1)
    {
        if ($this->isDaemonActive($pidFile)) {
            echo 'Daemon is already exists!' . PHP_EOL;
            exit(0);
        }

        $this->sleep = $sleep;
        $this->pidFile = $pidFile;

        pcntl_signal(SIGTERM, [$this, 'signalHandler']);
        pcntl_signal(SIGUP, [$this, 'signalHandler']);
        pcntl_signal(SIGUSR1, [$this, 'signalHandler']);

        file_put_contents($pidFile, getmypid());
    }

    public function __destruct()
    {
        $this->deletePid();
    }

    public function run($payload)
    {
        while (!$this->stop) {
            do {
                pcntl_signal_dispatch();

                $result = $payload();

                if (!empty($result)) {
                    break;
                }
            } while (true);
        }

        sleep($this->sleep);
    }

    public function signalHandler($signo)
    {
        switch ($signo) {
            case SIGTERM:
                // handle shutdown tasks
                $this->stop = true;
                break;
            case SIGUP:
                // handle restart tasks
                break;
            case SIGUSR1:
                // Users signals, like get status
                break;
            default:
                // handle all other signals
        }
    }

    protected function deletePid()
    {
        $pid = $this->pidFile;
        if (file_exists($pid)) {
            if (file_get_contents($pid) == getmypid()) {
                unlink($pid);
            }
        }

        if (!file_exists($pid)) {
            echo 'Can not unlink ' . $pid . PHP_EOL;
        }
    }

    public function isDaemonActive($pidFile)
    {
        if (is_file($pidFile)) {
            $pid = file_get_contents($pidFile);

            // Check running process
            if (posix_kill($pid, 0)) {
                // Daemon is running
                return true;
            }

            if (!posix_kill($pid, 0)) {
                // Error, there is PID but not process
                if (!unlink($pidFile)) {
                    // Not possable unlink PID
                    exit(-1);
                }
            }
        }

        return false;
    }
}
