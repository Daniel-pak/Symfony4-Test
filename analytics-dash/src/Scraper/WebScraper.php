<?

namespace App\Scraper;

use Symfony\Component\HttpFoundation\Request;

class WebScraper {

    public $url;
    // private $method;

    public function __construct($url) {
        $this->url = $url;
    }


    public function setUrl($url) {
        $this->url = $url;
    }

    public function scrapeWebsite($url) {
        $complete_url = "https://" . $url . ".com";
        $ch = curl_init($complete_url);
        $whole_website = curl_exec($ch);
        return $whole_website;
    }
}
