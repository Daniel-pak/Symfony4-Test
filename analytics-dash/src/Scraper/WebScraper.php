<?

namespace App\Scraper;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\IOExceptionInterface;
use Symfony\Component\Console\Exception\ExceptionInterface;
use Symfony\Component\DomCrawler\Crawler;

class WebScraper {

    public $url;
    // private $method;
    // public $fileSystem;
    public $website_html;

    public function __construct($url) {
        $this->url = $url;
        // $this->fileSystem = new Filesystem();
        // dump($this->fileSystem);
        #Creating temp directory and file with the FileSystem Component
        // try {
        //     $this->fileSystem->mkdir('/tmp/files');
        // } catch (ExceptionInterface $exception) {
        //     echo "An error occurred while creating your directory at ".$exception->getPath();
        // }
        //
        // try {
        //     $this->fileSystem->touch('/tmp/files/copy.php');
        // } catch (ExceptionInterface $exception) {
        //     echo "An error occurred while creating your file at".$exception->getPath();
        // }
    }


    public function setUrl($url) {
        $this->url = $url;
    }

    public function setWebsiteHtml($html) {
        $this->website_html = $html;
    }

    public function getWebsiteHtml() {
        return $this->website_html;
    }

    public function scrapeWebsite($url) {
        $complete_url = "https://" . $url . ".com";
        $ch = curl_init($complete_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True); #remove this is you want to see FinViz.com data
        $whole_website = curl_exec($ch);
        #returning whole website
        $crawler = new Crawler($whole_website);

        // dump($crawler->filterXPath('body > p'));
        // foreach ($crawler as $domElement) {
        //     dump($domElement->nodeName);
        // }

        // dump($fileSystem);
        // try {
        //     $fileSystem->dumpFile(sys_get_temp_dir().'/tmp/files/copy.php', $whole_website);
        // } catch (ExceptionInterface $exception) {
        //     echo "An error occurred while trying to copy contents of the website to".$exception->getPath();
        // }



        return;
    }
}
