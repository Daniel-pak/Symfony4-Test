<?

#this service is for getting data from Alpha Vantage API

namespace App\Researcher;

use Symfony\Component\HttpFoundation\Request;

#https://www.alphavantage.co/query?function=TIME_SERIES_WEEKLY&symbol=MSFT&apikey=demo

class DataResearcher {
    private $api_key = "&apikey=6ULC31864Y6TKC9M";
    private $base_url = "https://www.alphavantage.co/query?function=";
    public $analytics_function;
    public $stock_symbol;

    public function __construct($stock_symbol, $analytics_function) {
      $this->stock_symbol = $stock_symbol;
      $this->analytics_function = $analytics_function;
    }

    public function generateQuery() {
        #create url query
        $complete_query = $this->base_url . $this->analytics_function . "&symbol=" . $this->stock_symbol . $this->api_key;
        return $complete_query;
    }

    public function getRequest($url) {
        #use curl to get data and spit it back out - should dump to see visible data
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        $decoded_result = json_decode($result);
        // dump($decoded_result);
        return $decoded_result;
    }
}
