# OS2forms fordelingskomponent (temporary)

``` shell
git clone https://github.com/rimi-itk/temp_os2forms_fordelingskomponent web/sites/default/modules/temp_os2forms_fordelingskomponent
drush pm:install temp_os2forms_fordelingskomponent
```

``` php
# web/sites/default/settings.local.php
$settings['config_exclude_modules'][] = 'temp_os2forms_fordelingskomponent';
```
