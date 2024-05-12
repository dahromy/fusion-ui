# Checkbox

A control that allows the user to toggle between checked and not checked.

## Installation

To install the Checkbox component, use the following command:

```bash
php bin/console fusion-ui:add checkbox
```

This will add the Checkbox component to your project.

## Usage

To use the Checkbox component in your project, include the following code in your TWIG file:

```Twig
<div class="flex items-center space-x-2">
    <twig:ui:checkbox:root id="terms">
        <twig:ui:checkbox:indicator/>
    </twig:ui:checkbox:root>
    <label for="terms"
           class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">
        Accept terms and conditions
    </label>
</div>
```