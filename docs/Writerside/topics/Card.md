# Card

Displays a card with header, content, and footer.

## Installation

To install the Card component, use the following command:

```bash
php bin/console fusion-ui:add card
```

This will add the Card component to your project.

## Usage

To use the Card component in your project, include the following code in your TWIG file:

```Twig
<twig:ui:card:root class="w-96">
    <twig:ui:card:header>
        <twig:ui:card:title>You might like "FusionUI"</twig:ui:card:title>
        <twig:ui:card:description>@dahromy</twig:ui:card:description>
    </twig:ui:card:header>
    <twig:ui:card:content>
        <twig:ui:aspect-ratio:root ratio="16/9" class="rounded-md overflow-hidden border">
            <img src="{{ asset('images/unsplash.jpg') }}"
                 alt="Photo by Drew Beamer"
                 loading="lazy"
            />
        </twig:ui:aspect-ratio:root>
    </twig:ui:card:content>
    <twig:ui:card:footer class="flex justify-end gap-x-2">
        <twig:ui:button:root variant="outline">See more</twig:ui:button:root>
        <twig:ui:button:root>Buy now</twig:ui:button:root>
    </twig:ui:card:footer>
</twig:ui:card:root>
```