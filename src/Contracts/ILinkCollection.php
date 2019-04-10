<?php

namespace SitemapCrawler\Contracts;

interface ILinkCollection
{
    public function add($url);
    public function exists($url);
    public function isCrawled($key);
}
