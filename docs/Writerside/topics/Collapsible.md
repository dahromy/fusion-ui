# Collapsible

An interactive component which expands/collapses a panel.

## Installation

To install the Collapsible component, use the following command:

```bash
php bin/console fusion-ui:add collapsible
```

This will add the Collapsible component to your project.

## Usage

To use the Collapsible component in your project, include the following code in your TWIG file:

```Twig
 <twig:ui:collapsible:root class="w-[350px] space-y-2">
    <div class="flex items-center justify-between space-x-4 px-4">
        <h4 class="text-sm font-semibold">
            @peduarte starred 3 repositories
        </h4>
        <twig:ui:collapsible:trigger variant="ghost" size="sm">
            <twig:ux:icon name="radix-icons:caret-sort" class="w-4 h-4"/>
            <span class="sr-only">Toggle</span>
        </twig:ui:collapsible:trigger>
    </div>
    <div class="rounded-md border px-4 py-2 font-mono text-sm shadow-sm">
        @radix-ui/primitives
    </div>
    <twig:ui:collapsible:content class="space-y-2">
        <div class="rounded-md border px-4 py-2 font-mono text-sm shadow-sm">
            @radix-ui/colors
        </div>
        <div class="rounded-md border px-4 py-2 font-mono text-sm shadow-sm">
            @stitches/react
        </div>
    </twig:ui:collapsible:content>
</twig:ui:collapsible:root>
```