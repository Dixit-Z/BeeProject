<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Psr\Log\LoggerInterface;

class ConnexionController extends Controller
{
    /**
    * @Route("/admin", name="connexion")
    */
    public function mainPage(LoggerInterface $logger)
    {
        $number = mt_rand(0, 100);

        return $this->render('vitrine/accueil.html.twig', ['luckyNumber' => $number]);
    }

}
?>
