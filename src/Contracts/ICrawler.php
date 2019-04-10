<?php

namespace SitemapCrawler\Contracts;

interface ICrawler
{
    public function getDepth();
    public function process($url);
}
