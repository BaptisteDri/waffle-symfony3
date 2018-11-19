<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\discography;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
      // On va chercher la base
      $db = $this->getDoctrine()->getManager();

      $albums = $db->getRepository('AppBundle:discography')->findBy(['discoTypeId' => '1'], ['id' => 'desc']);
      for ($i=0; $i < count($albums); $i++) {
        $id = $albums[$i]->getId();
        $links = $db->getRepository('AppBundle:discography_has_rs')->findBy(['discographyId' => $id]);
        $albums[$i]->setLinks($links);
      }

      $singles = $db->getRepository('AppBundle:discography')->findBy(['discoTypeId' => '2'], ['id' => 'desc']);
      for ($i=0; $i < count($singles); $i++) {
        $id = $singles[$i]->getId();
        $links = $db->getRepository('AppBundle:discography_has_rs')->findBy(['discographyId' => $id]);
        $singles[$i]->setLinks($links);
      }

      $remixs = $db->getRepository('AppBundle:discography')->findBy(['discoTypeId' => '3'], ['id' => 'desc']);
      for ($i=0; $i < count($remixs); $i++) {
        $id = $remixs[$i]->getId();
        $links = $db->getRepository('AppBundle:discography_has_rs')->findBy(['discographyId' => $id]);
        $remixs[$i]->setLinks($links);
      }



      return $this->render('default/index.html.twig', [
         "albums" => $albums,
         "singles" => $singles,
         "remixs" => $remixs
      ]);
    }

    /**
     * @Route("/demo_mail", name="demo_mail")
     */
    public function demoMail(Request $request){

    }

    /**
     * @Route("/mail", name="mail")
     */
    public function storeMail(Request $request){

      if($request->request->get("mailType") === "store"){
        $firstName = $request->request->get("firstName");
        $lastName = $request->request->get("lastName");
        $address = $request->request->get("address");
        $codePostal = $request->request->get("postal");
        $city = $request->request->get("city");
        $mail = $request->request->get("email");
        $tel = $request->request->get("phoneNumber");

        $name = $firstName.' '.$lastName;

        $headers = "De $name, via $mail \r\n\r\n";

        $to = "contact@waffle-music.com";
        $objet = "CAPS WAFFLE";

        $text = "M/Mme $name.\r\n\r\n Ville : $city | Adresse : $address | Code Postal : $codePostal\r\n\r\n Email : $mail | Tel : $tel";
        $message = "COMMANDE : \r\n\r\n$text";

        // mail waffle
        mail($to, $objet, $message, $headers);

        // mail au client
        mail($mail, 'Waffle Music | Caps', "Bonjour M/Mme $name,\r\n\r\nVotre commande a bien été prise en compte. Nous vous contacterons bientôt.\r\n\r\n\r\n\r\nWaffle Records");
      } else{
        $firstname = $request->request->get("firstName");
        $lastname = $request->request->get("lastName");
        $mail = $request->request->get("email");
        $sdlink = $request->request->get("sdLink");
        $text = $request->request->get("message");

        $name = $firstname." ".$lastname;

        $headers = "De $name, via $mail \r\n\r\n";

        $to = "contact@waffle-music.com";
        $objet = "CONTACT/DEMO WAFFLE";

        $message = "CONTACT/DEMO \r\n\r\nMessage : $text\r\n\r\nLien soundcloud (facultatif) : $sdlink\r\n\r\nDe $name. (Adresse mail : $mail";

        mail($to, $objet, $message, $headers);
      }
    }

}
