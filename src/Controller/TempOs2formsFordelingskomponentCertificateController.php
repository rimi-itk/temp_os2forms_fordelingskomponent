<?php

declare(strict_types=1);

namespace Drupal\temp_os2forms_fordelingskomponent\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Returns responses for temp_os2forms_fordelingskomponent routes.
 */
final class TempOs2formsFordelingskomponentCertificateController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function __invoke(Request $request, string $_format): Response {
    // https://stackoverflow.com/a/29779341
    $host = $request->getHost();
    $get = stream_context_create(['ssl' => ['capture_peer_cert' => TRUE]]);
    $read = stream_socket_client('ssl://' . $host . ':443', $errno, $errstr, 30, STREAM_CLIENT_CONNECT, $get);
    $cert = stream_context_get_params($read);

    if (in_array($_format, ['pem', 'txt'])) {
      $output = NULL;
      openssl_x509_export($cert['options']['ssl']['peer_certificate'], $output);

      return new Response($output, headers: [
        'content-type' => match ($_format) {
          'pem' => 'application/x-pem-file',
          default => 'text/plain',
        },
      ]);
    }

    $certinfo = openssl_x509_parse($cert['options']['ssl']['peer_certificate']);

    return new JsonResponse($certinfo);
  }

}
