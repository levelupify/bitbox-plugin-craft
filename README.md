# Bitbox plugin - Craft CMS ![](https://img.shields.io/badge/status-beta-orange.svg)

This plugin allows [Bitbox](https://bitbox.xyz) users to pick files from their Bitbox account to use in [Craft](https://craftcms.com/).


## Getting started

1. Download the plugin from github, and place it in your `craft/plugins` folder
2. Rename the folder to `bitbox`
3. Go to your `Craft control panel` -> `settings` -> `plugins` and install the Bitbox plugin.
4. Now you can create a custom field with type `Bitbox picker`, and include it in a section.

For more information about how to use Craft, see the [Craft docs](https://craftcms.com/docs/introduction).


## Output data in template:

You can easily access your data in your template by referencing to your chosen handle. See example:

```twig
<pre>
  {{ dump(entry.productThumbnail) }}
</pre>

``` 

Will output:

```php
array (size=10)
  '_id' => string '57fa30e596db34_39771891' (length=23)
  'id' => string 'f8163f9e-d548-4359-b734-dbbb0c196725' (length=36)
  'url' => string 'https://eu.bitboxfiles.com/f/p/o/boligvelger-thumbnail___1473089573298.jpg' (length=74)
  'thumbUrl' => string 'https://eu.bitboxfiles.com/f/p/t/boligvelger-thumbnail___1473089573298.jpg' (length=74)
  'width' => int 1800
  'height' => int 1352
  'type' => string 'image/jpeg' (length=10)
  'filename' => string 'boligvelger-thumbnail.jpg' (length=25)
  'title' => null
  'createdAt' => string '2016-09-05T15:32:58.132Z' (length=24)


``` 



## Future support

As mentioned previously, this plugin is in Beta. More functionality will get added as users start to use the plugin and [Bitbox](https://bitbox.xyz).

We welcome anyone to send us requests - [support@bitbox.xyz](mailto:support@bitbox.xyz)

## License

[Attribution-NonCommercial-ShareAlike 4.0 International](https://creativecommons.org/licenses/by-nc-sa/4.0/legalcode)