<?

namespace App\Mailer;

use Psr\Log\LoggerInterface;

class Emailer {

    /**
     * @var string
     */

    private $myParameter;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var \Swift_Mailer
     */
    public $mailer;
    public $message;

    public function __construct(string $myParameter, LoggerInterface $logger, \Swift_Mailer $mailer) {
        $this->$myParameter = $myParameter;
        $this->logger = $logger; #default logger interface - Monologue
        $this->mailer=$mailer;

        // $logger->alert('woah!');
        // $logger->debug($myParameter);

        // dump($logger);
    }

    public function create(string $string1, string $string2) #return a new swift message instance
    {
      $message = (new \Swift_Message('You got mail'))
        ->setFrom($string1)
        ->setTo('ncdanielpak@gmail.com')
        ->setBody($string2, 'text/plain');
      $this->$message = $message;
      return $message;
    }

    public function send(\Swift_Message $message) {
        $this->mailer->send($message);
        return "OK";
    }
}
