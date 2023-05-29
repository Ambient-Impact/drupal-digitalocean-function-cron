<?php

declare(strict_types=1);

/**
 * Send a request to a configured Drupal cron URL.
 *
 * @return array
 *
 * @throws \UnexpectedValueException If the "CRON_URL" environment variable is
 *   not set or is an empty string.
 */
function main(array $args): array {

  /** @var string|false */
  $url = \getenv('CRON_URL');

  if (!\is_string($url) || \mb_strlen($url) === 0) {

    throw new \UnexpectedValueException(
      'You must set the "CRON_URL" environment variable!'
    );

  }

  /** @var \CurlHandle */
  $curlHandle = \curl_init();

  \curl_setopt($curlHandle, \CURLOPT_URL, $url);

  \curl_exec($curlHandle);

  \curl_close($curlHandle);

  return ['body' => 'cron request sent successfully.'];

}
