# Contao 4 Key Generator Wizard

This extension is for Contao 4 and enhances the BE TextField Widget with a keyGenerator Wizard
See example:

```php

$GLOBALS['TL_DCA']['tl_member']['fields']['apikey'] = array
(
  'label'         => &$GLOBALS['TL_LANG']['tl_member']['apikey'],
	'exclude'       => true,
	'search'        => false,
	'inputType'     => 'text',
	'wizard'		=> [['\Pdir\KeyGeneratorBundle\KeyGenerator','getWizard']],
	'save_callback'	=> [['\Pdir\KeyGeneratorBundle\KeyGenerator','setKeyIfEmpty']],
	'eval'          => ['maxlength'=>32, 'feEditable'=>false, 'feViewable'=>false, 'feGroup'=>'rpc', 'tl_class'=>'w50 wizard'],
	'sql'           => "varchar(32) NOT NULL default ''"
);

```

You can write your own generator. Use the HOOK

The callback method gets the fieldName and the maxlength. It returns a new key-string or false if the method don't want to set the key

```php

// config.php
$GLOBALS['TL_HOOKS']['generateKey'][] = array('\MyClass','generateKey');

// MyClass
public function generateKey($strFieldName, $intLength)
{
  if ($strFieldName == 'simplePasswordField')
  {
    return str_repeat('X',$intLength);
  }
  else if ($strFieldName == 'megaPasswordField')
  {
    return 'pasword123';
  }
  return false;
}
```

Original by [Sebastian Tilch 2012](https://github.com/mediabakery/contao-KeyGenerator) for Contao 3
