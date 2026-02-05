<?php

declare(strict_types=1);

namespace Drupal\temp_os2forms_fordelingskomponent\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Returns responses for temp_os2forms_fordelingskomponent routes.
 */
final class TempOs2formsController extends ControllerBase {

  public function __construct(
    #[Autowire(service: 'twig')]
    private readonly Environment $twig,
  ) {
  }

  /**
   * Builds the response.
   */
  public function __invoke(): Response {
    $template = file_get_contents(__DIR__ . '/../../templates/index.html.twig');
    $template = $this->twig->createTemplate($template);
    $content = $template->render();

    return new Response($content, headers: ['content-type' => 'text/html']);
  }

}
