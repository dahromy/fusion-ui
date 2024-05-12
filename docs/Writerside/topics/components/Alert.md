# Alert

Displays a callouts for user attention.

## Installation

To install the Alert component, use the following command:

```bash
php bin/console fusion-ui:add alert
```

This will add the Alert component to your project.

## Usage

To use the Alert component in your project, include the following code in your TWIG file:

```Twig
<twig:ui:alert:root>
    <twig:ux:icon name="radix-icons:rocket" class="w-4 h-4"/>
    <twig:ui:alert:title>Heads up!</twig:ui:alert:title>
    <twig:ui:alert:description>
        You can add components to your app using the cli.
    </twig:ui:alert:description>
</twig:ui:alert:root>
```
