# Popover

Displays rich content in a portal, triggered by a button.

## Installation

To install the Popover component, use the following command:

```bash
php bin/console fusion-ui:add popover
```

This will add the Popover component to your project.

## Usage

To use the Popover component in your project, include the following code in your TWIG file:

```Twig
<twig:ui:popover:root>
    <twig:ui:popover:trigger>
        <twig:ui:button:root variant="outline">Open popover</twig:ui:button:root>
    </twig:ui:popover:trigger>
    <twig:ui:popover:content class="w-80">
        <div class="grid gap-4">
            <div class="space-y-2">
                <h4 class="font-medium leading-none">Dimensions</h4>
                <p class="text-sm text-muted-foreground">
                    Set the dimensions for layer.
                </p>
            </div>
            <div class="grid gap-2">
                <div class="grid grid-cols-3 items-center gap-4">
                    <twig:ui:label:root for="width">Width</twig:ui:label:root>
                    <twig:ui:input:default id="width" value="100%"class="col-span-2 h-8"/>
                </div>
                <div class="grid grid-cols-3 items-center gap-4">
                    <twig:ui:label:root for="maxWidth">Max. width</twig:ui:label:root>
                    <twig:ui:input:default id="maxWidth" value="300px" class="col-span-2 h-8"/>
                </div>
                <div class="grid grid-cols-3 items-center gap-4">
                    <twig:ui:label:root for="height">Height</twig:ui:label:root>
                    <twig:ui:input:default id="height" value="25px" class="col-span-2 h-8"/>
                </div>
                <div class="grid grid-cols-3 items-center gap-4">
                    <twig:ui:label:root for="maxHeight">Max. height</twig:ui:label:root>
                    <twig:ui:input:default id="maxHeight" value="none" class="col-span-2 h-8"/>
                </div>
            </div>
        </div>
    </twig:ui:popover:content>
</twig:ui:popover:root>
```