<?php
namespace App\Services;

class MailService
{
  private $mailer;
  private $templating;

  public function __construct(\Swift_Mailer $mailer, \Twig_Environment $templating)
  {
      $this->mailer     = $mailer;
      $this->templating = $templating;
  }

  public function sendMail($organisation, $mail, $message)
  {
    $https['ssl']['verify_peer'] = FALSE;
    $https['ssl']['verify_peer_name'] = FALSE;    
    $organisation = $this->emptyIfIsNotSet($organisation);
    $mail = $this->emptyIfIsNotSet($mail);
    $message = $this->emptyIfIsNotSet($message);
    $mailToSend = (new \Swift_Message('[ADOPTE-UNE-RUCHE-NORMANDE] Demande d'.'informations par '.$organisation))
        ->setFrom('adoptemaruche@gmail.com')
        ->setTo('dixit.tr@gmail.com')
        ->setBody($this->templating->render('emails/mailContact.html.twig',['organisation' => $organisation, 'mail' => $mail, 'message' => $message]));
    return $this->mailer->send($mailToSend);
  }

  private function emptyIfIsNotSet($var){
    if(isset($var)){
      return $var;
    }else{
      return "";
    }
  }
}
?>
