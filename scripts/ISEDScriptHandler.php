<?php

namespace ISEDDrupalWxT\WxT;

use Composer\Script\Event;
use Symfony\Component\Filesystem\Filesystem;

class ISEDScriptHandler {

  /**
   * Retrieves the Drupal root directory.
   *
   * @param string $project_root
   *   Drupal root directory.
   */
  protected static function getDrupalRoot($project_root) {
    return $project_root . '/html';
  }

   /**
   * Deploys front-end related libraries to WxT's install profile directory.
   *
   * @param \Composer\Script\Event $event
   *   The script event.
   */
  public static function editHtaccess(Event $event) {
    $fs = new Filesystem();
    $root = static::getDrupalRoot(getcwd());

    $cors = <<<'EOD'
<IfModule mod_headers.c>
  # "Origin" varies due to font CORS below
  Header merge Vary "Origin"

  # HSTS
  Header always set Strict-Transport-Security "max-age=63072000;"

  # Mostly for observatory.mozilla.org
  Header always set X-XSS-Protection "1; mode=block"

  # CSP
  Header always set Content-Security-Policy "default-src 'none'; font-src 'self' https://fonts.gstatic.com; img-src 'self'; script-src 'self'; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; connect-src 'self'; object-src 'self'; frame-src https://sso-dev.ised-isde.canada.ca 'self'; frame-ancestors 'self'; base-uri 'self'; form-action 'self'"
</IfModule>

<FilesMatch "\.(ttf|otf|eot|woff|woff2)$">
  <IfModule mod_headers.c>
    ## Set CORS for ised.canada.ca, api.canada.ca and all of their subdomains
    ## Based on: https://stackoverflow.com/a/27990162
    #
    SetEnvIf Origin ^(https?://(.+\.)?(ised-isde|api)\.canada\.ca(?::\d{1,5})?)$   CORS_ALLOW_ORIGIN=$1
    Header append Access-Control-Allow-Origin  %{CORS_ALLOW_ORIGIN}e   env=CORS_ALLOW_ORIGIN
  </IfModule>
</FilesMatch>
EOD;

    // 'Undefined method'
    // $fs->appendToFile($root . '/.htaccess', $cors);

    file_put_contents($root . '/.htaccess', $cors, FILE_APPEND);
  }
}
