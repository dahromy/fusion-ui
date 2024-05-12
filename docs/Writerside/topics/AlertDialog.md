# Alert Dialog

A modal dialog that interrupts the user with important content and expects a response.

## Installation

To install the Alert Dialog component, use the following command:

```bash
php bin/console fusion-ui:add alert-dialog
```

This will add the Alert Dialog component to your project.

## Usage

To use the Alert Dialog component in your project, include the following code in your TWIG file:

```Twig
<twig:ui:alert-dialog:root>
    <twig:ui:alert-dialog:trigger>
        <twig:ui:button:root aria-haspopup="dialog" aria-expanded="false" data-state="closed" variant="outline">
            Show Dialog
        </twig:ui:button:root>
    </twig:ui:alert-dialog:trigger>
    <twig:ui:alert-dialog:content>
        <twig:ui:alert-dialog:header>
            <twig:ui:alert-dialog:title>
                Are you absolutely sure?
            </twig:ui:alert-dialog:title>
            <twig:ui:alert-dialog:description>
                This action cannot be undone. This will permanently delete your
                account and remove your data from our servers.
            </twig:ui:alert-dialog:description>
        </twig:ui:alert-dialog:header>
        <twig:ui:alert-dialog:footer>
            <twig:ui:alert-dialog:cancel variant="secondary">Cancel</twig:ui:alert-dialog:cancel>
            <twig:ui:alert-dialog:action>Continue</twig:ui:alert-dialog:action>
        </twig:ui:alert-dialog:footer>
    </twig:ui:alert-dialog:content>
</twig:ui:alert-dialog:root>
```