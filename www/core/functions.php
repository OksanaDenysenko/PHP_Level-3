<?php
function show($stuff): void // for convenient data output
{
    echo "<pre>";
    var_dump($stuff);
    echo "</pre>";
}

/**
 * The function builds a URL from the base URI and query parameters
 * @param $uri
 * @param array $params
 * @return mixed|string
 */
function buildUrl($uri, array $params = []): mixed
{
    return !empty($params) ? $uri . '?' . http_build_query($params) : $uri;
}
