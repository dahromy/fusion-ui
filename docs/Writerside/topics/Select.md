# Select

Displays a list of options for the user to pick from—triggered by a button.

## Installation

To install the Select component, use the following command:

```bash
php bin/console fusion-ui:add select
```

This will add the Select component to your project.

## Usage

To use the Select component in your project, include the following code in your TWIG file:

```Twig
<twig:ui:select:root>
    <twig:ui:select:input id="select-a-fruit"/>
    <twig:ui:select:trigger class="w-[250px]">
        <twig:ui:select:value placeholder="Select a fruit" id="select-a-fruit"/>
    </twig:ui:select:trigger>
    <twig:ui:select:content id="select-a-fruit">
        <twig:ui:select:group>
            <twig:ui:select:label>Fruits</twig:ui:select:label>
            <twig:ui:select:item value="apple">Apple</twig:ui:select:item>
            <twig:ui:select:item value="orange">Orange</twig:ui:select:item>
            <twig:ui:select:item value="banana">Banana</twig:ui:select:item>
            <twig:ui:select:item value="watermelon">Watermelon</twig:ui:select:item>
        </twig:ui:select:group>
    </twig:ui:select:content>
</twig:ui:select:root>
```