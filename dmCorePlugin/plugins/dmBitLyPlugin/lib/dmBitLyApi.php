<?php

class dmBitLyApi
{
  protected
  $login,
  $apiKey,
  $browser,
  $table;

  public function __construct($login, $apiKey, dmWebBrowser $browser)
  {
    if(!$login || !$apiKey)
    {
      throw new dmException('You must provide a login and an api key in services.yml');
    }
    $this->login    = $login;
    $this->apiKey   = $apiKey;
    
    $this->browser  = $browser;

    $this->table    = dmDb::table('DmBitLyUrl');
  }

  public function shorten($longUrl)
  {
    $short = $this->table->findShortByExpanded($longUrl);
    
    if(is_string($short))
    {
      return $short;
    }

    $url = sprintf('https://api-ssl.bitly.com/v3/shorten?longUrl=%s&access_token=%s',
      urlencode($longUrl),
      //$this->login,
      $this->apiKey
    );
    
    if($this->browser->get($url)->responseIsError())
    {
      throw new dmException(sprintf('The given URL (%s) returns an error (%s: %s)', $url, $browser->getResponseCode(), $browser->getResponseMessage()));
    }

    $response = json_decode($this->browser->getResponseText(), true);

    if($response['status_code'] != '200')
    {
      throw new dmException('Error when shortening URL: '.$response['status_txt']);
    }

    $short = $response['data']['url'];

    $this->table->create(array(
      'short' => $short,
      'expanded' => $longUrl
    ))->save();

    return $short;
  }
}