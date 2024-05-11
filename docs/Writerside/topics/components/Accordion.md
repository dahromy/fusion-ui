# Accordion

A vertically stacked set of interactive headings that each reveal a section of content.

## Installation

To install the Accordion component, use the following command:

```bash
php bin/console fusion-ui:add accordion
```

This will add the Accordion component to your project.

## Usage

To use the Accordion component in your project, include the following code in your TWIG file:

```Twig
<twig:ui:accordion:root class="w-full">
    <twig:ui:accordion:item>
        <twig:ui:accordion:default_trigger>
            Is it accessible?
        </twig:ui:accordion:default_trigger>
        <twig:ui:accordion:content>
            Yes. It adheres to the WAI-ARIA design pattern.
        </twig:ui:accordion:content>
    </twig:ui:accordion:item>
</twig:ui:accordion:root>
```
