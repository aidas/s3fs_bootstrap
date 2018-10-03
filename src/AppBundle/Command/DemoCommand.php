<?php

namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class DemoCommand extends Command
{
    private $guzzle;

    public function __construct(\GuzzleHttp\ClientInterface $guzzle)
    {
        parent::__construct();
        $this->guzzle = $guzzle;
    }

    protected function configure()
    {
        $this
          ->setName('fetch:stuff')
          ->setDescription('Demo command')
          ->setHelp('Usage: php bin/console fetch:stuff');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Stuff happens here');
        $output->writeln(get_class($this->guzzle));
    }
}
