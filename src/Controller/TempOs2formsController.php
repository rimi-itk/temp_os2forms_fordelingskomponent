<?php

declare(strict_types=1);

namespace Drupal\temp_os2forms_fordelingskomponent\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Site\Settings;
use Drupal\Core\Url;
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

    $context = (array) Settings::get('temp_os2forms_fordelingskomponent');

    $path = Settings::get('temp_os2forms_fordelingskomponent')['sftp']['public_key_path'] ?? NULL;
    if (!empty($path)) {
      $context['sftp']['public_key_url'] = Url::fromRoute(
        'temp_os2forms_fordelingskomponent.temp_os2forms_fordelingskomponent_certificate',
        ['_format' => 'sftp_public_key']
      )->toString(TRUE)->getGeneratedUrl();
      $context['sftp']['public_key_name'] = basename($path);
    }
    $content = $template->render($context);

    return new Response($content, headers: ['content-type' => 'text/html']);
  }

}
