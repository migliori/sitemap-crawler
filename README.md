# sitemap-crawler
Sitemap crawler/generator. For given URL it will return sitemap XML file with URLs and images.

Can be used as Standalone or with Ajax (build sitemap, submit to Search Engines & show results on a button click)

Original project: https://github.com/ivebe/sitemap-crawler

## Install
```sh
composer require migli/sitemap-crawler
```
## Features
- crawl given URL and generate sitemap
- crawl each found URL and add images to the sitemap
- save the sitemap on your server or download it
- configure the maximum deph
- use as standalone (or CRON task)
- call with ajax on button click
- onscreen live report with urls count and urls list
- search engines auto-submission (ping) with onscreen report

## Example

```php
<?php

require_once __DIR__ . '/vendor/autoload.php';

use SitemapCrawler\Crawler;
use SitemapCrawler\SitemapService;
use SitemapCrawler\LinkCollection;

$config = require "src/config.php";

$url = "http://www.google.com";
/**
 * $dest:
 *      false if you want to download the generated sitemap
 *      'filename.xml' to save file on server
 */
$dest = __DIR__ . '/sitemap.xml';

/**
 * sitemap url for search engines submission
 */
$sitemap_url = 'http://www.google.com/sitemap.xml';

$crawler    = new Crawler($config['crawler']);
$collection = new LinkCollection();
$provider   = new SitemapService($crawler, $collection, $url, $config['sitemap_service']);

$links = $provider->crawl($url);

$provider->export('daily', $dest);

if ($config['submit_to_search_engines'] === true) {
    $provider->SubmitSiteMap($sitemap_url);
}
```
## Example 2 (Ajax)
Refer to ajax-demo.php

