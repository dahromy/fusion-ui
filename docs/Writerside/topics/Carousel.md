# Carousel

A carousel with motion and swipe built using Embla.

## Installation

To install the Carousel component, use the following command:

```bash
php bin/console fusion-ui:add carousel
```

This will add the Carousel component to your project.

## Usage

To use the Carousel component in your project, include the following code in your TWIG file:

```Twig
<twig:ui:carousel:root class="w-full max-w-xs">
    <twig:ui:carousel:content>
        {% for index in 0..5 %}
            <twig:ui:carousel:item key="{{ index }}">
                <div class="p-1">
                    <div class="rounded-xl border bg-card text-card-foreground shadow">
                        <div class="flex aspect-square items-center justify-center p-6">
                            <span class="text-4xl font-semibold">{{ index }}</span>
                        </div>
                    </div>
                </div>
            </twig:ui:carousel:item>
        {% endfor %}
    </twig:ui:carousel:content>
    <twig:ui:carousel:previous/>
    <twig:ui:carousel:next/>
</twig:ui:carousel:root>
```