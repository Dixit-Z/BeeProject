<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Services\MailService;
use Psr\Log\LoggerInterface;

class MailController extends Controller
{

  /**
   * @Route("/sendMail", name="sendMail")
   */
    public function sendMail(LoggerInterface $logger, Request $request, MailService $mail_service)
    {
        $organisation = $request->request->get('organisation');
        $mail = $request->request->get('mailContact');
        $description = $request->request->get('description');

        $logger->info('Demande de contact enregistrée pour l'.'organisation'.$organisation.'. A recontacter à par'.$mail);
        $result = $mail_service->sendMail($organisation,$mail,$description);
        $logger->err($result);
        return $this->redirectToRoute('mainPage');
        return new Response();
    }
}
?>
