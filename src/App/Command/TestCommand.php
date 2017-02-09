<?php
namespace Ckrom\App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

use Ckrom\App\Lib\Maclass;

class TestCommand extends Command 
{
    protected function configure() {
         $this
            ->setName('app:user')
            ->setDescription('Cette commande pour afficher un utilisateur')
             ->addArgument(
                'nom',
                InputArgument::REQUIRED,
                'Quel est votre nom?'
                )
             ->addArgument(
                'prenom',
                InputArgument::OPTIONAL,
                'Quel est le prénom?'
                )

            ->addOption(
               'yell',
               null,
               InputOption::VALUE_NONE,
               'If set, the task will yell in uppercase letters'
                )

        
;
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        //Le texte en vert
        /*
        $output->writeln('<info>Le texte est en vert </info>');
        $output->writeln('<comment>Le texte est en jaune </comment>');
        $output->writeln('<question>Le texte est en bleu </question>');
        $output->writeln('<error>Le texte est en rouge </error>');
        $name = $input->GetArgument('nom');
        $output->writeln("<info>$name</info>");
        */

        $monNom = new  MaClass();
        $r = $monNom->getNom();
        $nom = $input->getArgument('nom');
        $prenom = $input->getArgument('prenom');
        if ($prenom) {
            $text = 'Hello '.$prenom . chr(32) . $nom;
        } else {
            $text = 'Hello ' . $nom;
        }

        if ($input->getOption('yell')) {
            $text = strtoupper($text);
        }

        $output->writeln($r);
    

    }
}
