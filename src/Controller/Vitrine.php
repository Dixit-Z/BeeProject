<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Psr\Log\LoggerInterface;

class Vitrine extends Controller
{
    /**
    * @Route("/", name="mainPage")
    */
    public function mainPage(LoggerInterface $logger)
    {
        $number = mt_rand(0, 100);

        // $logger->err('I generated a number '.$number);
        // $logger->err('I generated a numbere ');
        // $logger->info('I generated a number ');
        // $logger->debug('I generated a numberd ');
        // return new Response(
        //     '<html><body>Lucky number: '.$number.'</body></html>');
        return $this->render('vitrine/accueil.html.twig', ['luckyNumber' => $number]);
    }

    /**
    * @Route("/concept", name="concept")
    */
    public function concept(LoggerInterface $logger)
    {
        return $this->render('vitrine/accueil.html.twig', ['luckyNumber' => 98]);
    }

    /**
    * @Route("/adopteuneruche", name="adopt")
    */
    public function adopt(LoggerInterface $logger)
    {
        return $this->render('vitrine/votre_ruche.html.twig', ['luckyNumber' => 98]);
    }

    /**
    * @Route("/quisommesnous", name="who")
    */
    public function who(LoggerInterface $logger)
    {
        return $this->render('vitrine/about.html.twig', ['luckyNumber' => 98]);
    }

}
?>
