<?php

declare(strict_types=1);

namespace Drupal\temp_os2forms_fordelingskomponent\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Url;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Returns responses for temp_os2forms_fordelingskomponent routes.
 */
final class TempOs2formsFordelingskomponentController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function __invoke(Request $request): Response|array {
    return new JsonResponse([
      'message' => "This is just a mock. Copy the 'callback url' and use it to define the callback endpoint",
      'callback url' => Url::fromRoute('<current>', options: ['absolute' => TRUE, 'path_processing' => FALSE])->toString(TRUE)->getGeneratedUrl(),
      'now' => (new \DateTimeImmutable())->format(\DateTimeInterface::ATOM),
    ]);
  }

}
