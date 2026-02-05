# OS2forms fordelingskomponent (temporary)

``` shell
git clone https://github.com/rimi-itk/temp_os2forms_fordelingskomponent web/sites/default/modules/temp_os2forms_fordelingskomponent
drush pm:install temp_os2forms_fordelingskomponent
```

``` php
# web/sites/default/settings.local.php
$settings['config_exclude_modules'][] = 'temp_os2forms_fordelingskomponent';

// Optional
// If site is using basic auth.
// $settings['temp_os2forms_fordelingskomponent']['basic_auth'] = ['username', 'password'];

// Make SFTP public key available for download.
// $settings['temp_os2forms_fordelingskomponent']['sftp'] = [
//   'username' => 'dev-selvbetjening-sf2900-sftp',
//   'public_key_path' => '/app/cert/dev-selvbetjening-sf2900-sftp.pub',
// ];
```
