<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use App\Mailer\Emailer;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request, \Swift_Mailer $mailer, Emailer $emailer) #instantiated but never used for testing
    {
        $form = $this->createForm(ContactType::class); #::class represents the fully qualified class name (FQCN)

        $this->addFlash('warning', 'We will work to get back to you as soon as possible!');

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contactFormData = $form->getData();

            $this->addFlash('success', 'Thanks for submitting!');

            // dump($contactFormData);
            // $contactFormData['name'];
            // $contactFormData['email'];
            // $contactFormData['datOfBirth'];
            // $contactFormData['message'];

            $message = $emailer->create($contactFormData['email'], $contactFormData['message']);
            // dump($message);
            $response = $emailer->send($message);
            // dump($response);

            if ($response = "OK") {
                return $this->redirectToRoute('contact');
            }
        }
        // $name = $request->query->get('name', 'Daniel Pak audience');

        return $this->render('contact/contact.html.twig',
          [
            'contact_form' => $form->createView(),
            // 'some_random_variable' => $name,
          ]
        );
    }
}
